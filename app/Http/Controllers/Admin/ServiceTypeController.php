<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller{
    public function __construct() {
        $this->middleware('auth');
    }

    public function addNewServiceTypeForm(){
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        return view('admin.service-type.service_type_add',compact('serviceTypes'));
    }

    public function editServiceTypeInfoForm($id){
        $serviceType = (new CompanyInfoService())->getServiceTypeInformation($id);
        return view('admin.service-type.service_type_edit',compact('serviceType'));
    }

    public function insertServiceTypeInfoFormSubmit(Request $request){
        $this->validate($request, [
            'service_name' => 'required',
        ],[
            'service_name.required' => 'Please enter service name!',
        ]);

        (new CompanyInfoService())
            ->insertServiceTypeInformation(
            $request['service_name'],
        );

        $notification=array(
            'messege'=>'Service Type insert Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateServiceTypeInfoFormSubmit(Request $request){
        $this->validate($request, [
            'service_name' => 'required',
        ],[
            'service_name.required' => 'Please enter service name!',
        ]);

        (new CompanyInfoService())
            ->updateServiceTypeInformation(
            $request['service_type_id'],
            $request['service_name'],
        );

        $notification=array(
            'messege'=>'Service Type Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('service_type_new_form')->with($notification);
    }

    public function deleteServiceTypeInfoFormSubmit(Request $request){
        $id = $request['modal_id'];

        (new CompanyInfoService())->deleteServiceTypeInformation($id);

        $notification=array(
            'messege'=>'Service Type Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
