<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    protected $fillable = ['name', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

