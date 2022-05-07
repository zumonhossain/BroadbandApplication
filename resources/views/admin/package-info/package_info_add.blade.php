@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Package Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('package_info_insert_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Service Type</label>
                            <div class="col-md-7">
                                <select class="form-control" name="service_type_id">
                                    <option value="">-- Select Service Type --</option>
                                    @foreach($serviceTypes as $serviceType)
                                        <option value="{{ $serviceType->service_type_id }}">{{ $serviceType->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="package_name" class="form-control" placeholder="Package Name" value="{{ old('package_name') }}">
                                @error('package_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Bandwidth</label>
                            <div class="col-md-7">
                                <input type="text" name="package_bandwidth" class="form-control" placeholder="Package Name" value="{{ old('package_bandwidth') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Price</label>
                            <div class="col-md-7">
                                <input type="text" name="package_price" class="form-control" placeholder="Package Name" value="{{ old('package_price') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Package Code</label>
                            <div class="col-md-7">
                                <input type="text" name="package_code" class="form-control" placeholder="Package Name" value="{{ old('package_code') }}">
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Package Information</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Service Type</th>
                                <th>Package Name</th>
                                <th>Bandwidth</th>
                                <th>Price</th>
                                <th>Code</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packageInformations as $packageInformation)
                            <tr>
                                <td>{{ $packageInformation->serviceType->service_name }}</td>
                                <td>{{ $packageInformation->package_name }}</td>
                                <td>{{ $packageInformation->package_bandwidth }}</td>
                                <td>{{ $packageInformation->package_price }}</td>
                                <td>{{ $packageInformation->package_code }}</td>
                                <td>
                                    <a class="btn-info edit-icon" href="{{ route('package_info_edit_form',$packageInformation->package_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    
                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $packageInformation->package_id }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('package_info_delete_form') }}">
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