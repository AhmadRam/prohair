@extends('layouts.master')

@section('page_title')
    {{ __('app.header.search') }}
@stop

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section" style="padding: 50px">
    </div>
    <!-- end breadcrumb section -->

    <!-- latest news -->
    <div class="latest-news mt-150 mb-150">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('shop.product', $product->url_path) }}"><img
                                        src="{{ Voyager::image(json_decode($product->images)[0] ?? null) }}"
                                        alt="{{ $product->name }}"></a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>{{ $product->short_description }}</span></p>
                            <a href="{{ route('shop.product', $product->url_path) }}" class="cart-btn">{{ __('app.more-details') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        
            @include('pages.paginate', ['paginate' => $products])

        </div>
    </div>
    <!-- end latest news -->
@stop

