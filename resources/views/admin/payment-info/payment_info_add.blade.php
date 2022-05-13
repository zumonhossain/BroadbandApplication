@extends('layouts.admin')
@section('title')
    Payment Add
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Payment Information</h4>
                </div>
                <div class="card-body">

                    <div class="searchBy">
                        <div class="row">
                            <div class="col-md-3">
                                <h2 class="text-right pt-4">Search By</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="radio" type="radio"   value="customer_name" checked class="custom-control-input">
                                            
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Name</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="radio" type="radio" value ="phone_no"  class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Phone Number</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="radio" type="radio" value ="id" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">ID</span>
                                        </label>
                                        <div class="pt-2">
                                            <input class="form-control" placeholder="Search" type="text" name="customer_info" id="customer_info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <button class="btn btn-info" onClick="searchEmployeeDetails()">Search</button>
                            </div><br>
                        </div>
                    </div>

                    <div id="showCustomerDetails" class="d-none" style="">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <table class="table table-bordered table-striped table-hover custom_table">
                                    <tr>
                                        <td>ID:</td>
                                        <td>:</td>
                                        <td><span id="show_customer_id" class="customer"></span> </td>
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td>:</td>
                                        <td><span id="show_customer_name" class="customer"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>:</td>
                                        <td><span id="show_customer_address" class="customer"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number:</td>
                                        <td>:</td>
                                        <td><span id="show_customer_phoneNo1" class="customer"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Connection Status:</td>
                                        <td><span id="show_customer_connection_status" class="customer"></span></td>
                                        <td colspan="3">Active</td>
                                    </tr>
                                    <tr>
                                        <td>Image:</td>
                                        <td>:</td>
                                        <td>
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <form action="{{ route('payment_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Customer ID<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="Enter Customer ID" >
                                    @error('customer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Amount<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
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
                                        <option value="1">Hand Cash</option>
                                        <option value="2">Bkash</option>
                                    </select>
                                    @error('payment_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Payment Date<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="date" name="payment_date" class="form-control" placeholder="Payment Date" value="{{ old('payment_date') }}">
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
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('collected_by_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Transaction No<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="date" name="transaction_no" class="form-control" placeholder="Transaction No" value="{{ old('transaction_no') }}">
                                    @error('transaction_no')
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
                                            <option value="{{ $month->month_id }}">{{ $month->month_name_en }}</option>
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
                                        <option value="{{date('Y')}}" >{{date('Y')}}</option>
                                            @foreach(range(date('Y')+1, date('Y')-1) as $y)
                                                <option value="{{$y}}" {{$y}} >{{$y}}</option>
                                            @endforeach
                                    </select>
                                    @error('pay_year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info registration-btn">Save</button>
                            </div>
                        </form>
                    </div>


                    <div class="row pt-5">
                        <div class="col-lg-12">
                            <div class="card card-outline-info">
                                <div class="card-header print_none">
                                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Payment Information</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover custom_table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Date</th>
                                                <th>Collected</th>
                                                <th>Month</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->customer->customer_name }}</td>
                                                <td>{{ $payment->amount }}</td>
                                                <td>{{ $payment->payment_type_id }}</td>
                                                <td>{{ $payment->payment_date }}</td>
                                                <td>{{ $payment->user->name }}</td>
                                                <td>{{ $payment->month->month_name_en }}</td>
                                                <td>
                                                    <a class="btn-info edit-icon" href="{{ route('payment_edit_form',$payment->payment_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $payment->payment_id }}" href="#"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('payment_delete_form') }}">
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






    <!-- ================= Search Employee Details ================= -->
    <script type="text/javascript">
        function searchEmployeeDetails() {
            var value_type = $(".custom-control-input:checked").val();
            var value = $("input[id='customer_info']").val();
        
            // alert('hhh');
            $.ajax({
                type: 'POST',
                url: "{{ route('search_customer_information') }}",
                data: {
                value: value,
                value_type: value_type
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status_code != 200) {
                        alert(response.status_code);
                    }else{
                        $("#showCustomerDetails").removeClass("d-none").addClass("d-block");
                        var customer = response.data[0]
                        // alert();
                        $("input[id='customer_id']").val(customer.customer_id);
                        $("span[id='show_customer_id']").text(customer.customer_id);
                        $("span[id='show_customer_name']").text(customer.customer_name);
                        $("span[id='show_customer_phoneNo1']").text(customer.phone_no1);
                        var address = customer.description + ',' +customer.post_code + ',' +customer.road_no+ ',' +customer.house_no+ ',' +customer.floor_no + ',' +customer.plate_no 
                        $("span[id='show_customer_address']").text(address);
                    }
                }
            });
        }
  </script>
@endsection