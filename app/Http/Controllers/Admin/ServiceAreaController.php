<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class ServiceAreaController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewServiceAreaForm(){
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        return view('admin.service-area.service_area_add',compact('serviceAreas'));
    }

    public function insertServiceAreaFormSubmit(Request $request){
        $this->validate($request, [
            'service_area_name' => 'required',
        ],[
            'serviceAreaName.required' => 'Please enter service area name!',
        ]);

        (new CompanyInfoService())->insertServiceAreaInformation(
            $request['service_area_name'],
            $request['service_area_remarks'],
        );

        $notification=array(
            'messege'=>'Service Area Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editServiceAreaForm($id){
        $serviceArea = (new CompanyInfoService())->getServiceAreaInformation($id);
        return view('admin.service-area.service_area_edit',compact('serviceArea'));
    }

}
