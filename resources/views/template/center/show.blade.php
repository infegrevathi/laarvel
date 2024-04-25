@extends('admin.admin_master')
@section('admin')
@section('title')
    Order Details
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer Details</h3>
                    <a href="{{route('customer.report')}}" class="btn-dark btn-md btn" style="float: right;">Back</a>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            {{-- <img src="{{ asset('backend/assets/images/nithitex-logo-large.png') }}"
                                class="img-responsive" alt="" width="50%" /> --}}
                        </div>
                        <div
                            class="col-lg-6 col-md-6 col-sm-6 d-flex align-items-center justify-content-center text-right">
                            <h6 class="pr-5"><span>Loan ID: {{$customer->loan_id}}</span></h6>
                        </div>
                    </div>


                    <div class="container">
                        <h6 class="mb-3 mt-5" style="color: green;">Customer Summary</h6>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <table class="table" width="100%">
                                    <thead style="background-color: green;">
                                        <tr>
                                            <th style="color:#FFF;">Image</th>
                                            <th style="color:#FFF;">Customer Name</th>
                                            <th style="color:#FFF;">Loan Duration</th>
                                            <th style="color:#FFF;">Loan Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td><img src="{{ asset($customer->customer_logo) }}" height="50px;"
                                                    width="50px;"></td>
                                            <td> {{ $customer->name }}</td>
                                            <td> {{ $customer->loan_duration }}</td>
                                            <td> ₹ {{ $customer->loan_amount }} </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row mt-3">
                           
                            <div class="col-md-6">
                                <h6 class="mb-3 mt-3" style="color: green;">Customer Details</h6>
                                <table class="table table-bordered table-striped" style="white-space: normal">
                                    <thead>
                                        <tr>
                                            <th>loan_details</th>
                                            <td>{{ $customer->loan_details }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nominee Name</th>
                                            <td>{{ $customer->nominee_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Centre</th>
                                            <td>{{ $customer->sender }}</td>
                                        </tr>
                                        <tr>
                                            <th>loan_start_date</th>
                                            <td>{{ $customer->loan_start_date }}</td>
                                        </tr>

                                        <tr>
                                            <th>loan_end_date</th>
                                            <td> {{ $customer->loan_end_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>aadhar_number</th>
                                            <td>{{ $customer->aadhar_number }} </td>
                                        </tr>
                                        <tr>
                                            <th>phone</th>
                                            <td>{{ $customer->phone }} </td>
                                        </tr>
                                        <tr>
                                            <th>email</th>
                                            <td> {{ $customer->email }}</td>
                                        </tr>

                                        <tr>
                                            <th>door_no</th>
                                            <td>{{ $customer->door_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>street_address </th>
                                            <td>{{ $customer->street_address }} </td>
                                        </tr>
                                        <tr>
                                            <th>city </th>
                                            <td>{{ $customer->city }} </td>
                                        </tr>
                                        <tr>
                                            <th>state </th>
                                            <td>{{ $customer->state }} </td>
                                        </tr>
                                        <tr>
                                            <th>pin_code </th>
                                            <td>{{ $customer->pin_code }} </td>
                                        </tr>
                                        <tr>
                                            <th>observation </th>
                                            <td>{{ $customer->observation }} </td>
                                        </tr>
                                        <tr>
                                            <th>status </th>
                                            <td>
                                                @if ($customer->status == 1)
                                                    Completed
                                                @else
                                                    Pending
                                                @endif
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3 mt-3 text-center" style="color: green;">Financer Details</h6>
                                <table class="table table-bordered table-striped" style="white-space: normal">
                                    <thead>
                                        <tr>
                                            <th> Name</th>
                                            <td>{{ $customer->user->name }} </td>
                                        </tr>
                                        <tr>
                                            <th> Email</th>
                                            <td> {{ $customer->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone </th>
                                            <td>{{ $customer->user->phone }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"></script>
