@extends('layouts.master')

@section('page_title')
    {{ $product->name }}
@stop

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section" style="padding: 50px">
    </div>
    <!-- end breadcrumb section -->

    <!-- single product -->
    <div class="single-product mt-150 mb-150" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ Voyager::image(json_decode($product->images)[0] ?? null) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content" style="text-align: {{ app()->getLocale() == 'ar' ? 'right' : '' }}">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>{{ $product->short_description }}</span></p>
                        <p>{!! $product->description !!}</p>
                        <hr>

                        <div class="single-product-form">
                            {{-- <form action="index.html">
                                <input type="number" placeholder="0">
                            </form>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> --}}
                            <p><strong>{{ __('app.product.how-to-use') }}: </strong>{{ $product->how_to_use }}</p>
                        </div>
                        <h4>{{ __('app.product.share') }}:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        {{-- <h3><span class="orange-text">Related</span> Products</h3> --}}
                        <h3>{{ __('app.product.related-products') }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($product->related_products()->take(6)->get() as $related_product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('shop.product', $related_product->url_path) }}"><img
                                        src="{{ Voyager::image(json_decode($related_product->images)[0] ?? null) }}"
                                        alt="{{ $related_product->name }}"></a>
                            </div>
                            <h3>{{ $related_product->name }}</h3>
                            <p class="product-price"><span>{{ $related_product->short_description }}</span></p>
                            <a href="{{ route('shop.product', $related_product->url_path) }}" class="cart-btn">{{__('app.more-details')}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end more products -->
@stop