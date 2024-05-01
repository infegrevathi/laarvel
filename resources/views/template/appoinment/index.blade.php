@extends('admin.admin_master')
@section('admin')
@section('title')
Appoinment
@endsection
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<div class="page-content">
    <h5 class="pb-3 pt-5">Appoinment List</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    {{-- <a href="{{url('appoinment/create')}}" class="btn btn-dark ms-auto">Create appoinment</a> --}}
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Reason</th>
                                        <th>Appoinment Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach ($appoinment as $item)
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->reason}}</td>
                                        <td>{{$item->appoinment_date}}</td>
                                       
                                        <td>@if($item->status == 1)
                                            <a href="{{route('appoinment.status', $item->id)}}" class="badge badge-pill badge-success" id="confirm">Active</a>
                                            @else
                                            <a href="{{route('appoinment.status', $item->id)}}" class="badge badge-pill badge-danger" id="confirm">InActive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <a class="dropdown-item" id="delete" href="{{ route('appoinment.delete',$item->id) }}">Delete</a>
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