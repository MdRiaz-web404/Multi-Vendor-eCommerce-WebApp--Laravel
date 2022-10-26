@extends('layouts.frontendmaster')
@section('content')
<!-- breadcrumb_section - start
    ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="index.html">Home</a></li>
                <li>{{$product_details->product_name}} - details</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
    ================================================== -->

    <!-- product_details - start
    ================================================== -->
    <section class="product_details section_space pb-0">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6">

                    <div class="product_details_image">
                        <div class="details_image_carousel">
                            <div class="slider_item">
                                <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->featured_photo}}" alt="image_not_found">
                            </div>
                            @if ($product_details->product_gallery1)
                                <div class="slider_item">
                                    <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->product_gallery1}}" alt="image_not_found">
                                </div>
                            @endif
                            @if ($product_details->product_gallery2)
                                <div class="slider_item">
                                    <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->product_gallery2}}" alt="image_not_found">
                                </div>
                            @endif
                            @if ($product_details->product_gallery3)
                                <div class="slider_item">
                                    <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->product_gallery3}}" alt="image_not_found">
                                </div>
                            @endif
                        </div>

                        <div class="details_image_carousel_nav">
                            <div class="slider_item">
                                <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->featured_photo}}" alt="image_not_found">
                            </div>
                            @if ($product_details->product_gallery1)
                                <div class="slider_item">
                                    <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->product_gallery1}}" alt="image_not_found">
                                </div>
                            @endif
                            @if ($product_details->product_gallery2)
                                <div class="slider_item">
                                    <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->product_gallery2}}" alt="image_not_found">
                                </div>
                            @endif
                            @if ($product_details->product_gallery3)
                                <div class="slider_item">
                                    <img src="{{asset('dashboard_assets/product_photos')}}/{{$product_details->product_gallery3}}" alt="image_not_found">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product_details_content">
                        <h2 class="item_title">{{$product_details->product_name}}</h2>
                        <p>{{$product_details->short_description}}</p>
                        <p class="">
                            Shop Name: <a href="{{route('vendor.all.products',$product_details->vendor_id)}}"> {{$product_details->relationwithuser->shop_name}}</a>
                        </p>
                        <div class="item_review">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <span class="review_value">3 Rating(s)</span>
                        </div>
                        @if ($product_details->discount)
                        <div class="item_price">
                            <span>${{ $product_details->regular_price-(($product_details->regular_price*$product_details->discount)/100)}}</span>
                            <del>${{$product_details->regular_price}}</del>
                        </div>
                        @else
                        <div class="item_price">
                            <span>${{ $product_details->regular_price}}</span>

                        </div>
                        @endif
                        <hr>
                        @livewire('product-details',['product_id'=> $product_details->id])
                    <form action="#">
                    </form>
                </div>
            </div>

            <div class="details_information_tab">
                <ul class="tabs_nav nav ul_li" role=tablist>
                    <li>
                        <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab" aria-controls="description_tab" aria-selected="true">
                        Description
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab" aria-controls="additional_information_tab" aria-selected="false">
                        Additional information
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab" aria-controls="reviews_tab" aria-selected="false">
                        Reviews(2)
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                        <p>{{$product_details->short_description}}</p>
                        <p class="mb-0">
                            {{$product_details->description}}
                        </p>
                    </div>

                    <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                        <p>
                        Return into stiff sections the bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked what's happened to me he thought It wasn't a dream. His room, a proper human room although a little too small
                        </p>

                        <div class="additional_info_list">
                            <h4 class="info_title">Additional Info</h4>
                            <ul class="ul_li_block">
                                <li>No Side Effects</li>
                                <li>Made in USA</li>
                            </ul>
                        </div>

                        <div class="additional_info_list">
                            <h4 class="info_title">Product Features Info</h4>
                            <ul class="ul_li_block">
                                <li>Compatible for indoor and outdoor use</li>
                                <li>Wide polypropylene shell seat for unrivalled comfort</li>
                                <li>Rust-resistant frame</li>
                                <li>Durable UV and weather-resistant construction</li>
                                <li>Shell seat features water draining recess</li>
                                <li>Shell and base are stackable for transport</li>
                                <li>Choice of monochrome finishes and colourways</li>
                                <li>Designed by Nagi</li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                        <div class="average_area">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-last">
                                    <div class="average_rating_text">
                                        <ul class="rating_star ul_li_center">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <p class="mb-0">
                                        Average Star Rating: <span>4 out of 5</span> (2 vote)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="customer_reviews">
                            <h4 class="reviews_tab_title">2 reviews for this product</h4>
                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="{{asset('frontend_assets')}}/images/team/team_1.jpg" alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Aonathor troet</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                </div>
                            </div>

                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="{{asset('frontend_assets')}}/images/team/team_2.jpg" alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Danial obrain</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">
                                    Great product quality, Great Design and Great Service.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="customer_review_form">
                            <h4 class="reviews_tab_title">Add a review</h4>
                            <form action="#">
                                <div class="form_item">
                                    <input type="text" name="name" placeholder="Your name*">
                                </div>
                                <div class="form_item">
                                    <input type="email" name="email" placeholder="Your Email*">
                                </div>
                                <div class="your_ratings">
                                    <h5>Your Ratings:</h5>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                </div>
                                <div class="form_item">
                                    <textarea name="comment" placeholder="Your Review*"></textarea>
                                </div>
                                <button type="submit" class="btn btn_primary">Submit Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_details - end
    ================================================== -->

    <!-- related_products_section - start
    ================================================== -->
    <section class="related_products_section section_space">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="best-selling-products related-product-area">
                        <div class="sec-title-link">
                            <h3>Related products</h3>
                            <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                        </div>
                        <div class="product-area clearfix">
                            @forelse ($related_products as $product)
                                @include('frontend.components.productgrid')
                            @empty
                            <div class="alert alert-danger">
                                <p class="text-center">No Related Products</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related_products_section - end
    ================================================== -->
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#not_logged_in').click(function(){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You have to need Login first!',
                footer: '<a href="{{route('account')}}">Click here to login</a>'
                });
            });
        });
    </script>
@endsection
@section('footer_scripts')
    @if (session('message'))
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
    title: "{{session('message')}}"
    })
    @endif
@endsection
