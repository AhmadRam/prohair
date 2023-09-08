@extends('layouts.master')

@section('page_title')
    {{ __('app.blogs') }}
@stop

@section('content')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        {{-- <p>Organic Information</p> --}}
                        <h1>{{ __('app.blogs') }}</h1>
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
                                    {{-- <span class="author"><i class="fas fa-user"></i> Admin</span> --}}
                                    <span class="date"><i class="fas fa-calendar"></i>
                                        {{ $blog->created_at->format('d F, Y') }}</span>
                                </p>
                                <p class="excerpt">{{ $blog->short_description }}</p>
                                <a href="{{ route('shop.blog', $blog->id) }}"
                                    class="read-more-btn">{{ __('app.read-more') }}
                                    <i class="fas fa-angle-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('pages.paginate', ['paginate' => $blogs])

        </div>
    </div>
    <!-- end latest news -->
@stop
