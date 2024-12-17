<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_type',
        'card_number',
        'expiry_date',
        'delivery_method',
        'vehicle_number',
        'driver_name',
        'arrival_time',
        'home_delivery',
        'home_address',
        'flight_number',
        'departure_date',
        'ship_name',
        'port_origin',
        'port_destination',
        'by_agency',
        'agency_name',
        'agency_contact',
    ];
}
