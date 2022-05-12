<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerInfoService extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getCustomerInformation($id){
        if($id == null){
            return Customer::where('customer_status', 1)->get();
        }else{
            return Customer::where('customer_id', $id)->first();
        }
    }

    public function insertCustomerInformation($customer_name, $father_name, $email, $application_date, $phone_no1, $phone_no2, $connection_date, $connection_status_id, $customer_occupation_id, $service_type_id, $package_id, $division_id, $district_id, $upazila_id, $union_id, $service_area_id, $service_sub_area_id, $description, $post_code, $road_no, $house_no, $floor_no, $plate_no, $nid){
        return Customer::insertGetId([
            'customer_name' => $customer_name,
            'father_name' => $father_name,
            'email' => $email,
            'application_date' => $application_date,
            'phone_no1' => $phone_no1,
            'phone_no2' => $phone_no2,
            'connection_date' => $connection_date,
            'connection_status_id' => $connection_status_id,
            'customer_occupation_id' => $customer_occupation_id,
            'service_type_id' => $service_type_id,
            'package_id' => $package_id,
            'division_id' => $division_id,
            'district_id' => $district_id,
            'upazila_id' => $upazila_id,
            'union_id' => $union_id,
            'service_area_id' => $service_area_id,
            'service_sub_area_id' => $service_sub_area_id,
            'description' => $description,
            'post_code' => $post_code,
            'road_no' => $road_no,
            'house_no' => $house_no,
            'floor_no' => $floor_no,
            'plate_no' => $plate_no,
            'nid' => $nid,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function updateCustomerInformation($id, $customer_name, $father_name, $email, $application_date, $phone_no1, $phone_no2, $connection_date, $connection_status_id, $customer_occupation_id, $service_type_id, $package_id, $division_id, $district_id, $upazila_id, $union_id, $service_area_id, $service_sub_area_id, $description, $post_code, $road_no, $house_no, $floor_no, $plate_no, $nid){
        return Customer::where('customer_id', $id)->update([
            'customer_name' => $customer_name,
            'father_name' => $father_name,
            'email' => $email,
            'application_date' => $application_date,
            'phone_no1' => $phone_no1,
            'phone_no2' => $phone_no2,
            'connection_date' => $connection_date,
            'connection_status_id' => $connection_status_id,
            'customer_occupation_id' => $customer_occupation_id,
            'service_type_id' => $service_type_id,
            'package_id' => $package_id,
            'division_id' => $division_id,
            'district_id' => $district_id,
            'upazila_id' => $upazila_id,
            'union_id' => $union_id,
            'service_area_id' => $service_area_id,
            'service_sub_area_id' => $service_sub_area_id,
            'description' => $description,
            'post_code' => $post_code,
            'road_no' => $road_no,
            'house_no' => $house_no,
            'floor_no' => $floor_no,
            'plate_no' => $plate_no,
            'nid' => $nid,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
    public function deleteCustomerInformation($id){
        return Customer::where('customer_id', $id)->update([
            'customer_status' => 0
        ]);
    }

    public function searchCustomerInfo(Request $request){
        $customer = (new CustomerInfoService())->searchCustomerInformation($request->value, $request->value_type);
        if ($customer) {
            return  response()->json(['data' => $customer, 'success' => 'true', 'status_code' => 200]);
        } else {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }
    }
}
