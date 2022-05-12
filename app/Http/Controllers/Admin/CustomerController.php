<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CustomerInfoService;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class CustomerController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewCustomerForm(){
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $unions = (new CompanyInfoService())->getUnionInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $packageInformations = (new CompanyInfoService())->getPackageInformation(null);
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $customers = (new CustomerInfoService())->getCustomerInformation(null);
        return view('admin.customer.customer_add', compact('customers','serviceTypes','packageInformations','divisions','districts','upazilas','unions','serviceAreas','serviceSubAreas','connectionStatus'));
    }

    public function insertCustomerFormSubmit(Request $request){
        $this->validate($request, [
            'customer_name' => 'required',
        ], [
            'customer_name.required' => 'Please enter customer name!',
        ]);

        (new CustomerInfoService())->insertCustomerInformation(
            $request['customer_name'],
            $request['father_name'],
            $request['email'],
            $request['application_date'],
            $request['phone_no1'],
            $request['phone_no2'],
            $request['connection_date'],
            $request['connection_status_id'],
            $request['customer_occupation_id'],
            $request['service_type_id'],
            $request['package_id'],
            $request['division_id'],
            $request['district_id'],
            $request['upazila_id'],
            $request['union_id'],
            $request['service_area_id'],
            $request['service_sub_area_id'],
            $request['description'],
            $request['post_code'],
            $request['road_no'],
            $request['house_no'],
            $request['floor_no'],
            $request['plate_no'],
            $request['nid'],
        );

        $notification = array(
            'messege' => 'Customer Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editCustomerForm($id){
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $unions = (new CompanyInfoService())->getUnionInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $packageInformations = (new CompanyInfoService())->getPackageInformation(null);
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $customer = (new CustomerInfoService())->getCustomerInformation($id);
        return view('admin.customer.customer_edit', compact('customer','serviceTypes','packageInformations','divisions','districts','upazilas','unions','serviceAreas','serviceSubAreas','connectionStatus'));
    }

    public function updateCustomerFormSubmit(Request $request){
        $this->validate($request, [
            'customer_name' => 'required',
        ], [
            'customer_name.required' => 'Please enter union name!',
        ]);

        (new CustomerInfoService())->updateCustomerInformation(
            $request['customer_name'],
            $request['father_name'],
            $request['email'],
            $request['application_date'],
            $request['phone_no1'],
            $request['phone_no2'],
            $request['connection_date'],
            $request['connection_status_id'],
            $request['customer_occupation_id'],
            $request['service_type_id'],
            $request['package_id'],
            $request['division_id'],
            $request['district_id'],
            $request['upazila_id'],
            $request['union_id'],
            $request['service_area_id'],
            $request['service_sub_area_id'],
            $request['description'],
            $request['post_code'],
            $request['road_no'],
            $request['house_no'],
            $request['floor_no'],
            $request['plate_no'],
            $request['nid'],
        );

        $notification = array(
            'messege' => 'Customer Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('customer_new_form')->with($notification);
    }
}
