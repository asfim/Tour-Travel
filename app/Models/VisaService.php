<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaService extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'slug',
        'flag_icon',
        'visa_type',
        'price',
        'processing_time',
        'validity',
        'required_documents',
        'details',
        'is_popular',
    ];

    protected function casts(): array
    {
        return [
            'required_documents' => 'array',
            'is_popular' => 'boolean',
            'price' => 'decimal:2',
        ];
    }
}
