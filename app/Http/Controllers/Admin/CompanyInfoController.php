<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Helpers\FileUploadController;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function CompanyProfileInfoForm(){
        $companyProfile = (new CompanyInfoService())->getCompanyProfileInformation(null);
        return view('admin.company-profile.company_profile_update', compact('companyProfile'));
    }

    public function updateCompanyProfileInfoFormSubmit(Request $request){

        // dd($request->all());

        $comInfo =  (new CompanyInfoService())->getCompanyProfileInformation();

        if ($comInfo == null) {
            (new CompanyInfoService())->insertCompanyProfileInformation($request);
        }
        else {
            (new CompanyInfoService())->updateCompanyProfileInformation(
                $request->company_profile_id,
                $request['com_name_bangla'],
                $request['com_name_english'],
                $request['company_title'],
                $request['company_sub_title'],
                $request['address'],
                $request['owner_name1'],
                $request['owner_name2'],
                $request['mobile_no1'],
                $request['mobile_no2'],
                $request['email1'],
                $request['email2'],
                $request['support_mobile_number'],
                $request['description'],
                $request['company_mission'],
                $request['company_vission'],
                $request['web_address'],
                $request['trade_license'],
                $request['iSP_license'],
                $request['extra1'],
                $request['extra2'],
                $request['extra3'],
            );
        }


        $companyLogo = (new FileUploadController())->uploadCompanyLogo($request);
        (new CompanyInfoService())->updateCompanyUploadFileDBPath('logo', $companyLogo);

        $ownerPhoto1 = (new FileUploadController())->uploadCompanyProfileOwner1Photo($request);
        (new CompanyInfoService())->updateCompanyUploadFileDBPath('owner_photo1', $ownerPhoto1);

        $ownerPhoto2 = (new FileUploadController())->uploadCompanyProfileOwner2Photo($request);
        (new CompanyInfoService())->updateCompanyUploadFileDBPath('owner_photo2', $ownerPhoto2);


        //  $tradeLicense = $uploadObj->uploadCompanyTradeLicense($request);
        //  $ispLicense = $uploadObj->uploadCompanyISPLicense($request);

        $notification = array(
            'messege' => 'Company Profile Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('company_profile_form')->with($notification);
    }
}
