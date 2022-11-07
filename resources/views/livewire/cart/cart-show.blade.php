<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <section class="cart_section section_space">
        <div class="container">

            <div class="cart_table">
                <table class="table">
                    @if (session()->has('success'))
                        <div class="alert alert-success ">
                            <p class="text-center m-0 p-0">{{session('success')}}</p>
                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sub_total=0;
                            $error= false;
                        @endphp
                        <style>
                            .light_red{
                                background: rgba(255, 6, 6, 0.505);
                            }
                        </style>
                        @foreach ($carts as $cart)
                            @php
                                if($cart->relationwithinventory->quantity<$cart->quantity){
                                    $error= true;
                                }

                            @endphp
                            <tr class="@if($cart->relationwithinventory->quantity<$cart->quantity)
                                {{'light_red'}}
                                @endif">
                                <td>
                                    <div class="cart_product">
                                        <img src="{{asset('dashboard_assets/product_photos')}}/{{$cart->relationwithproduct->featured_photo }}" alt="image_not_found">
                                    <h6>
                                        <a href="{{route('product.details',$cart->relationwithproduct->id)}}">{{$cart->relationwithproduct->product_name}}</a>
                                        <br>
                                        Shop:<a href="{{route('vendor.all.products',$cart->venor_id)}}" class="badge bg-success"> {{$cart->relationwithuser->shop_name}}</a>
                                        <br>
                                        @if($cart->relationwithinventory->quantity<$cart->quantity)
                                            <a href="#" class="badge bg-warning">Available Stock: {{$cart->relationwithinventory->quantity}}</a>
                                            <br>
                                        @endif

                                        @if ($cart->color_id)
                                            <span class="text-muted">Color: {{$cart->relationwithcolor->color}}</span> | <span class="text-muted">Size: {{$cart->relationwithsize->size_name}}</span>
                                        @endif
                                    </h6>

                                    </div>
                                </td>
                                <td class="text-center">
                                    @if ($cart->relationwithproduct->discount)
                                    <span class="price_text">
                                        <span>${{ $cart->relationwithproduct->regular_price-(($cart->relationwithproduct->regular_price*$cart->relationwithproduct->discount)/100)}}</span>
                                        <del class="text-muted">${{$cart->relationwithproduct->regular_price}}</del>
                                    </span>
                                    @else
                                    <span class="price_text">
                                        <span>${{ $cart->relationwithproduct->regular_price}}</span>

                                    </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="#">
                                        <div class="quantity_input">
                                            <button type="button" wire:click='decrement({{ $cart->id }})' class="input_number_decrement">
                                                <i class="fal fa-minus"></i>
                                            </button>
                                            <input class="" readonly wire:keyup="inputQuantuity({{ $cart->id }},$event.target.value)" type="text" value="{{ $cart->quantity }}" />
                                            <button type="button" wire:click='increment({{ $cart->id }})' class="input_number_increment">
                                                <i class="fal fa-plus"></i>
                                            </button>
                                            {{-- <span class=" mx-2 border"><button class=""><i class="fal fa-minus"></i></button></span>
                                            <input readonly class="p-2 text-center" style="width:15%" type="text" value="{{ $cart->quantity }}">
                                            <span class=" mx-2 border "><button class=""><i class="fal fa-plus"></i></button></span> --}}
                                        </div>
                                    </form>
                                </td>
                                <td class="text-center"><span class="price_text">{{unit_price($cart->product_id, $cart->quantity)}}</span></td>
                                <td class="text-center"><button type="button" wire:click='delete_item({{ $cart->id }})' class="remove_btn"><i class="fal fa-trash-alt"></i></button></td>
                            </tr>
                            @php
                                $sub_total += unit_price($cart->product_id, $cart->quantity);
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart_btns_wrap">
                <div class="row">
                    <div class="col col-lg-6">
                        <form action="#">
                            <div class="coupon_form form_item mb-0">
                                <input type="text" name="coupon" placeholder="Coupon Code...">
                                <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                <div class="info_icon">
                                    <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col col-lg-6">
                        <ul class="btns_group ul_li_right">
                            @if ($error)
                                <span><a class="btn btn-warning" href="#!">Please! solve the error</a></span>
                            @else
                                <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6">
                    <div class="calculate_shipping">
                        <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span></h3>
                        <form action="#">
                            <div class="select_option clearfix">
                                <select>
                                    <option value="">Select Your Option</option>
                                    <option value="1">Inside City</option>
                                    <option value="2">Outside City</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                        </form>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="cart_total_table">
                        <h3 class="wrap_title">Cart Totals</h3>
                        <ul class="ul_li_block">
                            <li>
                                <span>Cart Subtotal</span>
                                <span>{{$sub_total}}</span>
                            </li>
                            <li>
                                <span>Discount (-)</span>
                                <span class="text-danger">--</span>
                            </li>
                            <li>
                                <span>Delivery Charge (+)</span>
                                <span>--</span>
                            </li>
                            <li>
                                <span>Order Total</span>
                                <span class="total_price">--</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
{{-- @section('footer_scripts')
    <script>
        @if (session()->has('success'))
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
    </script>
@endsection --}}

