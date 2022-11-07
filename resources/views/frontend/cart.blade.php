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
            @livewire('cart.cart-show')
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

