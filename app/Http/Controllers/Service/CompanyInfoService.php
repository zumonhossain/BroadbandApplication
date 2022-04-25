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

    // Banner Info
    public function insertBannerInformation($banner_name, $banner_title, $banner_subtitle, $banner_url){
        return BannerInfo::insertGetId([
            'banner_name'=>$banner_name,
            'banner_title'=>$banner_title,
            'banner_subtitle'=>$banner_subtitle,
            'banner_url'=>$banner_url,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);
    }

    public function getBannerInformation($id){
        if($id == null){
            return BannerInfo::where('banner_status',1)->get();
        }
        else{
            return BannerInfo::where('banner_id', $id)->where('banner_status',1)->first();
        }
    }

    public function updateBannerInformation($id, $banner_name, $banner_title, $banner_subtitle, $banner_url){
        return BannerInfo::where('banner_id',$id)->update([
            'banner_name'=>$banner_name,
            'banner_title'=>$banner_title,
            'banner_subtitle'=>$banner_subtitle,
            'banner_url'=>$banner_url,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
    }

    public function deleteBannerInformation(){
        
    }






}
