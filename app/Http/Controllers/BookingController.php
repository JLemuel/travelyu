<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user(); // Get the currently authenticated user

        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'adults' => 'required|integer|min:1',
            'package_id' => 'required|exists:packages,id',
            'package_price' => 'required|numeric',
        ]);

        // Prepare data for creating a new Booking record
        $bookingData = [
            'check_in' => $validated['start_date'], // Map 'start_date' to 'check_in'
            'check_out' => $validated['end_date'], // Map 'end_date' to 'check_out'
            'user_id' => $user->id, // Include the user ID
            'customer_name' => $user->name, // Assuming the user's name is to be used as customer name
            'email' => $user->email, // Assuming the user's email
            'phone' => 'N/A', // Placeholder for phone, adjust as necessary
            'package_id' => $validated['package_id'],
            // 'total_price' => $this->calculateTotalPrice($validated), // Calculate total price
            'total_price' =>  $validated['package_price'], // Calculate total price
            // Include additional fields as needed
        ];

        // Create a new Booking record
        $booking = new Booking($bookingData);
        $booking->save();

        // Redirect or return a success response
        return redirect()->route('booking.success'); // Redirect to a success page or route
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
