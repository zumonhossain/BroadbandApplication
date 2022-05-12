@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header print_none">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Service Type Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('payment_update_form') }}" method="POST" class="form-horizontal">
                    @csrf

                    <input type="hidden" name="payment_id" value="{{ $payment->payment_id }}">

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Customer ID<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="customer_id" id="customer_id" class="form-control" value="{{ $payment->customer_id }}">
                            @error('customer_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Amount<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="amount" class="form-control" value="{{ $payment->amount }}">
                            @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Payment Method<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="payment_type_id">
                                <option value="">-- Select Payment Method --</option>
                                <option value="1" {{ $payment->payment_type_id == 1 ? 'selected' : '' }}>Hand Cash</option>
                                <option value="2" {{ $payment->payment_type_id == 2 ? 'selected' : '' }}>Bkash</option>
                            </select>
                            @error('payment_type_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Payment Date<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="payment_date" class="form-control" value="{{ $payment->payment_date }}">
                            @error('payment_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Collected By Payment<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="collected_by_id">
                                <option value="">-- Select Collected Name --</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $payment->collected_by_id ? 'selected': '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('collected_by_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Pay Month<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="pay_month">
                                <option value="">-- Select Month --</option>
                                @foreach($months as $month)
                                <option value="{{ $month->month_id }}" {{ $month->month_id == $payment->pay_month ? 'selected': '' }}>{{ $month->month_name_en }}</option>
                                @endforeach
                            </select>
                            @error('pay_month')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Pay Year<span class="require_star">*</span></label>
                        <div class="col-md-7">

                            <select class="form-control" name="pay_year">
                                <option value="{{$payment->pay_year}}">{{$payment->pay_year}}</option>
                                @foreach(range(date('Y')+1, date('Y')-1) as $y)
                                <option value="{{$y}}" {{$y}}>{{$y}}</option>
                                @endforeach
                            </select>
                            @error('pay_year')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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