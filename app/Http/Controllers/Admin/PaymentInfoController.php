<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Service\CustomerInfoService;
use App\Http\Controllers\Service\CustomerPaymentInfoService;
use Illuminate\Http\Request;
use Auth;

class PaymentInfoController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addNewPaymentInfoForm(){
        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $payments = (new CustomerPaymentInfoService())->getPaymentInformation(null);
        return view('admin.payment-info.payment_info_add', compact('payments', 'users', 'months'));
    }

    public function editPaymentInfoForm($id){
        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $payment = (new CustomerPaymentInfoService())->getPaymentInformation($id);
        return view('admin.payment-info.payment_info_edit', compact('payment', 'users', 'months'));
    }

    public function insertPaymentInfoFormSubmit(Request $request){
        $this->validate($request, [
            'customer_id' => 'required',
            'amount' => 'required',
            'payment_type_id' => 'required',
            'payment_date' => 'required',
            'collected_by_id' => 'required',
            'transaction_no' => 'required',
            'pay_month' => 'required',
            'pay_year' => 'required',
        ], [
            'customer_id.required' => 'Please select customer Id!',
            'amount.required' => 'Please enter amount!',
            'payment_type_id.required' => 'Please select payment method!',
            'payment_date.required' => 'Please enter payment date!',
            'collected_by_id.required' => 'Please enter collected by name!',
            'transaction_no.required' => 'Please enter transaction no!',
            'pay_month.required' => 'Please enter pay month!',
            'pay_year.required' => 'Please enter pay year!',
        ]);

        $creator = Auth::user()->id;

        (new CustomerPaymentInfoService())->insertPaymentInformation(
            $request['customer_id'],
            $request['amount'],
            $request['payment_type_id'],
            $request['payment_date'],
            $request['collected_by_id'],
            $request['transaction_no'],
            $request['pay_month'],
            $request['pay_year'],
            $creator,
        );

        $acustomer = (new CustomerInfoService())->getCustomerInformation($request['customer_id']);
        if ($acustomer != null) {

            //  $this->sendCustomerPaymentSMS($acustomer->phoneNo1, $request['pay_month']);

        }

        $notification = array(
            'messege' => 'Payment Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updatePaymentInfoFormSubmit(Request $request){
        // dd($request->all());

        $creator = Auth::user()->id;

        (new CustomerPaymentInfoService())->updatePaymentInformation(
            $request['payment_id'],
            $request['customer_id'],
            $request['amount'],
            $request['payment_type_id'],
            $request['payment_date'],
            $request['collected_by_id'],
            $request['transaction_no'],
            $request['pay_month'],
            $request['pay_year'],
            $creator,
        );

        $notification = array(
            'messege' => 'Payment Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('payment_new_form')->with($notification);
    }

    public function deletePaymentInfoFormSubmit(Request $request){

        $id = $request['modal_id'];

        (new CustomerPaymentInfoService())->deletePaymentInformation($id);

        $notification = array(
            'messege' => 'Payment Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
