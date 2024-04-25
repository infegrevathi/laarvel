@extends('admin.admin_master')
@section('admin')
@section('title')
    All Financers
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>All Financers </h5>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Order List</h3> --}}
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Profile Photo</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($managers as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td><img  src="{{(!empty($item->profile_photo_path))?url('upload/admin_images/'.$item->profile_photo_path):url('upload/No-Image.png')}}" style="width: 60px; height: 50px;"></td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->company_name}}</td>
                                        <td>
                                            <label for="">
                                                @if($item->status == 1)
                                                <a class="badge badge-pill badge-warning text-white" style="background: #008000;" id="confirm" href="{{ route('financer_inactive.update',$item->id) }}"> Active </a>
                                                @elseif($item->status == 0)
                                                <a class="badge badge-pill badge-warning text-white" style="background: #f50418;" id="confirm" href="{{ route('financer_active.update',$item->id) }}"> InActive </a>
                                                @endif
                                                </label>    
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <a class="dropdown-item" id="delete" href="{{ route('financer.delete',$item->id) }}">Delete</a>
                                                </div>
                                              </div>
                                        </td>
                                        
                                    </tr>
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
