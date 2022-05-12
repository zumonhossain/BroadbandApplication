@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Customer Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="customerId" value="{{ $customer->customerId }}">

                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Customer Name<span class="require_star">*</span></label>
                                    <input type="text" name="customerName" class="form-control" placeholder="Customer Name" value="{{ $customer->customerName }}">
                                    @error('customerName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Father Name</label>
                                    <input type="text" name="fatherName" class="form-control" placeholder="Father Name" value="{{ $customer->fatherName }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email<span class="require_star">*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $customer->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Application Date<span class="require_star">*</span></label>
                                    <input type="date" name="applicationDate" class="form-control" value="{{ $customer->applicationDate }}">
                                    @error('applicationDate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number One<span class="require_star">*</span></label>
                                    <input type="text" name="phoneNo1" class="form-control" placeholder="Phone Number One" value="{{ $customer->phoneNo1 }}">
                                    @error('phoneNo1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number Two</label>
                                    <input type="text" name="phoneNo2" class="form-control" placeholder="Phone Number Two" value="{{ $customer->phoneNo2 }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Connection Date<span class="require_star">*</span></label>
                                    <input type="date" name="connectionDate" class="form-control" value="{{ $customer->connectionDate }}">
                                    @error('connectionDate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Connection Status<span class="require_star">*</span></label>
                                    <select class="form-control" name="connectionStatusId">
                                        <option value="">-- Select Connection Status --</option>
                                            <option value="1" {{ $customer->connectionStatusId == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ $customer->connectionStatusId == 2 ? 'selected' : '' }}>inActive</option>
                                            <option value="3" {{ $customer->connectionStatusId == 3 ? 'selected' : '' }}>Disconnect</option>
                                    </select>
                                    @error('connectionStatusId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Customer Occupation<span class="require_star">*</span></label>
                                    <select class="form-control" name="customerOccupationId">
                                        <option value="">-- Select Occupation --</option>
                                            <option value="1" {{ $customer->customerOccupationId == 1 ? 'selected' : '' }}>Public Job</option>
                                            <option value="2" {{ $customer->customerOccupationId == 2 ? 'selected' : '' }}>Private Job</option>
                                            <option value="3" {{ $customer->customerOccupationId == 3 ? 'selected' : '' }}>Business</option>
                                    </select>
                                    @error('customerOccupationId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Type<span class="require_star">*</span></label>
                                    <select class="form-control" name="serviceTypeId">
                                        <option value="">-- Select Service Type --</option>
                                            @foreach($serviceTypes as $serviceType)
                                            <option value="{{ $serviceType->serviceTypeId }}" {{ $serviceType->serviceTypeId == $customer->serviceTypeId ? 'selected': '' }}>{{ $serviceType->serviceName }}</option>
                                            @endforeach
                                    </select>
                                    @error('serviceTypeId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Package<span class="require_star">*</span></label>
                                    <select class="form-control" name="packageId">
                                        <option value="">-- Select Package --</option>
                                            @foreach($packageInformations as $packageInformation)
                                            <option value="{{ $packageInformation->packageId }}" {{ $packageInformation->packageId == $customer->packageId ? 'selected': '' }}>{{ $packageInformation->packageName }}</option>
                                            @endforeach
                                    </select>
                                    @error('packageId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Division<span class="require_star">*</span></label>
                                    <select class="form-control" name="divisionId">
                                        <option value="">-- Select Division --</option>
                                            @foreach($divisions as $division)
                                            <option value="{{ $division->divisionId }}" {{ $division->divisionId == $customer->divisionId ? 'selected': '' }}>{{ $division->divisionName }}</option>
                                            @endforeach
                                    </select>
                                    @error('divisionId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">District<span class="require_star">*</span></label>
                                    <select class="form-control" name="districtId">
                                        <option value="">-- Select District --</option>
                                            @foreach($districts as $district)
                                            <option value="{{ $district->districtId }}" {{ $district->districtId == $customer->districtId ? 'selected': '' }}>{{ $district->districtName }}</option>
                                            @endforeach
                                    </select>
                                    @error('districtId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Upazila<span class="require_star">*</span></label>
                                    <select class="form-control" name="upazilaId">
                                        <option value="">-- Select Upazila --</option>
                                            @foreach($upazilas as $upazila)
                                            <option value="{{ $upazila->upazilaId }}" {{ $upazila->upazilaId == $customer->upazilaId ? 'selected': '' }}>{{ $upazila->upazilaName }}</option>
                                            @endforeach
                                    </select>
                                    @error('upazilaId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Union<span class="require_star">*</span></label>
                                    <select class="form-control" name="unionId">
                                        <option value="">-- Select Union --</option>
                                            @foreach($unions as $union)
                                            <option value="{{ $union->unionId }}" {{ $union->unionId == $customer->unionId ? 'selected': '' }}>{{ $union->unionName }}</option>
                                            @endforeach
                                    </select>
                                    @error('unionId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Area<span class="require_star">*</span></label>
                                    <select class="form-control" name="serviceAreaId">
                                        <option value="">-- Select Service Area --</option>
                                            @foreach($serviceAreas as $serviceArea)
                                                <option value="{{ $serviceArea->serviceAreaId }}" {{ $serviceArea->serviceAreaId == $customer->serviceAreaId ? 'selected': '' }}>{{ $serviceArea->serviceAreaName }}</option>
                                            @endforeach
                                    </select>
                                    @error('serviceAreaId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Sub Area<span class="require_star">*</span></label>
                                    <select class="form-control" name="serviceSubAreaId">
                                        <option value="">-- Select Service Sub Area --</option>
                                            @foreach($serviceSubAreas as $serviceSubArea)
                                                <option value="{{ $serviceSubArea->serviceSubAreaId }}" {{ $serviceSubArea->serviceSubAreaId == $customer->serviceSubAreaId ? 'selected': '' }}>{{ $serviceSubArea->serviceSubAreaName }}</option>
                                            @endforeach
                                    </select>
                                    @error('serviceSubAreaId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Description<span class="require_star">*</span></label>
                                    <textarea name="description" class="form-control" id="" rows="1" placeholder="Description">{{ $customer->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Code<span class="require_star">*</span></label>
                                    <input type="text" name="postCode" class="form-control" placeholder="Post Code" value="{{ $customer->postCode }}">
                                    @error('postCode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Road No<span class="require_star">*</span></label>
                                    <input type="text" name="roadNo" class="form-control" placeholder="Road No" value="{{ $customer->roadNo }}">
                                    @error('roadNo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">House No<span class="require_star">*</span></label>
                                    <input type="text" name="houseNo" class="form-control" placeholder="Road No" value="{{ $customer->houseNo }}">
                                    @error('houseNo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Floor No<span class="require_star">*</span></label>
                                    <input type="text" name="floorNo" class="form-control" placeholder="Floor No" value="{{ $customer->floorNo }}">
                                    @error('floorNo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Plate No<span class="require_star">*</span></label>
                                    <input type="text" name="plateNo" class="form-control" placeholder="Floor No" value="{{ $customer->plateNo }}">
                                    @error('plateNo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Nid</label>
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