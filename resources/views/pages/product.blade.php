@extends('layouts.master')

@section('page_title')
    {{ $product->name }}
@stop

@section('seo')
    <meta name="description" content="{{ \Illuminate\Support\Str::limit($product->short_description, 120, '') }}" />
    <meta name="keywords" content="{{ $product->name }}" />
    <meta name="robots" content="index, follow">
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
                        <div id="imageSlider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach (json_decode($product->images) as $key => $image)
                                    <li data-target="#imageSlider" data-slide-to="{{ $key }}"
                                        class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach (json_decode($product->images) as $key => $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ Voyager::image($image) }}" class="d-block w-100"
                                            alt="Slide {{ $key }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                        {{-- <img src="{{ Voyager::image(json_decode($product->images)[0] ?? null) }}" alt=""> --}}
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
                            <p><strong>{{ __('app.product.active-ingredients') }}:
                                </strong>{{ $product->active_ingredients }}</p>
                            <p><strong>{{ __('app.product.how-to-use') }}: </strong>{{ $product->how_to_use }}</p>
                        </div>
                        <h4>{{ __('app.product.share') }}:</h4>
                        <ul class="product-share">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url={{ request()->url() }}"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a href="https://wa.me/?text=check out this product on ProHair! {{ request()->url() }}"><i
                                        class="fab fa-whatsapp"></i></a></li>
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
                            <a href="{{ route('shop.product', $related_product->url_path) }}"
                                class="cart-btn">{{ __('app.more-details') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end more products -->
@stop
