<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class ServiceSubAreaController extends Controller{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function addNewServiceSubAreaForm(){
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        return view('admin.service-sub-area.service_sub_area_add',compact('serviceSubAreas','serviceAreas'));
    }

    public function insertServiceSubAreaFormSubmit(Request $request){

        $this->validate($request, [
            'service_area_id' => 'required',
            'service_sub_area_name' => 'required',
        ],[
            'service_area_id.required' => 'Please enter service area name!',
            'service_sub_area_name.required' => 'Please enter service sub area name!',
        ]);

        (new CompanyInfoService())->insertServiceSubAreaInformation(
            $request['service_area_id'],
            $request['service_sub_area_name'],
            $request['service_sub_area_remarks'],
        );
        
        $notification=array(
            'messege'=>'Service Sub Area Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }


}
