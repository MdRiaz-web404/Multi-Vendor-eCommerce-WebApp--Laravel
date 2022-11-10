@extends('layouts.dashboardmaster')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Add Product Coupon</h3>
                        <hr>
                        <form action="{{route('coupon.store')}}" method="POST">
                            @csrf
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-form-label required fw-bold fs-6">Coupon Name </label>
                                <span class="text-muted" >Make sure Coupon name will be Uppercase</span>
                                <!--end::Label-->
                                <!--begin::Col-->
                                    <input type="text" name="coupon_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-form-label  fw-bold fs-6">Coupon Minimum Value</label>
                                <!--end::Label-->
                                <!--begin::Col-->

                                    <input type="number" name="coupon_minimum_value" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">

                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class=" col-form-label  fw-bold fs-6">Coupon Maximum Discount </label>
                                <!--end::Label-->
                                <!--begin::Col-->

                                    <input type="number" name="coupon_maximum_discount" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">

                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-form-label required fw-bold fs-6">Discount Type</label>
                                <!--end::Label-->
                                <!--begin::Col-->

                                    <select name="coupontype" id="" class="form-select">
                                        <option value="Percentage">Percentage ( % )</option>
                                        <option value="Flat">Flat</option>
                                    </select>

                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-form-label required fw-bold fs-6">Coupon Discount Amount</label>
                                <!--end::Label-->
                                <!--begin::Col-->

                                    <input type="number" name="discount_amount" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">

                                <!--end::Col-->
                            </div>
                            <div class="d-flex justify-content-center py-6 px-9">
                                <button type="submit" class="btn btn-primary" >Add Coupon</button>
                            </div>
                        </form>
                        <hr>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="category_table" class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bolder text-muted bg-light">
                                        <th class="ps-4 max-w-150 rounded-start">Name</th>
                                        <th class="ps-4 max-w-325px rounded-start">Minimum Value</th>
                                        <th class="max-w-150px">Maximum Discount</th>
                                        <th class="max-w-150px">Type</th>
                                        <th class="max-w-150px">Discount Amount</th>
                                        <th class="max-w-200px text-center rounded-center">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @forelse ( $coupons as $coupon )
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        {{$coupon->coupon_name}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-center flex-column">
                                                        {{$coupon->coupon_minimum_value}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-block justify-content-center flex-column">
                                                        {{$coupon->coupon_maximum_discount}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-center flex-column">
                                                        {{$coupon->coupontype}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-center flex-column">
                                                        {{$coupon->discount}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div>
                                                    <div class="my-3">
                                                        <form action="{{route('coupon.destroy',$coupon->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                                                </svg>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customScript')
    @if (session('success'))
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: "{{session('success')}}"
        });
    @endif
@endsection
