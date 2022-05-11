<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use Auth;

class DailyCostController extends Controller{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function addNewDailyCostForm(){
        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $debitTypes = (new CompanyInfoService())->getDebitTypeInformation(null);
        $dailyCost = (new CompanyInfoService())->getDailyCostInformation(null);
        return view('admin.daily-cost.daily_cost_add',compact('dailyCost','users','debitTypes','months'));
    }

    public function insertDailyCostFormSubmit(Request $request){

        $this->validate($request, [
            'amount' => 'required',
        ],[
            'amount.required' => 'Please enter amount!',
        ]);

        $creator = Auth::user()->id;

        (new CompanyInfoService())->insertDailyCostInformation(
            $request['transaction_id'],
            $request['debit_type_id'],
            $request['expense_date'],
            $request['amount'],
            $request['debited_to_id'],
            $request['credited_from_id'],
            $request['expense_by_id'],
            $request['year'],
            $request['month_id'],
            $request['voucher_file_path'],
            $request['approve_Status'],
            $creator,
        );
        
        $notification=array(
            'messege'=>'Daily Cost Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editDailyCostForm($id){
        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $debitTypes = (new CompanyInfoService())->getDebitTypeInformation(null);
        $dailyCost = (new CompanyInfoService())->getDailyCostInformation($id);
        return view('admin.daily-cost.daily_cost_edit',compact('dailyCost','debitTypes','users','months'));
    }

    public function updateDailyCostFormSubmit(Request $request){

        // dd($request->all());

        $creator = Auth::user()->id;

        (new CompanyInfoService())->updateDailyCostInformation(
            $request['daily_cost_id'],
            $request['transaction_id'],
            $request['debit_type_id'],
            $request['expense_date'],
            $request['amount'],
            $request['debited_to_id'],
            $request['credited_from_id'],
            $request['expense_by_id'],
            $request['year'],
            $request['month_id'],
            $request['voucher_file_path'],
            $request['approve_Status'],
            $creator,
        );

        $notification=array(
            'messege'=>'DailyCost Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('daily_cost_new_form')->with($notification);
    
    }

    public function deleteDailyCostFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteDailyCostInformation($id);

        $notification=array(
            'messege'=>'DailyCost Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
