<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'type',
        'revenue_type',
        'sector_name',
        'industry_name',
        'sub_industry_name',
        'experience_year',
        'address',
        'pincode',
        'state',
        'district_name',
        'assembly_name',
        'part_name',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function assembly()
    {
        return $this->belongsTo(Assembly::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

