@extends('layouts.admin')
@section('title')
    Upazila Add
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Upazila Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('upazila_insert_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Division Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="division_id">
                                    <option value="">-- Select Division Name --</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">District Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="district_id">
                                    <option value="">-- Select District Name --</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Upazila Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="upazila_name" class="form-control" placeholder="Upazila Name" value="{{ old('upazila_name') }}">
                                @error('upazila_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Upazila Information</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Upazila Name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upazilas as $upazila)
                            <tr>
                                <td>{{ $upazila->division->division_name }}</td>
                                <td>{{ $upazila->district->district_name }}</td>
                                <td>{{ $upazila->upazila_name }}</td>
                                <td>
                                    <a class="btn-info edit-icon" href="{{ route('upazila_edit_form',$upazila->upazila_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $upazila->upazila_id }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('upazila_delete_form') }}">
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