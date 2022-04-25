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
        $banners = (new CompanyInfoService())->getBannerInformation(null);
        return view('admin.banner-info.banner_add',compact('banners'));
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

    public function editBannerInfoForm($id){
        $banner = (new CompanyInfoService())->getBannerInformation($id);
        return view('admin.banner-info.banner_edit',compact('banner'));
    }

    public function updateBannerInfoFormSubmit(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'name'=>'required'
        ],[
            'name.required' => 'Please enter banner name!'
        ]);

        (new CompanyInfoService())
            ->updateBannerInformation(
                $request['banner_id'],
                $request['name'],
                $request['title'],
                $request['subtitle'],
                $request['url']
            );

        $notification = array(
            'messege' => 'Banner Update Success!',
            'alert-type' => 'success',
        );

        return redirect()->route('banner_new_form')->with($notification);
    }

    public function deleteBannerInformationFormSubmit(Request $request){
        $id = $request['modal_id'];

        (new CompanyInfoService())->deleteBannerInformation($id);

        $notification = array(
            'messege' => 'Banner Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
