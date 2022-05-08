<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class UpazilaController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewUpazilaForm(){
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        return view('admin.upazila.upazila_add', compact('upazilas', 'districts','divisions'));
    }

    public function editUpazilaInfoForm($id){
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $upazila = (new CompanyInfoService())->getUpazilaInformation($id);
        return view('admin.upazila.upazila_edit', compact('upazila', 'districts','divisions'));
    }

    public function insertUpazilaInfoFormSubmit(Request $request){

        $this->validate($request, [
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_name' => 'required',
        ], [
            'division_id.required' => 'Please enter division name!',
            'district_id.required' => 'Please enter district name!',
            'upazila_name.required' => 'Please enter upazila name!',
        ]);

        $upazila = (new CompanyInfoService())->insertUpazilaInformation(
            $request['division_id'],
            $request['district_id'],
            $request['upazila_name'],
        );
        
        if($upazila){
            $notification = array(
                'messege' => 'Upazila Name Save Success!',
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

    public function updateUpazilaInfoFormSubmit(Request $request){
        $this->validate($request, [
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_name' => 'required',
        ], [
            'division_id.required' => 'Please enter division name!',
            'district_id.required' => 'Please enter district name!',
            'upazila_name.required' => 'Please enter upazila name!',
        ]);

        (new CompanyInfoService())->updateUpazilaInformation(
            $request->upazila_id,
            $request['division_id'],
            $request['district_id'],
            $request['upazila_name'],
        );

        $notification = array(
            'messege' => 'Upazila Name Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('upazila_new_form')->with($notification);
    }

    public function deleteUpazilaInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteUpazilaInformation($id);

        $notification = array(
            'messege' => 'Upazila Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
