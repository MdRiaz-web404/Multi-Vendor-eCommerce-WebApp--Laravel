<div class="grid clearfix">
    <div class="product-pic">
        <img src="{{ asset('dashboard_assets/product_photos') }}/{{$product->featured_photo}}" alt />
    </div>
    <div class="details">
        <h4><a <a href="{{route('product.details',$product->id)}}">{{$product->product_name}}</a></h4>
        <p><a href="{{route('product.details',$product->id)}}">{{Str::limit($product->short_description, 30)}}</a></p>
        <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        @if ($product->discount)
            <span class="price">
                <ins>
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            <span class="woocommerce-Price-currencySymbol">$</span>{{ $product->regular_price-(($product->regular_price*$product->discount)/100)}}
                        </bdi>
                    </span>
                </ins>
                <del aria-hidden="true">
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            <span class="woocommerce-Price-currencySymbol">$</span>{{$product->regular_price}}
                        </bdi>
                    </span>
                </del>
            </span>
        @else
        <span class="price">
            <ins>
                <span class="woocommerce-Price-amount amount">
                    <bdi>
                        <span class="woocommerce-Price-currencySymbol">$</span>{{ $product->regular_price}}
                    </bdi>
                </span>
            </ins>
        </span>
        @endif
        <div class="add-cart-area">
            <a href="{{route('product.details',$product->id)}}" class="btn btn-danger add-to-cart">Add to cart</a>
        </div>
    </div>
</div>
