<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerInfo;
use Carbon\Carbon;

class CompanyInfoService extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
}
