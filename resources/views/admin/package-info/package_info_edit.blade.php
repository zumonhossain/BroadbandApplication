@extends('layouts.admin')
@section('title')
    Package Edit
@endsection
@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Package Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('package_info_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="package_id" value="{{ $packageInfo->package_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Service Type</label>
                            <div class="col-md-7">
                                <select class="form-control" name="service_type_id">
                                    <option value="">-- Select Service Type --</option>
                                    @foreach($serviceTypes as $serviceType)
                                        <option value="{{ $serviceType->service_type_id }}" {{ $serviceType->service_type_id == $packageInfo->service_type_id ? 'selected': '' }}>{{ $serviceType->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="package_name" class="form-control" placeholder="Package Name" value="{{ $packageInfo->package_name }}">
                                @error('package_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Bandwidth</label>
                            <div class="col-md-7">
                                <input type="text" name="package_bandwidth" class="form-control" placeholder="Package Name" value="{{ $packageInfo->package_bandwidth }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Price</label>
                            <div class="col-md-7">
                                <input type="text" name="package_price" class="form-control" placeholder="Package Name" value="{{ $packageInfo->package_price }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Package Code</label>
                            <div class="col-md-7">
                                <input type="text" name="package_code" class="form-control" placeholder="Package Name" value="{{ $packageInfo->package_code }}">
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