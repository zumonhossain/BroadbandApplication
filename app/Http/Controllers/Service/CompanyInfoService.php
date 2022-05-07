<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerInfo;
use App\Models\CompanyInfo;
use App\Models\ServiceType;
use App\Models\PackageInfo;
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

    public function deleteBannerInformation($id){
        return BannerInfo::where('banner_id',$id)->update([
            'banner_status'=>0
        ]);
    }

    // Company Info
    public function getCompanyProfileInformation(){
        return CompanyInfo::where('company_profile_id', 1)->firstOrFail();
    }

    public function insertCompanyProfileInformation($com_name_bangla, $com_name_english, $company_title, $company_sub_title, $address, $owner_name1, $owner_name2, $mobile_no1, $mobile_no2, $email1,$email2, $support_mobile_number, $description, $company_mission, $company_vission, $web_address, $trade_license, $iSP_license, $extra1, $extra2, $extra3){

        return CompanyInfo::insertGetId([
            'com_name_bangla' => $com_name_bangla,
            'com_name_english' => $com_name_english,
            'company_title' => $company_title,
            'company_sub_title' => $company_sub_title,
            'address' => $address,
            'owner_name1' => $owner_name1,
            'owner_name2' => $owner_name2,
            'mobile_no1' => $mobile_no1,
            'mobile_no2' => $mobile_no2,
            'email1' => $email1,
            'email2' => $email2,
            'support_mobile_number' => $support_mobile_number,
            'description' => $description,
            'company_mission' => $company_mission,
            'company_vission' => $company_vission,
            'web_address' => $web_address,
            'trade_license' => $trade_license,
            'iSP_license' => $iSP_license,
            'extra1' => $extra1,
            'extra2' => $extra2,
            'extra3' => $extra3,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function updateCompanyProfileInformation($id, $com_name_bangla, $com_name_english, $company_title, $company_sub_title, $address, $owner_name1, $owner_name2, $mobile_no1, $mobile_no2, $email1, $email2, $support_mobile_number, $description, $company_mission, $company_vission, $web_address, $trade_license, $iSP_license, $extra1, $extra2, $extra3){
        return CompanyInfo::where('company_profile_id', $id)->update([
            'com_name_bangla' => $com_name_bangla,
            'com_name_english' => $com_name_english,
            'company_title' => $company_title,
            'company_sub_title' => $company_sub_title,
            'address' => $address,
            'owner_name1' => $owner_name1,
            'owner_name2' => $owner_name2,
            'mobile_no1' => $mobile_no1,
            'mobile_no2' => $mobile_no2,
            'email1' => $email1,
            'email2' => $email2,
            'support_mobile_number' => $support_mobile_number,
            'description' => $description,
            'company_mission' => $company_mission,
            'company_vission' => $company_vission,
            'web_address' => $web_address,
            'trade_license' => $trade_license,
            'iSP_license' => $iSP_license,
            'extra1' => $extra1,
            'extra2' => $extra2,
            'extra3' => $extra3,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function updateCompanyUploadFileDBPath($columnName, $filePath){
        CompanyInfo::where('company_profile_id', 1)->update([
            $columnName => $filePath,
        ]);
        //OwnerPhoto1
    }


    //Service Type
    public function getServiceTypeInformation($id){
        if($id == null){
            return ServiceType::all();
        }else{
            return ServiceType::where('service_type_id',$id)->first();
        }
    }

    public function insertServiceTypeInformation($service_name){
        return ServiceType::insertGetId([
            'service_name' => $service_name,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function updateServiceTypeInformation($id, $service_name){
        return ServiceType::where('service_type_id', $id)->update([
            'service_name' => $service_name,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deleteServiceTypeInformation($id){
        return ServiceType::where('service_type_id', $id)->delete();
    }


    //Package Info
    public function getPackageInformation($id){
        if($id == null){
            return PackageInfo::where('package_status',1)->get();
        }else{
            return PackageInfo::where('package_id', $id)->first();
        }   
    }
    
    public function insertPackageInformation($service_type_id, $package_name, $package_bandwidth, $package_price, $package_code){
        return PackageInfo::insertGetId([
            'service_type_id' => $service_type_id,
            'package_name' => $package_name,
            'package_bandwidth' => $package_bandwidth,
            'package_price' => $package_price,
            'package_code' => $package_code,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }






}
