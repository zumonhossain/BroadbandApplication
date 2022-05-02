<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller{

    /* =================================================================
    ==================== COMPANY PROFILE FILE UPLOAD ================
    ================================================================= */



    public function uploadCompanyLogo(Request $request) {
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = "uploads/company_profile";
            $fileName = rand(100000,999999).'.jpg';
            $file->move($destinationPath,$fileName);
            return $destinationPath.'/'.$fileName;
        }

        return '';
    }
    
    public function uploadCompanyProfileOwner1Photo(Request $request) {
        if($request->hasFile('owner_photo1')) {
            $file = $request->file('owner_photo1');
            $destinationPath = "uploads/company_profile";
            $fileName = rand(100000,999999).'.jpg';
            $file->move($destinationPath,$fileName);
            return $destinationPath.'/'.$fileName;
        }

        return '';
    }

    public function uploadCompanyProfileOwner2Photo(Request $request) {
        if($request->hasFile('owner_photo2')) {
            $file = $request->file('owner_photo2');
            $destinationPath = "uploads/company_profile";
            $fileName = rand(100000,999999).'.jpg';
            $file->move($destinationPath,$fileName);
            return $destinationPath.'/'.$fileName;
        }

        return '';
    }
}
