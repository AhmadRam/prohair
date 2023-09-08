<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('page_title', 'Pro Hair')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.styles')
    @yield('styles')

    @section('seo')
        <meta name="description" content="description " />
    @show

</head>

<body>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    @include('layouts.scripts')

    @yield('scripts')

    @stack('scripts')

</body>

</html>
