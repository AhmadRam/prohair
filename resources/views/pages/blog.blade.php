@extends('layouts.master')

@section('page_title')
    {{ $blog->title }}
@stop

@section('content')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section" style="padding: 50px">
    </div>
    <!-- end breadcrumb section -->

    <!-- single article section -->
    <div class="mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-article-section">
                        <div class="single-article-text" style="text-align: {{ app()->getLocale() == 'ar' ? 'right' : '' }}">
                            <div class="single-artcile-bg"
                                style="background-image: url('{{ Voyager::image($blog->image) }}');"></div>
                            <p class="blog-meta">
                                <span class="date"><i
                                        class="fas fa-calendar"></i>{{ $blog->created_at->format('d F, Y') }}</span>
                            </p>
                            <h2>{{ $blog->title }}</h2>
                            <p>{!! $blog->description !!}</p>
                        </div>

                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <div class="sidebar-section">
                        <div class="recent-posts">
                            <h4>Recent News</h4>
                            <ul>
                                @foreach ($recent_news as $recent_new)
                                    <li><a
                                            href="{{ route('shop.single-news', $recent_new->id) }}">{{ $recent_new->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                 --}}
            </div>
        </div>
    </div>
    <!-- end single article section -->

@stop
