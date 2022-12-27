@extends('backend.layouts.master')
@section('title', 'Users')
@push('style')
    <style>
        .profile-image {
            height: 200px;
            width: 200px;
            border-radius: 50%;
            border-width: 2px;
            border-style: solid;
            border-color: #f12711;
            border-color: -webkit-linear-gradient(to right, #f5af19, #f12711);
            border-color: linear-gradient(to right, #f5af19, #f12711);
        }

        .social-container {
            text-align: center;
        }

        .social-icons {
            padding: 0;
            list-style: none;
        }

        .social-icons li {
            display: inline-block;
            /* margin: 0.1em; */
            position: relative;
            font-size: 1.3em;
        }

        .social-icons i {
            color: #fff;
            position: absolute;
            top: 15px;
            left: 15px;
            transition: all 265ms ease-out;
        }

        .social-icons a {
            display: inline-block;
        }

        .social-icons a:before {
            transform: scale(1);
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            content: " ";
            width: 45px;
            height: 45px;
            border-radius: 100%;
            display: block;
            background: linear-gradient(45deg, #00B5F5, #002A8F);
            transition: all 265ms ease-out;
        }

        .social-icons a:hover:before {
            transform: scale(0);
            transition: all 265ms ease-in;
        }

        .social-icons a:hover i {
            transform: scale(1.5);
            -ms-transform: scale(1.5);
            -webkit-transform: scale(1.5);
            color: #00B5F5;
            background: -webkit-linear-gradient(45deg, #00B5F5, #002A8F);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 265ms ease-in;
        }
    </style>
@endpush
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">User Profile</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        @if (!empty($user->profile_pic))
                            <img src="" alt="">
                        @else
                            <img src="{{ asset('backend/assets/images/default-user-image/default-user.png') }}"
                                class="img-fluid profile-image" alt="">
                        @endif
                    </div>

                    <div class="text-center pt-3">
                        <h4 class="mt-3">{{ $user->name }}</h4>
                    </div>
                    <div class="pt-3">
                        <div class="social-container">
                            <ul class="social-icons">
                                <li><a href="{{ $user->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="tel:{{ $user->mobile }}"><i class="fa-solid fa-mobile-screen-button"></i></a></li>
                                <li><a href="{{ $user->twitter }}"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="mailto:{{ $user->email }}"><i class="fa-sharp fa-solid fa-at"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <span class="font-weight-bold">Name: </span><span>{{ $user->name }}</span><br/>
                    <span class="font-weight-bold">Email: </span><span>{{ $user->email }}</span><br/>
                    <span class="font-weight-bold">Mobile: </span><span>{{ $user->mobile }}</span><br/>
                    <span class="font-weight-bold">Gender: </span><span>{{ $user->gender }}</span><br/>
                    <span class="font-weight-bold">Account Status: </span><span>{{ ($user->is_active == 1 ) ? 'Active' : 'Inactive'}}</span><br/>
                </div>
            </div>
        </div>
    </div>
@endsection
