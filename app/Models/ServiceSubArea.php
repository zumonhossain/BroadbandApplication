<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubArea extends Model{
    use HasFactory;

    public function serviceArea(){
        return $this->hasOne('App\Models\ServiceArea','service_area_id','service_area_id');
    }
}
