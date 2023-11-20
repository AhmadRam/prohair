@extends('layouts.master')

@section('page_title')
    {{ __('app.header.category') }}
@stop

@section('content')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        {{-- <p>Organic Information</p> --}}
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- latest news -->
    <div class="latest-news mt-150 mb-150" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item" style="min-height: 810px; display: flex; flex-direction: column;">
                            <div class="product-image">
                                <a href="{{ route('shop.product', $product->url_path) }}">
                                    <img src="{{ Voyager::image(json_decode($product->images)[0] ?? null) }}"
                                        alt="{{ $product->name }}">
                                </a>
                            </div>
                            <div style="padding:20px">
                                <h5>{{ $product->name }}</h5>
                                <p class="product-price">
                                    <span style="font-size: 12px;">{{ $product->short_description }}</span>
                                </p>
                            </div>
                            <div style="margin-top: auto;">
                                <a href="{{ route('shop.product', $product->url_path) }}"
                                    class="cart-btn">{{ __('app.more-details') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('pages.paginate', ['paginate' => $products])

        </div>
    </div>
    <!-- end latest news -->
@stop
