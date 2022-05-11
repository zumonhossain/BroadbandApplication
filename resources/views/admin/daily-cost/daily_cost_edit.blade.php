@extends('layouts.admin')
@section('title')
    Daily Cost Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Division Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('daily_cost_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="daily_cost_id" value="{{ $dailyCost->daily_cost_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Debit Type</label>
                            <div class="col-md-7">
                                <select class="form-control" name="debit_type_id">
                                    <option value="">-- Select Debit Type --</option>
                                    @foreach($debitTypes as $debitType)
                                        <option value="{{ $debitType->debit_type_id }}" {{ $debitType->debit_type_id == $dailyCost->debit_type_id ? 'selected': '' }}>{{ $debitType->debit_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Expense Date</label>
                            <div class="col-md-7">
                                <input type="date" name="expense_date" class="form-control" placeholder="Expense Date" value="{{ $dailyCost->expense_date }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Amount<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ $dailyCost->amount }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Expense By</label>
                            <div class="col-md-7">
                                <select class="form-control" name="expense_by_id">
                                    <option value="">-- Select User List --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $dailyCost->expense_by_id ? 'selected': '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Year</label>
                            <div class="col-md-7">
                                <select class="form-control" name="year">
                                    <option value="{{date('Y')}}" >{{date('Y')}}</option>
                                    @foreach(range(date('Y')+1, date('Y')-1) as $y)
                                        <option value="{{$y}}" {{$y}} >{{$y}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Month</label>
                            <div class="col-md-7">
                                <select class="form-control" name="month_id">
                                    <option value="">-- Select Month --</option>
                                    @foreach($months as $month)
                                        <option value="{{ $month->month_id }}" {{ $month->month_id == $dailyCost->month_id ? 'selected': '' }}>{{ $month->month_name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection