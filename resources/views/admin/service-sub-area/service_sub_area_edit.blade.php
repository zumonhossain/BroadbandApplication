@extends('layouts.admin')
@section('title')
    Service Sub Area Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Service Sub Area Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('service_sub_area_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="service_sub_area_id" value="{{ $serviceSubArea->service_sub_area_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Service Area Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="service_area_id">
                                    <option value="">-- Select Service Area Name --</option>
                                    @foreach($serviceAreas as $serviceArea)
                                        <option value="{{ $serviceArea->service_area_id }}" {{ $serviceArea->service_area_id == $serviceSubArea->service_area_id ? 'selected': '' }}>{{ $serviceArea->service_area_name }}</option>
                                    @endforeach
                                </select>
                                @error('service_area_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Sub Area Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="service_sub_area_name" class="form-control" value="{{ $serviceSubArea->service_sub_area_name }}">
                                
                                @error('service_sub_area_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Sub Area Remarks<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="service_sub_area_remarks" class="form-control" value="{{ $serviceSubArea->service_sub_area_remarks }}">
                                
                                @error('service_sub_area_remarks')
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