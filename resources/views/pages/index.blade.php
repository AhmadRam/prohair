@extends('layouts.master')

@section('page_title')
    {{ __('app.header.home') }}
@stop

@section('content')
    <!-- home page slider -->
    <div class="homepage-slider">
        @foreach ($sliders as $slider)
            {{-- {{ dd($slider->image) }} --}}
            <!-- single home slider -->
            <div class="single-homepage-slider" style="background-image: url('{{ Voyager::image($slider->image) }}');">
                <div class="container">
                    <div class="row">
                        <div class="{{ $slider->text_align }}">
                            <div class="hero-text">
                                <div class="hero-text-tablecell">
                                    <p class="subtitle">{{ $slider->title }}</p>
                                    <h1>{{ $slider->short_description }}</h1>
                                    <div class="hero-btns">
                                        {{-- <a href="shop.html" class="boxed-btn">Fruit Collection</a> --}}
                                        {{-- <a href="{{ route('shop.page', 'contact-us') }}" class="bordered-btn">Contact Us</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single home slider -->
        @endforeach

    </div>
    <!-- end home page slider -->


    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>{{ __('app.home.recently-products') }}</h3>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p> --}}
                    </div>
                </div>
            </div>

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
        </div>
    </div>
    <!-- end product section -->

    {{-- <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel --> --}}

    <!-- latest news -->
    <div class="logo-carousel-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>{{ __('app.home.recently-news') }}</h3>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p> --}}
                    </div>
                </div>
            </div>

            <div class="row" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
                @foreach ($news as $single_news)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news" style="text-align: {{ app()->getLocale() == 'ar' ? 'right' : '' }}">
                            <a href="{{ route('shop.single-news', $single_news->id) }}">
                                <div class="latest-news-bg news-bg-1"></div>
                            </a>
                            <div class="news-text-box">
                                <h3><a
                                        href="{{ route('shop.single-news', $single_news->id) }}">{{ $single_news->title }}</a>
                                </h3>
                                <p class="blog-meta">
                                    {{-- <span class="author"><i class="fas fa-user"></i> Admin</span> --}}
                                    <span class="date"><i class="fas fa-calendar"></i>
                                        {{ $single_news->created_at->format('d F, Y') }}</span>
                                </p>
                                <p class="excerpt">{{ $single_news->short_description }}</p>
                                <a href="{{ route('shop.single-news', $single_news->id) }}" class="read-more-btn">{{ __('app.read-more') }}
                                    <i class="fas fa-angle-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('shop.news') }}" class="boxed-btn">{{ __('app.home.more-news') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->


@endsection