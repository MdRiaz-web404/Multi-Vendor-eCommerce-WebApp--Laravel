@extends('layouts.frontendmaster')
@section('content')
    <!-- main body - start
        ================================================== -->
        <main>





            <!-- slider_section - start
            ================================================== -->
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="main_slider" data-slick='{"arrows": false}'>
                                <div class="slider_item set-bg-image" data-background="{{ asset('frontend_assets') }}/images/slider/slide-2.jpg">
                                    <div class="slider_content">
                                        <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                                        <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                                        <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                                        <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                            <del>$430.00</del>
                                            <span class="sale_price">$350.00</span>
                                        </div>
                                        <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                                    </div>
                                </div>
                                <div class="slider_item set-bg-image" data-background="{{ asset('frontend_assets') }}/images/slider/slide-3.jpg">
                                    <div class="slider_content">
                                        <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                                        <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                                        <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                                        <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                            <del>$430.00</del>
                                            <span class="sale_price">$350.00</span>
                                        </div>
                                        <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                                    </div>
                                </div>
                                <div class="slider_item set-bg-image" data-background="{{ asset('frontend_assets') }}/images/slider/slide-1.jpg">
                                    <div class="slider_content">
                                        <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                                        <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                                        <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                                        <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                            <del>$430.00</del>
                                            <span class="sale_price">$350.00</span>
                                        </div>
                                        <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider_section - end
            ================================================== -->

            <!-- policy_section - start
            ================================================== -->
            <section class="policy_section">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="policy-wrap">
                                @foreach ($services as $service)
                                    <div class="policy_item">
                                        <div class="item_icon">
                                            <img src="{{ asset('dashboard_assets/service_photos') }}/{{$service->service_photo}}" alt="" class="img-fluid" width="60">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">{{$service->service_name}}</h3>
                                            <p>
                                                {{$service->service_description}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- policy_section - end
            ================================================== -->


            <!-- products-with-sidebar-section - start
            ================================================== -->
            <section class="products-with-sidebar-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-3">
                            <div class="best-selling-products">
                                <div class="sec-title-link">
                                    <h3>Best selling</h3>
                                    <div class="view-all"><a href="{{route('shop')}}">View all<i class="fal fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area clearfix">
                                    @foreach ($products as $product)
                                        @include('frontend.components.productgrid')
                                    @endforeach
                                </div>
                            </div>

                            <div class="top_category_wrap">
                                <div class="sec-title-link">
                                    <h3>Top categories</h3>
                                </div>
                                <div class="top_category_carousel2" data-slick='{"dots": false}'>
                                    @foreach ($categories as $category)
                                        <div class="slider_item">
                                            <div class="category_boxed">
                                                <a href="{{route('category.all.products',$category->id)}}">
                                                      <span class="item_image">
                                                          <img src="{{ asset('dashboard_assets/category_photos') }}/{{$category->category_photo}}" alt="image_not_found">
                                                      </span>
                                                    <span class="item_title">{{ Str::title($category->category_name)}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="carousel_nav carousel-nav-top-right">
                                    <button type="button" class="tc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                                    <button type="button" class="tc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 order-lg-9">
                            <div class="product-sidebar">
                                <div class="widget latest_product_carousel">
                                    <div class="title_wrap">
                                        <h3 class="area_title">Latest Products</h3>
                                        <div class="carousel_nav">
                                            <button type="button" class="vs4i_left_arrow"><i class="fal fa-angle-left"></i></button>
                                            <button type="button" class="vs4i_right_arrow"><i class="fal fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                    <div class="vertical_slider_4item" data-slick='{"dots": false}'>
                                        @foreach ($latestproducts as $latestproduct)
                                            <div class="slider_item">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="{{route('product.details',$latestproduct->id)}}">
                                                        <img src="{{ asset('dashboard_assets/product_photos') }}/{{$latestproduct->featured_photo}}" alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="{{route('product.details',$latestproduct->id)}}">{{Str::title($latestproduct->product_name)}}</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>

                                                        @if ($latestproduct->discount)
                                                            <div class="item_price">
                                                                <span>${{ $latestproduct->regular_price-(($latestproduct->regular_price*$latestproduct->discount)/100)}}</span>
                                                                <del>${{$latestproduct->regular_price}}</del>
                                                            </div>
                                                        @else
                                                            <div class="item_price">
                                                                <span>${{ $latestproduct->regular_price}}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="widget product-add">
                                    <div class="product-img">
                                        <img src="{{ asset('frontend_assets') }}/images/shop/product_img_10.png" alt>
                                    </div>
                                    <div class="details">
                                        <h4>iPad pro</h4>
                                        <p>iPad pro with M1 chipe</p>
                                        <a class="btn btn_primary" href="#" >Start Buying</a>
                                    </div>
                                </div>
                                <div class="widget audio-widget">
                                    <h5>Categories <span>{{$categories->count()}}</span></h5>
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><a href="{{route('category.all.products',$category->id)}}">{{ Str::title($category->category_name)}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container  -->
            </section>
            <!-- products-with-sidebar-section - end
            ================================================== -->


            <!-- promotion_section - start
            ================================================== -->
            <section class="promotion_section">
                <div class="container">
                    <div class="row promotion_banner_wrap">
                        <div class="col col-lg-6">
                            <div class="promotion_banner">
                                <div class="item_image">
                                    <img src="{{ asset('frontend_assets') }}/images/promotion/banner_img_1.png" alt>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">Protective sleeves <span>combo.</span></h3>
                                    <p>It is a long established fact that a reader will be distracted</p>
                                    <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="promotion_banner">
                                <div class="item_image">
                                    <img src="{{ asset('frontend_assets') }}/images/promotion/banner_img_2.png" alt>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">Nutrillet blender <span>combo.</span></h3>
                                    <p>
                                        It is a long established fact that a reader will be distracted
                                    </p>
                                    <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- promotion_section - end
            ================================================== -->

            <!-- new_arrivals_section - start
            ================================================== -->
            <section class="new_arrivals_section section_space">
                <div class="container">
                    <div class="sec-title-link">
                        <h3>New Arrivals</h3>
                    </div>

                    <div class="row newarrivals_products">
                        <div class="col col-lg-5" style="background: url('')">
                            <div class="deals_product_layout1">
                                <div class="bg_area">
                                    <h3 class="item_title">Best <span>Product</span> Deals</h3>
                                    <p>
                                        Get a 20% Cashback when buying TWS Product From SoundPro Audio Technology.
                                    </p>
                                    <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col col-lg-7">
                            <div class="new-arrivals-grids clearfix">
                                <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_assets') }}/images/shop/product-img-28.png" alt>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">iPhone 13 pro</a></h4>
                                        <p><a href="#">A dramatically more powerful camera system a display</a></p>
                                        <span class="price">
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                    </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_assets') }}/images/shop/product-img-26.png" alt>
                                        <span class="theme-badge-2">20% off</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Apple</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch bar ID </a></p>
                                        <span class="price">
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                    </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                                    </bdi>
                                                </span>
                                            </del>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_assets') }}/images/shop/product-img-27.png" alt>
                                        <span class="theme-badge-2">15% off</span>

                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Mac Mini</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                                        <span class="price">
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                    </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                                    </bdi>
                                                </span>
                                            </del>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_assets') }}/images/shop/product_img_12.png" alt>
                                        <span class="theme-badge">Sale</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Apple</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                                        <span class="price">
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                    </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                                    </bdi>
                                                </span>
                                            </del>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- new_arrivals_section - end
            ================================================== -->

            <!-- brand_section - start
            ================================================== -->
            <div class="brand_section pb-0">
                <div class="container">
                    <div class="brand_carousel">
                        @foreach ($sponsors as $sponsor)
                            <div class="slider_item">
                                <a class="product_brand_logo" href="#!">
                                    <img src="{{ asset('dashboard_assets/company_photos') }}/{{$sponsor->company_photo}}" alt="image_not_found">
                                    <img src="{{ asset('dashboard_assets/company_photos') }}/{{$sponsor->company_photo}}" alt="image_not_found">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- brand_section - end
            ================================================== -->

            <!-- viewed_products_section - start
            ================================================== -->
            <section class="viewed_products_section section_space">
                <div class="container">

                    <div class="sec-title-link mb-0">
                        <h3>Recently Viewed Products</h3>
                    </div>

                    <div class="viewed_products_wrap arrows_topright">
                        <div class="viewed_products_carousel row" data-slick='{"dots": false}'>
                            <div class="slider_item col">
                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_1.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Electronics</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_2.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">PC & Laptop</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item col">
                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_3.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Tables & Mobiles</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_4.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Accessories</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item col">
                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_5.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">TV & Audio</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_6.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Games & Consoles</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item col">
                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_1.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Electronics</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_2.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">PC & Laptop</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item col">
                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_3.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Tables & Mobiles</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_4.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Accessories</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item col">
                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_5.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">TV & Audio</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="viewed_product_item">
                                    <div class="item_image">
                                        <img src="{{ asset('frontend_assets') }}/images/viewed_products/viewed_product_img_6.png" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Games & Consoles</h3>
                                        <ul class="ul_li_block">
                                            <li><a href="#!">Computers</a></li>
                                            <li><a href="#!">Laptop</a></li>
                                            <li><a href="#!">Macbook</a></li>
                                            <li><a href="#!">Accessories</a></li>
                                            <li><a href="#!">More...</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel_nav">
                            <button type="button" class="vpc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                            <button type="button" class="vpc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- viewed_products_section - end
            ================================================== -->

@endsection
