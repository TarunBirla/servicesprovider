<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'state_id'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function assemblies()
    {
        return $this->hasMany(Assembly::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
