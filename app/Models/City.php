<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'assembly_id', 'pincode'];

    public function assembly()
    {
        return $this->belongsTo(Assembly::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

