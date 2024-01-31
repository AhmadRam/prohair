@extends('layouts.master')

@section('page_title')
    {{ __('app.header.home') }}
@stop

@section('content')
    <!-- home page slider -->
    @if ($sliders->count() == 1)
        <div class="hero-area hero-bg" style="background-image: url('{{ Voyager::image($sliders->first()->image) }}');">
            <div class="container">
                <div class="row">
                    <div class="{{ $sliders->first()->text_align }}">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">{{ $sliders->first()->title }}</p>
                                <h1>{{ $sliders->first()->short_description }}</h1>
                                <div class="hero-btns">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
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
    @endif
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
        </div>
    </div>
    <!-- end product section -->


    <div class="product-section mt-150 mb-150">
        <div style="margin: 50px">
            <div class="row">
                <div class="col-lg-4 col-md-10 text-center">
                    <video width="100%" height="height: 100%" controls autoplay muted>
                        <source src="{{ asset('assets/img/video1.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-lg-4 col-md-10 text-center">
                    <video width="100%" height="height: 100%" controls autoplay muted>
                        <source src="{{ asset('assets/img/video2.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-lg-4 col-md-10 text-center">
                    <video width="100%" height="height: 100%" controls autoplay muted>
                        <source src="{{ asset('assets/img/video3.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

            </div>
        </div>
    </div>

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
    @if ($blogs->count())
        <!-- latest news -->
        <div class="logo-carousel-section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3>{{ __('app.home.recently-blogs') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="row" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-latest-news"
                                style="text-align: {{ app()->getLocale() == 'ar' ? 'right' : '' }}">
                                <a href="{{ route('shop.blog', $blog->id) }}">
                                    <div class="latest-news-bg"
                                        style="background-image: url('{{ Voyager::image($blog->image) }}');"></div>
                                </a>
                                <div class="news-text-box">
                                    <h3><a href="{{ route('shop.blog', $blog->id) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p class="blog-meta">
                                        <span class="date"><i class="fas fa-calendar"></i>
                                            {{ $blog->created_at->format('d F, Y') }}</span>
                                    </p>
                                    <p class="excerpt">{{ $blog->short_description }}</p>
                                    <a href="{{ route('shop.blog', $blog->id) }}"
                                        class="read-more-btn">{{ __('app.read-more') }}
                                        <i
                                            class="fas fa-angle-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="{{ route('shop.blogs') }}" class="boxed-btn">{{ __('app.home.more-blogs') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end latest news -->
    @endif

    <div class="product-section mt-150 mb-150">
        <div style="margin: 50px">
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <img src="{{ asset('assets/img/banner1.jpg') }}" alt="">
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <img src="{{ asset('assets/img/banner2.jpg') }}" alt="">
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <img src="{{ asset('assets/img/banner3.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection
