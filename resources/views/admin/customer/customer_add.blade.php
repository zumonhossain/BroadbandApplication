@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Customer Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer_insert_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Customer Name<span class="require_star">*</span></label>
                                    <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" value="{{ old('customer_name') }}">
                                    @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Father Name</label>
                                    <input type="text" name="father_name" class="form-control" placeholder="Father Name" value="{{ old('father_name') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">email<span class="require_star">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Application Date<span class="require_star">*</span></label>
                                    <input type="date" name="application_date" class="form-control" value="{{ old('application_date') }}">
                                    @error('application_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number One<span class="require_star">*</span></label>
                                    <input type="text" name="phone_no1" class="form-control" placeholder="Phone Number One" value="{{ old('phone_no1') }}">
                                    @error('phone_no1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number Two</label>
                                    <input type="text" name="phone_no2" class="form-control" placeholder="Phone Number Two" value="{{ old('phone_no2') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Connection Date<span class="require_star">*</span></label>
                                    <input type="date" name="connection_date" class="form-control" value="{{ old('connection_date') }}">
                                    @error('connection_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Connection Status<span class="require_star">*</span></label>
                                    <select class="form-control" name="connection_status_id">
                                        <option value="">-- Select Service Type --</option>
                                            @foreach($connectionStatus as $aConnection)
                                            <option value="{{ $aConnection->connection_status_id }}">{{ $aConnection->connection_status_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('connection_status_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Customer Occupation<span class="require_star">*</span></label>
                                    <select class="form-control" name="customer_occupation_id">
                                        <option value="">-- Select Occupation --</option>
                                            <option value="1">Public Job</option>
                                            <option value="2">Private Job</option>
                                            <option value="3">Business</option>
                                    </select>
                                    @error('customer_occupation_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Type<span class="require_star">*</span></label>
                                    <select class="form-control" name="service_type_id">
                                        <option value="">-- Select Service Type --</option>
                                            @foreach($serviceTypes as $serviceType)
                                            <option value="{{ $serviceType->service_type_id }}">{{ $serviceType->service_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('service_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Package<span class="require_star">*</span></label>
                                    <select class="form-control" name="package_id">
                                        <option value="">-- Select Package --</option>
                                            @foreach($packageInformations as $packageInformation)
                                            <option value="{{ $packageInformation->package_id }}">{{ $packageInformation->package_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('package_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Division<span class="require_star">*</span></label>
                                    <select class="form-control" name="division_id">
                                        <option value="">-- Select Division --</option>
                                            @foreach($divisions as $division)
                                            <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">District<span class="require_star">*</span></label>
                                    <select class="form-control" name="district_id">
                                        <option value="">-- Select District --</option>
                                            @foreach($districts as $district)
                                            <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Upazila<span class="require_star">*</span></label>
                                    <select class="form-control" name="upazila_id">
                                        <option value="">-- Select Upazila --</option>
                                            @foreach($upazilas as $upazila)
                                            <option value="{{ $upazila->upazila_id }}">{{ $upazila->upazila_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('upazila_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Union<span class="require_star">*</span></label>
                                    <select class="form-control" name="union_id">
                                        <option value="">-- Select Union --</option>
                                            @foreach($unions as $union)
                                            <option value="{{ $union->union_id }}">{{ $union->union_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('union_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Area<span class="require_star">*</span></label>
                                    <select class="form-control" name="service_area_id">
                                        <option value="">-- Select Service Area --</option>
                                            @foreach($serviceAreas as $serviceArea)
                                                <option value="{{ $serviceArea->service_area_id }}">{{ $serviceArea->service_area_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('service_area_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Sub Area<span class="require_star">*</span></label>
                                    <select class="form-control" name="service_sub_area_id">
                                        <option value="">-- Select Service Sub Area --</option>
                                            @foreach($serviceSubAreas as $serviceSubArea)
                                                <option value="{{ $serviceSubArea->service_sub_area_id }}">{{ $serviceSubArea->service_sub_area_name }}</option>
                                            @endforeach
                                    </select>
                                    @error('service_sub_area_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Description<span class="require_star">*</span></label>
                                    <textarea name="description" class="form-control" id="" rows="1" placeholder="description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Code<span class="require_star">*</span></label>
                                    <input type="text" name="post_code" class="form-control" placeholder="Post Code" value="{{ old('post_code') }}">
                                    @error('post_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Road No<span class="require_star">*</span></label>
                                    <input type="text" name="road_no" class="form-control" placeholder="Road No" value="{{ old('road_no') }}">
                                    @error('road_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">House No<span class="require_star">*</span></label>
                                    <input type="text" name="house_no" class="form-control" placeholder="Road No" value="{{ old('house_no') }}">
                                    @error('house_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Floor No<span class="require_star">*</span></label>
                                    <input type="text" name="floor_no" class="form-control" placeholder="Floor No" value="{{ old('floor_no') }}">
                                    @error('floor_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Plate No<span class="require_star">*</span></label>
                                    <input type="text" name="plate_no" class="form-control" placeholder="Floor No" value="{{ old('plate_no') }}">
                                    @error('plate_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">NID</label>
                                    <input type="text" name="nid" class="form-control" placeholder="Floor No" value="{{ old('nid') }}">
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Photo<span class="require_star">*</span></label>
                                    <div class="col-md-6 pl-0">
                                        <input type="file" name="photo" onchange="mainThambUrl(this)"><br>
                                    </div>
                                    <img src="" alt="" id="mainThmb">
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info registration-btn">Save</button>
                                </div>
                            </div>
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Customer Information</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone_no1 }}</td>
                                <td>
                                    {{ $customer->upazila->upazila_name }},
                                    {{ $customer->union->union_name }},
                                    {{ $customer->road_no }},
                                    {{ $customer->house_no }}
                                </td>
                                <td>
                                    <a class="btn-info edit-icon" href="{{ route('customer_edit_form',$customer->customer_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $customer->customer_id }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('customer_delete_form') }}">
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