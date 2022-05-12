<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentInfo;
use Carbon\Carbon;

class CustomerPaymentInfoService extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getPaymentInformation($id){
        if ($id == null) {
            return PaymentInfo::where('payment_status', 1)->get();
        } else {
            return PaymentInfo::where('payment_id', $id)->first();
        }
    }
    public function insertPaymentInformation($customer_id, $amount, $payment_type_id, $payment_date, $collected_by_id, $transaction_no, $pay_month, $pay_year, $creator){
        return PaymentInfo::insertGetId([
            'customer_id' => $customer_id,
            'amount' => $amount,
            'payment_type_id' => $payment_type_id,
            'payment_date' => $payment_date,
            'collected_by_id' => $collected_by_id,
            'transaction_no' => $transaction_no,
            'pay_month' => $pay_month,
            'pay_year' => $pay_year,
            'creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function updatePaymentInformation($id, $customer_id, $amount, $payment_type_id, $payment_date, $collected_by_id, $transaction_no, $pay_month, $pay_year, $creator){
        return PaymentInfo::where('payment_id', $id)->update([
            'customer_id' => $customer_id,
            'amount' => $amount,
            'payment_type_id' => $payment_type_id,
            'payment_date' => $payment_date,
            'collected_by_id' => $collected_by_id,
            'transaction_no' => $transaction_no,
            'pay_month' => $pay_month,
            'pay_year' => $pay_year,
            'creator' => $creator,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deletePaymentInformation($id){
        return PaymentInfo::where('payment_id', $id)->update([
            'payment_status' =>0
        ]);
    }
}
