@extends('layouts.admin')
@section('title')
    Daily Cost Add
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Daily Cost</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('daily_cost_insert_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Debit Type</label>
                            <div class="col-md-7">
                                <select class="form-control" name="debit_type_id">
                                    <option value="">-- Select Debit Type --</option>
                                    @foreach($debitTypes as $debitType)
                                        <option value="{{ $debitType->debit_type_id }}">{{ $debitType->debit_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Expense Date</label>
                            <div class="col-md-7">
                                <input type="date" name="expense_date" class="form-control" placeholder="Expense Date" value="{{ old('expense_date') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Amount<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
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
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                        <option value="{{ $month->month_id }}">{{ $month->month_name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Voucher</label>
                            <div class="col-md-7">
                                <input type="file" name="voucherFilePath" class="form-control">
                            </div>
                        </div> -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Daily Cost Information</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Expense By</th>
                                <th>Amount</th>
                                <th>Expense Date</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyCost as $aCost)
                            <tr>
                                <td>{{ $aCost->user->name }}</td>
                                <td>{{ $aCost->amount }}</td>
                                <td>{{ $aCost->expense_date }}</td>
                                <td>
                                    <a class="btn-info edit-icon" href="{{ route('daily_cost_edit_form',$aCost->daily_cost_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $aCost->daily_cost_id }}" href="#"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('daily_cost_delete_form') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header modal_header_title">
                        <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
                    </div>
                    <div class="modal-body modal_card">
                        <input type="hidden" name="modal_id" id="modal_id" />
                        Are you want to sure delete this data?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Confirm</button>
                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection