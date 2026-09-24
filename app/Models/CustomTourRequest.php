<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTourRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'travel_date',
        'duration_days',
        'budget_range',
        'travelers_count',
        'hotel_category',
        'customer_name',
        'customer_email',
        'customer_phone',
        'details',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'travel_date' => 'date',
        ];
    }
}
