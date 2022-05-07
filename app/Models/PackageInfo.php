<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageInfo extends Model{
    use HasFactory;

    public function serviceType(){
        return $this->hasOne('App\Models\ServiceType','service_type_id','package_id');
    }
}
