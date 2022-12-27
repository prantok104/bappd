<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/bootstrap.min.css') }}">
    {{-- Fontawesome css --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
    {{-- Style css --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    @stack('css')
</head>

<body>
    {{-- Header area start --}}
    <header class="bp-header-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bp-header-content-area">
                        <div class="bp-header-logo-side">
                            <a href="{{ route('front.home.page') }}" class="bp-main-logo"><img
                                    src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="Logo"></a>
                            <p>BANGLADESH ASSOCIATION OF PARLIAMENT ON <br> POPULATION AND DEVELOPMENT (BAPPD)</p>
                        </div>
                        <div class="bp-header-essential-part">
                            <div class="bp-header-top-menu">
                                <a href=""> <i class="fal fa-comments"></i> feedback</a>
                                <a href=""> <i class="fal fa-sign-in"></i> login</a>
                                <a href="javascript:void(0)" class="text-uppercase"> <i class="fal fa-search"></i>
                                    search</a>
                            </div>
                            {{-- Menu area start --}}
                            @include('Frontend.Includes.menu')
                            {{-- Menu area end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- Header area end --}}
