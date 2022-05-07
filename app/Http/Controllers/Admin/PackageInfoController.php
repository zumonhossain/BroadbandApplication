<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class PackageInfoController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewPackageInfoForm(){
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $packageInformations = (new CompanyInfoService())->getPackageInformation(null);
        return view('admin.package-info.package_info_add',compact('packageInformations','serviceTypes'));
    }

    public function insertPackageInfoFormSubmit(Request $request){
        $this->validate($request, [
            'package_name' => 'required',
        ],[
            'package_name.required' => 'Please enter package name!',
        ]);

        (new CompanyInfoService())->insertPackageInformation(
            $request['service_type_id'],
            $request['package_name'],
            $request['package_bandwidth'],
            $request['package_price'],
            $request['package_code']
        );

        $notification = array(
            'messege' => 'Package Info Save Success!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function editPackageInfoForm($id){
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $packageInfo = (new CompanyInfoService())->getPackageInformation($id);
        return view('admin.package-info.package_info_edit',compact('packageInfo','serviceTypes'));
    }

    public function updatePackageInforFormSubmit(Request $request){
        $this->validate($request, [
            'package_name' => 'required',
        ],[
            'package_name.required' => 'Please enter package name!',
        ]);

        (new CompanyInfoService())->updatePackageInformation(
            $request['package_id'],
            $request['service_type_id'],
            $request['package_name'],
            $request['package_bandwidth'],
            $request['package_price'],
            $request['package_code']
        );

        $notification = array(
            'messege' => 'Package Info Update Success!',
            'alert-type' => 'success',
        );

        return redirect()->route('package_info_new_form')->with($notification);
    }

    public function deletePackageInfoFormSubmit(Request $request){
        $id = $request['modal_id'];

        (new CompanyInfoService())->deletePackageInforamtion($id);

        $notification=array(
            'messege'=>'Package Info Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
