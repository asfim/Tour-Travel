<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBookingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_location',
        'to_location',
        'departure_date',
        'return_date',
        'trip_type',
        'passengers_count',
        'cabin_class',
        'passenger_name',
        'passenger_phone',
        'passenger_email',
        'notes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'departure_date' => 'date',
            'return_date' => 'date',
        ];
    }
}
