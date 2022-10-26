@extends('layouts.dashboardmaster')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3>Add Inventory - {{$product->product_name}}</h3>
                        <hr>
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    @foreach ($errors->all() as $error )
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <form action="{{route('product.inventory.post',$product)}}" method="POST">
                            @csrf
                            <div class="row mb-6">
                                <span class="text-muted text-center">Fill size and color, If your product has variation.</span>
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">Size </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <select name="size" id="Size" class="select_search form-control form-control-lg form-control-solid">
                                        <option value="">-Select One-</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{$size->id}}">{{$size->size_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-5">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">Color </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <select name="color" id="Color" class="select_search form-control form-control-lg form-control-solid">
                                        <option value="">-Select One-</option>
                                        @foreach ($colors as $color)
                                            <option value="{{$color->id}}">{{$color->color}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Quantity </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="quantity" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" min="1">
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Add Inventory</button>
                            </div>
                        </form>
                        <hr>
                    </div>

                </div>
            </div>
            <div class="col-md-7">

                <div class="card">
                    <div class="card-body">
                        <h3>List Inventory - {{$product->product_name}}</h3>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Action </th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_unit_price=0;
                                @endphp
                                <hr>
                              @forelse ($inventories as $inventory)
                                <tr>
                                  <td scope="row">@if ($inventory->color_id)
                                    {{$inventory->relationwithcolor->color}}
                                  @else
                                  <span class="text-muted">No Color</span>
                                  @endif</td>
                                  <td>@if ($inventory->size_id)
                                    {{$inventory->relationwithsize->size_name}}
                                  @else
                                    <span class="text-muted">No Size</span>
                                  @endif</td>
                                  <td>{{$inventory->quantity}}</td>
                                  <td>
                                        @if ($inventory->relationwithproduct->discount)
                                        {{$inventory->quantity*($inventory->relationwithproduct->regular_price-($inventory->relationwithproduct->regular_price*$inventory->relationwithproduct->discount)/100)}}
                                        @else
                                        {{$inventory->quantity*$inventory->relationwithproduct->regular_price}}
                                        @endif
                                   </td>
                                  @php
                                       if ($inventory->relationwithproduct->discount){
                                        $total_unit_price +=($inventory->quantity*($inventory->relationwithproduct->regular_price-($inventory->relationwithproduct->regular_price*$inventory->relationwithproduct->discount)/100));
                                       }else{
                                         $total_unit_price +=($inventory->quantity*$inventory->relationwithproduct->regular_price);
                                       }
                                  @endphp
                                  <td>
                                    <form action="{{route('inventory.delete',$inventory->id)}}" method="POST">
                                        @csrf
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
                                  </td>
                                </tr>
                              @empty

                              @endforelse

                            </tbody>
                            <tfoot class="table-primary">
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td colspan="2">{{$total_unit_price}}</td>
                                </tr>
                            </tfoot>
                          </table>
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
        })
    @endif

@endsection


