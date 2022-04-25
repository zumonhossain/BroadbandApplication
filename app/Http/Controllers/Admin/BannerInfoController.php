<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerInfoController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewBannerInfoForm(){
        return view('admin.banner-info.banner_add');
    }
}
