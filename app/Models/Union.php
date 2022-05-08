<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model{
    use HasFactory;

    public function division(){
        return $this->hasOne('App\Models\Division','division_id','division_id');
    }

    public function district(){
        return $this->hasOne('App\Models\District','district_id','district_id');
    }

    public function upazila(){
        return $this->hasOne('App\Models\Upazila','upazila_id','upazila_id');
    }
}
