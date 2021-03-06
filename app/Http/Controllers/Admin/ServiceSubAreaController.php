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

    public function editServiceSubAreaForm($id){
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $serviceSubArea = (new CompanyInfoService())->getServiceSubAreaInformation($id);
        return view('admin.service-sub-area.service_sub_area_edit',compact('serviceSubArea','serviceAreas'));
    }

    public function updateServiceSubAreaFormSubmit(Request $request){

        // dd($request->all());

        $this->validate($request, [
            'service_area_id' => 'required',
            'service_sub_area_name' => 'required',
        ],[
            'service_area_id.required' => 'Please enter service area name!',
            'service_sub_area_name.required' => 'Please enter service sub area name!',
        ]);

        (new CompanyInfoService())->updateServiceSubAreaInformation(
            $request['service_sub_area_id'],
            $request['service_area_id'],
            $request['service_sub_area_name'],
            $request['service_sub_area_remarks'],
        );

        $notification=array(
            'messege'=>'Service Sub Area Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('service_sub_area_new_form')->with($notification);
    
    }

    public function deleteServiceSubAreaFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteServiceSubAreaInformation($id);

        $notification=array(
            'messege'=>'Service Sub Area Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
