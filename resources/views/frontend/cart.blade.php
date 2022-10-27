@extends('layouts.frontendmaster')
@section('content')
    <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->
            @if (cart_count()!=0)
            <!-- cart_section - start
            ================================================== -->
            <section class="cart_section section_space">
                <div class="container">

                    <div class="cart_table">
                        <table class="table">
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
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <div class="cart_product">
                                                <img src="{{asset('dashboard_assets/product_photos')}}/{{$cart->relationwithproduct->featured_photo }}" alt="image_not_found">
                                                <h6><a href="{{route('product.details',$cart->relationwithproduct->id)}}">{{$cart->relationwithproduct->product_name}}</a></h6>

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
                                                    {{-- <button type="button" class="input_number_decrement">
                                                        <i class="fal fa-minus"></i>
                                                    </button>
                                                    <input class="input_number" type="text" value="1" />
                                                    <button type="button" class="input_number_increment">
                                                        <i class="fal fa-plus"></i>
                                                    </button> --}}
                                                    <span class=" mx-2 border"><button class=""><i class="fal fa-minus"></i></button></span>
                                                    <input readonly class="p-2 text-center" style="width:15%" type="text" value="{{ $cart->quantity }}">
                                                    <span class=" mx-2 border "><button class=""><i class="fal fa-plus"></i></button></span>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center"><span class="price_text">$10.50</span></td>
                                        <td class="text-center"><button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button></td>
                                    </tr>
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
                                    <li><a class="btn border_black" href="#!">Update Cart</a></li>
                                    <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
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
                                        <span>$52.50</span>
                                    </li>
                                    <li>
                                        <span>Delivery Charge</span>
                                        <span>$5</span>
                                    </li>
                                    <li>
                                        <span>Order Total</span>
                                        <span class="total_price">$57.50</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cart_section - end
            ================================================== -->
            @else
            <!-- empty_cart_section - start
            ================================================== -->
            <section class="empty_cart_section section_space">
                <div class="container">
                    <div class="empty_cart_content text-center">
                        <span class="cart_icon">
                            <i class="icon icon-ShoppingCart"></i>
                        </span>
                        <h3>There are no more items in your cart</h3>
                        <a class="btn btn_secondary" href="{{route('shop')}}"><i class="far fa-chevron-left"></i> Continue shopping </a>
                    </div>
                </div>
            </section>
            <!-- empty_cart_section - end
            ================================================== -->
            @endif

@endsection
