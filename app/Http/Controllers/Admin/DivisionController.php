<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class DivisionController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewDivisionInfoForm(){
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        return view('admin.division.division_add', compact('divisions'));
    }

    public function insertDivisionInfoFormSubmit(Request $request){
        $this->validate($request, [
            'division_name' => 'required',
        ],[
            'division_name.required' => 'Please enter division name!'
        ]);

        (new CompanyInfoService())->insertDivisionInformation(
            $request['division_name']
        );

        $notification = array(
            'messege' => 'Division Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
