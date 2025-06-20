<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $primaryKey = 'id';

    protected $keyType = 'string'; // <-- important for string IDs like "S0104"
    
    public $incrementing = false;  // <-- tells Laravel not to treat it as auto-incrementing integer

    protected $fillable = ['name', 'state_id','district_code'];
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