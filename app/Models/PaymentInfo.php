<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model{
    use HasFactory;

    public function customer(){
        return $this->hasOne('App\Models\Customer','customer_id','customer_id');
    }
    public function user(){
        return $this->hasOne('App\Models\User','id','collected_by_id');
    }
    public function month(){
        return $this->hasOne('App\Models\Month','month_id','pay_month');
    }
}
