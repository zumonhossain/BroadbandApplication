<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class UnionController extends Controller{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function addNewUnionForm(){
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $unions = (new CompanyInfoService())->getUnionInformation(null);
        return view('admin.union.union_add',compact('unions','upazilas','districts','divisions'));
    }

    public function editUnionInfoForm($id){
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $union = (new CompanyInfoService())->getUnionInformation($id);
        return view('admin.union.union_edit',compact('union','upazilas','districts','divisions'));
    }

    public function insertUnionInfoFormSubmit(Request $request){
        
        $this->validate($request, [
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'union_name' => 'required',
        ],[
            'division_id.required' => 'Please enter division name!',
            'district_id.required' => 'Please enter district name!',
            'upazila_id.required' => 'Please enter upazila name!',
            'union_name.required' => 'Please enter union name!',
        ]);

        $union = (new CompanyInfoService())->insertUnionInformation(
            $request['division_id'],
            $request['district_id'],
            $request['upazila_id'],
            $request['union_name'],
        );

        if($union){
            $notification=array(
                'messege'=>'Union Name Save Success!',
                'alert-type'=>'success',
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'messege'=>'Duplicate data!',
                'alert-type'=>'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function updateUnionInfoFormSubmit(Request $request){
        $this->validate($request, [
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'union_name' => 'required',
        ],[
            'division_id.required' => 'Please enter division name!',
            'district_id.required' => 'Please enter district name!',
            'upazila_id.required' => 'Please enter upazila name!',
            'union_name.required' => 'Please enter union name!',
        ]);

        $union = (new CompanyInfoService())->updateUnionInformation(
            $request['union_id'],
            $request['division_id'],
            $request['district_id'],
            $request['upazila_id'],
            $request['union_name'],
        );

        if($union){
            $notification=array(
                'messege'=>'Union Name Update Success!',
                'alert-type'=>'success',
            );
            return redirect()->route('union_new_form')->with($notification);
        }
        else{
            $notification=array(
                'messege'=>'Duplicate data!',
                'alert-type'=>'error',
            );
            return redirect()->back()->with($notification);
        }
    
    }

}
