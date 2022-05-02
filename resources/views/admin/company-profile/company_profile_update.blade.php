@extends('layouts.admin')
@section('title')
    Company Profile Update
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Company Profile Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('company_profile_update_form') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="company_profile_id" value="{{ $companyProfile->company_profile_id }}">

                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Name Bangla<span class="require_star">*</span></label>
                                    <input type="text" name="com_name_bangla" class="form-control" value="{{ $companyProfile->com_name_bangla }}">
                                    @error('com_name_bangla')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Name English</label>
                                    <input type="text" name="com_name_english" class="form-control" value="{{ $companyProfile->com_name_english }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Title</label>
                                    <input type="text" name="company_title" class="form-control" value="{{ $companyProfile->company_title }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company SubTitle</label>
                                    <input type="text" name="company_sub_title" class="form-control" value="{{ $companyProfile->company_sub_title }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $companyProfile->address }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Name 1</label>
                                    <input type="text" name="owner_name1" class="form-control" value="{{ $companyProfile->owner_name1 }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Name 2</label>
                                    <input type="text" name="owner_name2" class="form-control" value="{{ $companyProfile->owner_name2 }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile No 1</label>
                                    <input type="text" name="mobile_no1" class="form-control" value="{{ $companyProfile->mobile_no1 }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile No 2</label>
                                    <input type="text" name="mobile_no2" class="form-control" value="{{ $companyProfile->mobile_no2 }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email 1</label>
                                    <input type="text" name="email1" class="form-control" value="{{ $companyProfile->email1 }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email 2</label>
                                    <input type="text" name="email2" class="form-control" value="{{ $companyProfile->email2 }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Support Mobile Number</label>
                                    <input type="text" name="support_mobile_number" class="form-control" value="{{ $companyProfile->support_mobile_number }}">
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Mission</label>
                                    <input type="text" name="company_mission" class="form-control" value="{{ $companyProfile->company_mission }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Vission</label>
                                    <input type="text" name="company_vission" class="form-control" value="{{ $companyProfile->company_vission }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Web Address</label>
                                    <input type="text" name="web_address" class="form-control" value="{{ $companyProfile->web_address }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Trade License</label>
                                    <input type="text" name="trade_license" class="form-control" value="{{ $companyProfile->trade_license }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">ISP License</label>
                                    <input type="text" name="iSP_license" class="form-control" value="{{ $companyProfile->iSP_license }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Extra 1</label>
                                    <input type="text" name="extra1" class="form-control" value="{{ $companyProfile->extra1 }}">
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Extra 2</label>
                                    <input type="text" name="extra2" class="form-control" value="{{ $companyProfile->extra2 }}">
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Extra 3</label>
                                    <input type="text" name="extra3" class="form-control" value="{{ $companyProfile->extra3 }}">
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <textarea name="description" id="" class="form-control" rows="5">{{ $companyProfile->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Photo 1</label>
                                    <div class="col-md-6 pl-0">
                                        <input type="file" name="owner_photo1" onchange="mainThambUrl(this)"><br>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        @if($companyProfile->owner_photo1!='')
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/'.$companyProfile->owner_photo1)}}" class="img-thumbail"/>
                                        @else
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                                        @endif
                                    </div>
                                    <img src="" alt="" id="mainThmb">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Photo 2</label>
                                    <div class="col-md-6 pl-0">
                                        <input type="file" name="owner_photo2" onchange="mainThambUrl2(this)"><br>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        @if($companyProfile->owner_photo2!='')
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/'.$companyProfile->owner_photo2)}}" class="img-thumbail"/>
                                        @else
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                                        @endif
                                    </div>
                                    <img src="" alt="" id="mainThmb2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Logo</label>
                                    <div class="col-md-6 pl-0">
                                        <input type="file" name="logo" onchange="mainThambUrl3(this)"><br>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        @if($companyProfile->logo!='')
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/'.$companyProfile->logo)}}" class="img-thumbail"/>
                                        @else
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                                        @endif
                                    </div>
                                    <img src="" alt="" id="mainThmb3">
                                </div>
                            </div>
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