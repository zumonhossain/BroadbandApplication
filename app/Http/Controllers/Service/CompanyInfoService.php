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

    public function insertBannerInformation($banner_name, $banner_title, $banner_subtitle, $banner_url){
        return BannerInfo::insertGetId([
            'banner_name'=>$banner_name,
            'banner_title'=>$banner_title,
            'banner_subtitle'=>$banner_subtitle,
            'banner_url'=>$banner_url,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);
    }
    public function getBannerInformation(){
        
    }
    public function updateBannerInformation(){
        
    }
    public function deleteBannerInformation(){
        
    }
}
