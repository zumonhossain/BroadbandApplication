<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class DistrictController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewDistrictForm(){
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);

        return view('admin.district.district_add', compact('districts', 'divisions'));
    }

    public function editDistrictInfoForm($id){
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $district = (new CompanyInfoService())->getDistrictInformation($id);

        return view('admin.district.district_edit', compact('district', 'divisions'));
    }



    public function insertDistrictInfoFormSubmit(Request $request){
        $this->validate($request, [
            'division_id' => 'required',
            'district_name' => 'required',
        ], [
            'division_id.required' => 'Please enter division name!',
            'district_name.required' => 'Please enter district name!',
        ]);

        $district = (new CompanyInfoService())->insertDistrictInformation(
            $request['division_id'],
            $request['district_name'],
        );

        if($district){
            $notification = array(
                'messege' => 'District Save Success!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Duplicate data!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }



}
