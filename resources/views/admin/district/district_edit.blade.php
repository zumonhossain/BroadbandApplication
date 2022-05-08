@extends('layouts.admin')
@section('title')
    District Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Division Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('district_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="district_id" value="{{ $district->district_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Division Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="division_id">
                                    <option value="">-- Select Division Name --</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->division_id }}" {{ $division->division_id == $district->division_id ? 'selected': '' }}>{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Division Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="district_name" class="form-control" value="{{ $district->district_name }}">
                                @error('district_name')
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