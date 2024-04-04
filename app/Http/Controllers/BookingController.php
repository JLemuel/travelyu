<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user(); // Get the currently authenticated user

        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'adults' => 'required|integer|min:0',
            'children' => 'required|integer|min:0',
            'additionalFeeAdults' => 'required|integer|min:0',
            'additionalFeeChildren' => 'required|integer|min:0',
            'package_id' => 'required|exists:packages,id',
            'totalPrice' => 'required|numeric',
            'pickup_latitude' => 'required|numeric',
            'pickup_longitude' => 'required|numeric',
            'dropoff_latitude' => 'required|numeric',
            'dropoff_longitude' => 'required|numeric',
        ]);
    

         // Prepare data for creating a new Booking record
            $bookingData = [
                'check_in' => $validated['start_date'],
                'check_out' => $validated['end_date'],
                'user_id' => $user->id,
                'package_id' => $validated['package_id'],
                'total_price' => $validated['totalPrice'],
                'adults_count' => $validated['adults'],
                'children_count' => $validated['children'],
                'additional_adults_count' => $validated['additionalFeeAdults'],
                'additional_children_count' => $validated['additionalFeeChildren'],
                // Add the pickup and drop-off location data
                'pickup_latitude' => $validated['pickup_latitude'],
                'pickup_longitude' => $validated['pickup_longitude'],
                'dropoff_latitude' => $validated['dropoff_latitude'],
                'dropoff_longitude' => $validated['dropoff_longitude'],
                // Add any additional fields as necessary
            ];


        // Create a new Booking record
        $booking = new Booking($bookingData);
        $booking->save();

        // Redirect or return a success response
        return redirect()->route('booking.success'); // Redirect to a success page or route
    }

    public function uploadReceipt(Request $request, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        if ($request->hasFile('receiptFile')) {
            $file = $request->file('receiptFile');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Store the file in the public storage and get the path
            $path = $file->storeAs('receipts', $filename, 'public');
            
            // Update the booking record with the new receipt path
            $booking->receipt = $path;
            $booking->save();

            // Redirect back with a success message or handle as needed
            return back()->with('success', 'Receipt uploaded successfully!');
        }

        // Redirect back with an error message if no file was provided
        return back()->with('error', 'Please provide a receipt file to upload.');
    }

    /**
     * Calculates the total price for the booking.
     *
     * @param array $validatedData The validated form data.
     * @return float The total calculated price.
     */
    protected function calculateTotalPrice($validatedData)
    {
        $startDate = new \DateTime($validatedData['start_date']);
        $endDate = new \DateTime($validatedData['end_date']);
        $diff = $startDate->diff($endDate);

        // Assuming the difference returns in days and adding 1 because both start and end dates are inclusive
        $totalDays = $diff->days + 1;
        // Assuming 'adults' is a multiplier (e.g., price per adult per day)
        // $totalPrice = $totalDays * $validatedData['adults'] * $validatedData['package_price'];
        $totalPrice = $totalDays *
         $validatedData['package_price'];


        return $totalPrice;
    }
}