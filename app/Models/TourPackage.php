<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'destination_id',
        'category_id',
        'duration_days',
        'duration_nights',
        'starting_price',
        'original_price',
        'rating',
        'reviews_count',
        'short_description',
        'overview',
        'itinerary',
        'inclusions',
        'exclusions',
        'hotel_info',
        'transport_info',
        'cover_image',
        'gallery',
        'terms_conditions',
        'is_featured',
        'is_popular',
        'is_domestic',
        'is_international',
        'is_hajj_umrah',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'itinerary' => 'array',
            'inclusions' => 'array',
            'exclusions' => 'array',
            'gallery' => 'array',
            'is_featured' => 'boolean',
            'is_popular' => 'boolean',
            'is_domestic' => 'boolean',
            'is_international' => 'boolean',
            'is_hajj_umrah' => 'boolean',
            'starting_price' => 'decimal:2',
            'original_price' => 'decimal:2',
            'rating' => 'decimal:2',
        ];
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
