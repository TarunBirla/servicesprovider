<?php
// app/Models/Rating.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'serviceid',
        'name',
        'rating',
        'note',
    ];

    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationship with Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'serviceid');
    }

    // Get formatted date
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('M d, Y g:i A');
    }

    // Get star rating display
    public function getStarDisplayAttribute()
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $this->rating) {
                $stars .= '★';
            } else {
                $stars .= '☆';
            }
        }
        return $stars;
    }
}