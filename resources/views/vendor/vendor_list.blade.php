@extends('layouts.dashboardmaster')
@section('content')
<div class="card mb-5 col-md-8 mx-auto">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">List of Vendors</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            @if (session('success_service'))
                <div class="alert alert-success text-center">
                    {{session('success_service')}}
                </div>
            @endif
            <!--begin::Table-->
            <table id="vendor_table" class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 max-w-20px rounded-start">SL No</th>
                        <th class="ps-4 min-w-125px rounded-start">Owner Name</th>
                        <th class="ps-4 min-w-200px rounded-start">Details</th>
                        <th class="max-w-40px">Status</th>
                        <th class="miax-w-30px text-end rounded-end">Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @forelse ($users->where('role','vendor') as $user)
                        <tr>
                            <td> {{$loop->index+1}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
                                        <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$user->name}}</a>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        {{-- <a href="{{route('service.edit',$user->id)}}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$user->email}}</a> --}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="d-flex justify-content-start flex-column">
                                        {{-- {{route('service.edit',$service->id)}} --}}
                                        <a href=""class="text-dark fw-bolder text-hover-primary fs-6">Shop Name: {{$user->shop_name}}</a> <br>
                                        <a href="" class="text-dark fw-bolder text-hover-primary fs-6">Email: {{$user->email}}</a>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <span class=" @if($user->status=='active'){{'badge badge-light-primary'}} @else {{'badge badge-light-danger'}} @endif fs-7 fw-bold">{{$user->status}}</span>
                            </td>
                            <td class="text-end">
                                <div class="my-3">
                                    <form action="{{route('vendor.status',$user->id)}}" method="POST">
                                        <div class="form-check form-switch">
                                            <input onChange="this.form.submit()" {{($user->status=='active') ?'checked':''}} class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                                        </div>
                                       @csrf
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="50" class="text-danger text-center">No Data to Show</td>
                        </tr>
                    @endforelse
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
@endsection
@section('dataTableScript')
$(document).ready(function () {
    $('#vendor_table').DataTable();
});
@endsection
