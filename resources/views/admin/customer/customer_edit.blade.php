@extends('layouts.admin')
@section('title')
    Customer Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-PaymentInfoControllerinfo">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Customer Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}">

                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Customer Name<span class="require_star">*</span></label>
                                    <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" value="{{ $customer->customer_name}}">
                                    @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Father Name</label>
                                    <input type="text" name="father_name" class="form-control" placeholder="Father Name" value="{{ $customer->father_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">email<span class="require_star">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="email" value="{{ $customer->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Application Date<span class="require_star">*</span></label>
                                    <input type="date" name="application_date" class="form-control" value="{{ $customer->application_date }}">
                                    @error('application_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number One<span class="require_star">*</span></label>
                                    <input type="text" name="phone_no1" class="form-control" placeholder="Phone Number One" value="{{ $customer->phone_no1 }}">
                                    @error('phone_no1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number Two</label>
                                    <input type="text" name="phone_no2" class="form-control" placeholder="Phone Number Two" value="{{ $customer->phone_no2 }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Connection Date<span class="require_star">*</span></label>
                                    <input type="date" name="connection_date" class="form-control" value="{{ $customer->connection_date }}">
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
                                            <option value="{{ $aConnection->connection_status_id }}" {{ $aConnection->connection_status_id == $customer->connection_status_id ? 'selected': '' }}>{{ $aConnection->connection_status_name }}</option>
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
                                            <option value="1" {{ $customer->customer_occupation_id == 1 ? 'selected' : '' }}>Public Job</option>
                                            <option value="2" {{ $customer->customer_occupation_id == 2 ? 'selected' : '' }}>Private Job</option>
                                            <option value="3" {{ $customer->customer_occupation_id == 3 ? 'selected' : '' }}>Business</option>
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
                                            <option value="{{ $serviceType->service_type_id }}" {{ $serviceType->service_type_id == $customer->service_type_id ? 'selected': '' }}>{{ $serviceType->service_name }}</option>
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
                                            <option value="{{ $packageInformation->package_id }}" {{ $packageInformation->package_id == $customer->package_id ? 'selected': '' }}>{{ $packageInformation->package_name }}</option>
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
                                            <option value="{{ $division->division_id }}" {{ $division->division_id == $customer->division_id ? 'selected': '' }}>{{ $division->division_name }}</option>
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
                                            <option value="{{ $district->district_id }}" {{ $district->district_id == $customer->district_id ? 'selected': '' }}>{{ $district->district_name }}</option>
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
                                            <option value="{{ $upazila->upazila_id }}" {{ $upazila->upazila_id == $customer->upazila_id ? 'selected': '' }}>{{ $upazila->upazila_name }}</option>
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
                                            <option value="{{ $union->union_id }}" {{ $union->union_id == $customer->union_id ? 'selected': '' }}>{{ $union->union_name }}</option>
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
                                                <option value="{{ $serviceArea->service_area_id }}" {{ $serviceArea->service_area_id == $customer->service_area_id ? 'selected': '' }}>{{ $serviceArea->service_area_name }}</option>
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
                                                <option value="{{ $serviceSubArea->service_sub_area_id }}" {{ $serviceSubArea->service_sub_area_id == $customer->service_sub_area_id ? 'selected': '' }}>{{ $serviceSubArea->service_sub_area_name }}</option>
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
                                    <textarea name="description" class="form-control" id="" rows="1">{{ $customer->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Code<span class="require_star">*</span></label>
                                    <input type="text" name="post_code" class="form-control" placeholder="Post Code" value="{{ $customer->post_code }}">
                                    @error('post_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Road No<span class="require_star">*</span></label>
                                    <input type="text" name="road_no" class="form-control" placeholder="Road No" value="{{ $customer->road_no }}">
                                    @error('road_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">House No<span class="require_star">*</span></label>
                                    <input type="text" name="house_no" class="form-control" placeholder="Road No" value="{{ $customer->house_no }}">
                                    @error('house_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Floor No<span class="require_star">*</span></label>
                                    <input type="text" name="floor_no" class="form-control" placeholder="Floor No" value="{{ $customer->floor_no }}">
                                    @error('floor_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Plate No<span class="require_star">*</span></label>
                                    <input type="text" name="plate_no" class="form-control" placeholder="Floor No" value="{{ $customer->plate_no }}">
                                    @error('plate_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">NID</label>
                                    <input type="text" name="nid" class="form-control" placeholder="Floor No" value="{{ $customer->nid }}">
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
                                    <button type="submit" class="btn btn-info registration-btn">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection