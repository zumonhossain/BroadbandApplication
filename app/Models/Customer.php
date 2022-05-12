<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    use HasFactory;

    public function upazila(){
        return $this->hasOne('App\Models\Upazila','upazila_id','upazila_id');
    }

    public function union(){
        return $this->hasOne('App\Models\Union','union_id','union_id');
    }
}
