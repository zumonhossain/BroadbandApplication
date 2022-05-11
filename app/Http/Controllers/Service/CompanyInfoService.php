<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Month;
use App\Models\User;
use App\Models\BannerInfo;
use App\Models\CompanyInfo;
use App\Models\ServiceType;
use App\Models\PackageInfo;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\ServiceArea;
use App\Models\ServiceSubArea;
use App\Models\DebitType;
use App\Models\DailyCost;
use Carbon\Carbon;
use Str;

class CompanyInfoService extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getMonths($id){
        if ($id == null) {
            return Month::get();
        } else {
            return Month::where('month_id', $id)->first();
        }
    }

    //user
    public function getUserInformation($id){
        if ($id == null) {
            return  $users = User::all();
        } else {
            return  $users = User::where('id', $id)->first();
        }
    }

    //Debit Type
    public function getDebitTypeInformation($id){
        if ($id == null) {
            return  $debitTypes = DebitType::all();
        } else {
            return  $debitTypes = DebitType::where('id', $id)->first();
        }
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

    public function updatePackageInformation($id, $service_type_id, $package_name, $package_bandwidth, $package_price, $package_code){
        return PackageInfo::where('package_id', $id)->update([
            'service_type_id' => $service_type_id,
            'package_name' => $package_name,
            'package_bandwidth' => $package_bandwidth,
            'package_price' => $package_price,
            'package_code' => $package_code,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deletePackageInforamtion($id){
        return PackageInfo::where('package_id',$id)->update([
            'package_status' =>0
        ]);
    }


    //Division
    public function getDivisionInformation($id){
        if($id == null){
            return Division::where('division_status', 1)->get();
        }else{
            return Division::where('division_id', $id)->first();
        }
    }

    public function insertDivisionInformation($division_name){
        return Division::insertGetId([
            'division_name' => $division_name,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function updateDivisionInformation($id, $division_name){
        return Division::where('division_id', $id)->update([
            'division_name' => $division_name,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function deleteDivisionInformation($id){
        return Division::where('division_id', $id)->where('division_status', 1)->update([
            'division_status' => 0
        ]);
    }


    // District
    public function searchDistrictInformation($name){
        $name = Str::lower($name);
        $district = District::where(Str::lower('district_name'), $name)->first();

        if($district == null) {
            return false;
        }else {
            return true;
        }
    }

    public function getDistrictInformation($id){
        if($id == null) {
            return District::where('district_status', 1)->get();
        }else{
            return District::where('district_id', $id)->first();
        }
    }

    public function insertDistrictInformation($division_id, $district_name){
        if($this->searchDistrictInformation($district_name)) {
            return null;
        }else{
            return District::insertGetId([
                'division_id' => $division_id,
                'district_name' => $district_name,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }

    public function updateDistrictInformation($id, $division_id, $district_name){
        if($this->searchDistrictInformation($district_name)) {
            return null;
        }else{
            return District::where('district_id', $id)->update([
                'division_id' => $division_id,
                'district_name' => $district_name,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }

    public function deleteDistrictInformation($id){
        return District::where('district_id', $id)->where('district_status', 1)->update([
            'district_status' => 0
        ]);
    }


    // Upazila
    public function searchUpazilaInformation($name){
        $name = Str::lower($name);
        $upazila = Upazila::where(Str::lower('upazila_name'), $name)->first();

        if($upazila == null) {
            return false;
        }else{
            return true;
        }
    }

    public function getUpazilaInformation($id){
        if($id == null){
            return Upazila::where('upazila_status', 1)->get();
        }else{
            return Upazila::where('upazila_id', $id)->first();
        }
    }

    public function insertUpazilaInformation($division_id, $district_id, $upazila_name){
        if($this->searchUpazilaInformation($upazila_name)) {
            return null;
        }else{
            return Upazila::insertGetId([
                'division_id' => $division_id,
                'district_id' => $district_id,
                'upazila_name' => $upazila_name,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }

    public function updateUpazilaInformation($id, $division_id, $district_id, $upazila_name){
        if($this->searchUpazilaInformation($upazila_name)) {
            return null;
        }else{
            return Upazila::where('upazila_id', $id)->update([
                'division_id' => $division_id,
                'district_id' => $district_id,
                'upazila_name' => $upazila_name,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }

    public function deleteUpazilaInformation($id){
        return Upazila::where('upazila_id', $id)->update([
            'upazila_status' =>0
        ]);
    }


    // Union
    public function searchUnionInformation($name){
        $name = Str::lower($name);
        $union = Union::where(Str::lower('union_name'), $name)->first();

        if ($union == null) {
            return false;
        } else {
            return true;
        }
    }

    public function getUnionInformation($id){
        if ($id == null) {
            return  $unions = Union::all();
        } else {
            return  $unions = Union::where('union_id', $id)->first();
        }
    }

    public function insertUnionInformation($division_id, $district_id, $upazila_id, $union_name){

        if ($this->searchUnionInformation($union_name)) {
            return null;
        } else {
            return $insert = Union::insertGetId([
                'division_id' => $division_id,
                'district_id' => $district_id,
                'upazila_id' => $upazila_id,
                'union_name' => $union_name,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }

    public function updateUnionInformation($id, $division_id, $district_id, $upazila_id, $union_name){

        if ($this->searchUnionInformation($union_name)) {
            return null;
        } else {
            return Union::where('union_id', $id)->update([
                'division_id' => $division_id,
                'district_id' => $district_id,
                'upazila_id' => $upazila_id,
                'union_name' => $union_name,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }

    public function deleteUnionInformation($id){
        return Union::where('union_id', $id)->update([
            'union_status' => 0
        ]);
    }


    // Service Area
    public function getServiceAreaInformation($id){
        if($id == null){
            return ServiceArea::where('service_area_status', 1)->get();
        }else{
            return ServiceArea::where('service_area_id', $id)->first();
        }
    }

    public function insertServiceAreaInformation($service_area_name, $service_area_remarks){
        return ServiceArea::insertGetId([
            'service_area_name' => $service_area_name,
            'service_area_remarks' => $service_area_remarks,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function updateServiceAreaInformation($id, $service_area_name, $service_area_remarks){
        return ServiceArea::where('service_area_id', $id)->update([
            'service_area_name' => $service_area_name,
            'service_area_remarks' => $service_area_remarks,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function deleteServiceAreaInformation($id){
        return ServiceArea::where('service_area_id', $id)->update([
            'service_area_status' => 0,
        ]);
    }


    // Service Sub Area
    public function getServiceSubAreaInformation($id){
        if ($id == null) {
            return ServiceSubArea::where('service_sub_area_status', 1)->get();
        } else {
            return ServiceSubArea::where('service_sub_area_id', $id)->first();
        }
    }
    
    public function insertServiceSubAreaInformation($service_area_id, $service_sub_area_name, $service_sub_area_remarks){
        return ServiceSubArea::insertGetId([
            'service_area_id' => $service_area_id,
            'service_sub_area_name' => $service_sub_area_name,
            'service_sub_area_remarks' => $service_sub_area_remarks,
        ]);
    }

    public function updateServiceSubAreaInformation($id, $service_area_id, $service_sub_area_name, $service_sub_area_remarks){
        return ServiceSubArea::where('service_sub_area_id', $id)->update([
            'service_area_id' => $service_area_id,
            'service_sub_area_name' => $service_sub_area_name,
            'service_sub_area_remarks' => $service_sub_area_remarks,
        ]);
    }

    public function deleteServiceSubAreaInformation($id){
        return ServiceSubArea::where('service_sub_area_id', $id)->update([
            'service_sub_area_status' => 0
        ]);
    }


    // Daily Cost
    public function getDailyCostInformation($id){
        if ($id == null) {
            return  $serviceArea = DailyCost::where('daily_cost_status', 1)->get();
        } else {
            return  $serviceArea = DailyCost::where('daily_cost_id', $id)->first();
        }
    }

    public function insertDailyCostInformation($transaction_id, $debit_type_id, $expense_date, $amount, $debited_to_id, $credited_from_id, $expense_by_id, $year, $month_id, $voucher_file_path, $approve_Status, $creator){
        return DailyCost::insertGetId([
            'transaction_id' => 0,
            'debit_type_id' => $debit_type_id,
            'expense_date' => $expense_date,
            'amount' => $amount,
            'debited_to_id' => 0,
            'credited_from_id' => 0,
            'expense_by_id' => $expense_by_id,
            'year' => $year,
            'month_id' => $month_id,
            'voucher_file_path' => $voucher_file_path,
            'approve_Status' => 0,
            'creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }



}
