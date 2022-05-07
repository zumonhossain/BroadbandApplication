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
}
