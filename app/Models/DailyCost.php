<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyCost extends Model{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\Models\User','id','expense_by_id');
    }
}
