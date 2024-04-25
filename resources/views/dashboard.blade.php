@extends('frontend.main_master')
@section('content')
@section('title')
Dashboard | India's No 1 Online Saree Shop - Nithitex
@endsection
@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">My Account </li>
            </ul>
        </div>
    </div>
</div>
<!-- my account wrapper start -->
<div class="my-account-wrapper pt-120 pb-120">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-3 d-flex justify-content-center align-items-center pb-5">
                <img style="border-radius: 50%; width: 100px;" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" >
            </div> --}}
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        @include('frontend.common.user_sidebar')
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong>{{Auth::user()->name}}</strong> (If Not <strong>{{Auth::user()->name}} !</strong><a href="{{ route('user.logout') }}" class="logout"> Proceed to Logout</a>)</p>
                                        </div>

                                        <p class="mb-0">Welcome to Nithi Tex | India's No 1 Online Saree Shop</p>
                                    </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->

@endsection

