@extends('layouts.admin')
@section('title')
    Banner Add
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Banner Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner_insert_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control" placeholder="Banner Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner Title<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="title" class="form-control" placeholder="Banner Title" value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner SubTitle<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="subtitle" class="form-control" placeholder="Banner SubTitle" value="{{ old('subtitle') }}">
                                @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner URL<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="url" class="form-control" placeholder="Banner URL" value="{{ old('url') }}">
                                @error('url')
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Banner Information</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>SubTitle</th>
                                <th>URL</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $aBanner)
                                <tr>
                                    <td>{{ $aBanner->banner_name }}</td>
                                    <td>{{ $aBanner->banner_title }}</td>
                                    <td>{{ $aBanner->banner_subtitle }}</td>
                                    <td>{{ $aBanner->banner_url }}</td>
                                    <td>
                                        <a class="btn-info edit-icon" href="{{ route('banner_edit_form',$aBanner->banner_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="#" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('banner_delete_form') }}">
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