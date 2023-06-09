<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_front')</title>
    @include('include_front.header_styles')
</head>
<body>
@include('include_front.side_navbar')
@include('include_front.navbar')
<div class="container">
    @yield('main_content_front')
</div>
@include('include_front.footer')
@include('include_front.footer_scripts')
@stack('front_custom_scripts')
</body>
</html>
