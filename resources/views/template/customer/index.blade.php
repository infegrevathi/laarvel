@extends('admin.admin_master')
@section('admin')
@section('title')
Customer
@endsection
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<div class="page-content">
    <h5 class="pb-3 pt-5">Customer List</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    @can('Customer Create')
                    <a href="{{url('customer/create')}}" class="btn btn-dark ms-auto">Create Customer</a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        @if ($is_admin)
                                        <th>Financer Name</th>
                                        @endif
                                        <th>Loan Id</th>
                                        <th>Loan Start Date</th>
                                        <th>Loan End Start</th>
                                        <th>Loan Amount</th>
                                        <th>Loan Duration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach ($customer as $item)
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td>{{$item->name}}</td>
                                        @if ($is_admin)
                                        <td>{{$item->user->name}}</td>
                                        @endif
                                        <td>{{$item->loan_id}}</td>
                                        <td>{{$item->loan_start_date}}</td>
                                        <td>{{$item->loan_end_date}}</td>
                                        <td>{{$item->loan_amount}}</td>
                                        <td>{{$item->loan_duration}}</td>
                                        <td>@if($item->status == 1)
                                            <a href="{{route('customer.status', $item->id)}}" class="badge badge-pill badge-success" id="confirm" title="Edit Data">Active</a>
                                            @else
                                            <a href="{{route('customer.status', $item->id)}}" class="badge badge-pill badge-danger" id="confirm" title="Edit Data">InActive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @can('Customer Edit')
                                                  <a class="dropdown-item" href="{{ route('customer.edit',$item->id) }}">Edit</a>
                                                  @endcan
                                                  @can('Customer Delete')
                                                  <a class="dropdown-item" id="delete" href="{{ route('customer.delete',$item->id) }}">Delete</a>
                                                  @endcan
                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                    @php
                                        $serialNo++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function mainThamUrl(input){
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80).height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>