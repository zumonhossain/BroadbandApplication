<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use Auth;

class ProductPurchaseController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewProductPurchaseForm(){
        $months = (new CompanyInfoService())->getMonths(null);
        $productPurchases = (new CompanyInfoService())->getProductPurchaseInformation(null);
        return view('admin.product-purchase.product_purchase_add', compact('productPurchases', 'months'));
    }
    
    public function insertProductPurchaseFormSubmit(Request $request){
        $this->validate($request, [
            'total_bandwith' => 'required',
        ], [
            'total_bandwith.required' => 'Please enter total bandwith!',
        ]);

        $creator = Auth::user()->id;

        (new CompanyInfoService())->insertProductPurchaseInformation(
                $request['total_bandwith'],
                $request['facebook_bandwith'],
                $request['youtube_bandwith'],
                $request['others_bandwith'],
                $request['total_amount'],
                $request['purchase_form_id'],
                $request['month_id'],
                $request['year'],
                $request['paid_amount'],
                $creator,
            );

        $notification = array(
            'messege' => 'Product Purchase Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
