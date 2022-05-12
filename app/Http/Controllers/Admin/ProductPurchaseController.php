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

    public function editProductPurchaseForm($id){
        $years = (new CompanyInfoService())->getProductPurchaseInformation(null);
        $months = (new CompanyInfoService())->getMonths(null);
        $productPurchase = (new CompanyInfoService())->getProductPurchaseInformation($id);

        return view('admin.product-purchase.product_purchase_edit', compact('productPurchase', 'months', 'years'));
    }
    
    public function updateProductPurchaseFormSubmit(Request $request){
        $this->validate($request, [
            'total_bandwith' => 'required',
        ], [
            'total_bandwith.required' => 'Please enter total bandwith!',
        ]);
        
        // dd($request->all());
        $creator = Auth::user()->id;

        (new CompanyInfoService())->updateProductPurchaseInformation(
            $request['product_purchase_id'],
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
            'messege' => 'Product Purchase Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('product_purchase_new_form')->with($notification);
    }

    public function deleteProductPurchaseFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteProductPurchaseInformation($id);

        $notification = array(
            'messege' => 'Product Purchase Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
