@extends('admin.admin_master')
@section('admin')
@section('title')
Centre
@endsection
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<div class="page-content">
    <h5 class="pb-3 pt-5">Centre List</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    {{-- @can('Center Create') --}}
                    <a href="{{url('center/create')}}" class="btn btn-dark ms-auto">Create Centre</a>
                    {{-- @endcan --}}
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach ($center as $item)
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td>{{$item->sender}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    {{-- @can('Center Edit') --}}
                                                  <a class="dropdown-item" href="{{ route('center.edit',$item->id) }}">Edit</a>
                                                  {{-- @endcan --}}
                                                  {{-- @can('Center Delete') --}}
                                                  <a class="dropdown-item" id="delete" href="{{ route('center.delete',$item->id) }}">Delete</a>
                                                  {{-- @endcan --}}
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