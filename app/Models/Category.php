<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // A category has many services
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
