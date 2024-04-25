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
                <li class="active">Profile Update </li>
            </ul>
        </div>
    </div>
</div>
<!-- my account wrapper start -->
<div class="my-account-wrapper pt-120 pb-120">
    <div class="container">
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
                                        <h3>Profile Update</h3>
                                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                            @csrf
                                    
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Name <span> </span></label>
                                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">                                
                                            </div>
                                    
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Email <span> </span></label>
                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">                                
                                            </div>
                                    
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Phone <span> </span></label>
                                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">                                
                                            </div>    
                                    
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">User Image <span> </span></label>
                                                <input type="file" name="profile_photo_path" class="form-control">                                
                                            </div><br>
                                    
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-danger">Update</button>
                                            </div>    
                                    
                                        </form>
                                    
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

