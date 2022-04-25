<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class BannerInfoController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewBannerInfoForm(){
        return view('admin.banner-info.banner_add');
    }

    public function insertBannerInfoFormSubmit(Request $request){

        // dd($request->all());

        $this->validate($request, [
            'name'=>'required'
        ],[
            'name.required' => 'Please enter banner name!'
        ]);

        (new CompanyInfoService())
            ->insertBannerInformation(
                $request['name'],
                $request['title'],
                $request['subtitle'],
                $request['url'],
            );

        $notification = array(
            'messege' => 'Banner Save Success!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
