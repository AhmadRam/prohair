@extends('layouts.master')

@section('page_title')
    {{ $page->title }}
@stop

@section('seo')
    <meta name="title" content="{{ $page->title }}" />

    <meta name="description" content="{{ $page->description }}" />

    <meta name="keywords" content="{{ $page->keywords }}" />
@endsection

@section('content')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        {{-- <p>We sale fresh fruits</p> --}}
                        <h1>{{ $page->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- featured section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="featured-text">

                        {!! $page->body !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
