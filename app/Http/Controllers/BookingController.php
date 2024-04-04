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
            'youth' => 'required|integer|min:0',
            'children' => 'required|integer|min:0',
            'additionalFeeAdults' => 'required|integer|min:0',
            'additionalFeeYouth' => 'required|integer|min:0',
            'additionalFeeChildren' => 'required|integer|min:0',
            'package_id' => 'required|exists:packages,id',
            'totalPrice' => 'required|numeric',
        ]);

        // Prepare data for creating a new Booking record
        $bookingData = [
            'check_in' => $validated['start_date'], // Map 'start_date' to 'check_in'
            'check_out' => $validated['end_date'], // Map 'end_date' to 'check_out'
            'user_id' => $user->id, // Include the user ID
            'customer_name' => $user->name, // Assuming the user's name is to be used as customer name
            'email' => $user->email, // Assuming the user's email
            'phone' => $user->contact_number, // Placeholder for phone, adjust as necessary
            'package_id' => $validated['package_id'],
            // 'total_price' => $this->calculateTotalPrice($validated), // Calculate total price
            'total_price' => $validated['totalPrice'], // Use 'totalPrice' from validated data
            'adults_count' => $validated['adults'], // Add count of adults
            'youth_count' => $validated['youth'], // Add count of youth
            'children_count' => $validated['children'], // Add count of children
            'additional_adults_count' => $validated['additionalFeeAdults'], // Add count of additional adults
            'additional_youth_count' => $validated['additionalFeeYouth'], // Add count of additional youth
            'additional_children_count' => $validated['additionalFeeChildren'], // Add count of additional children
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
