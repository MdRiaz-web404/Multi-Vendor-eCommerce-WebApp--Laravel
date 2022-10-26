@extends('layouts.dashboardmaster')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Edit Service</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <div class="card-body border-top p-9">
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            @foreach ($errors->all() as $error )
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    <!--begin::Input group-->
                    <form action="{{route('sponsor.update',$sponsor->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Company Name </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="text" name="company_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$sponsor->company_name}}">
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label  fw-bold fs-6">Company Photo</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('dashboard_assets/company_photos') }}/{{$sponsor->company_photo}}"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="company_photo">
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                </div> <br>
                                <span class="text-danger">Only PNG/png fromate is available</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label  fw-bold fs-6">Status</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                {{-- <input type="select" name="status" class="form-control form-control-lg form-control-solid"value="{{$category->status}}"> --}}
                                <select name="status" id="status" class="form-control form-control-lg form-control-solid">
                                    <option @if( $sponsor->status == 'active') {{ 'selected' }}  @endif  value="active">Active</option>
                                    <option @if( $sponsor->status == 'deactive') {{ 'selected' }}  @endif value="deactive">Deactive</option>
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--begin::Input group-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Update</button>
                        </div>

                    </form>
                </div>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
    </div>
    <!--end::Container-->
</div>
@endsection
