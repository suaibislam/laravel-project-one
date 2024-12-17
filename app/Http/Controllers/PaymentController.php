<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment; // Assuming you have a Payment model to handle the database

class PaymentController extends Controller
{
    public function store(Request $request)
    {
      
        // Validate form data
        $request->validate([
            'cardType' => 'required|string',
            'cardNumber' => 'required|string',
            'expiryDate' => 'required|string',
            'delivery_method' => 'required|string',
        ]);

        // Save the data
        Payment::create([
            'card_type' => $request->cardType,
            'card_number' => $request->cardNumber,
            'expiry_date' => $request->expiryDate,
            'delivery_method' => $request->delivery_method,
            'vehicle_number' => $request->vehicle_number,
            'driver_name' => $request->driver_name,
            'arrival_time' => $request->arrival_time,
            'home_delivery' => $request->home_delivery === 'yes',
            'home_address' => $request->home_address,
            'flight_number' => $request->flight_number,
            'departure_date' => $request->departure_date,
            'ship_name' => $request->ship_name,
            'port_origin' => $request->port_origin,
            'port_destination' => $request->port_destination,
            'by_agency' => $request->by_agency === 'yes',
            'agency_name' => $request->agency_name,
            'agency_contact' => $request->agency_contact,
        ]);

        // Redirect to success page
        return redirect()->route('payments.success');
    }

    // Show the success page
    public function success()
    {
        return view('payment.success');
    }
}
