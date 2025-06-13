<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'address',
        'pincode',
        'state',
        'district_name',
        'assembly_name',
        'part_name',
        'aadhar_front',
        'aadhar_back',
    ];
}
