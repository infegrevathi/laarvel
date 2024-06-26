@extends('admin.admin_master')
@section('admin')
@section('title')
    Admin Profile Update
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Admin Profile Update</h5>
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
                    {{-- <h3 class="card-title">Product Category</h3> --}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span> </span></label>
                            <input type="name" name="name" class="form-control" value="{{ $adminData->name }}">
                            @error('name') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">                
                            <label class="info-title" for="exampleInputEmail1">Email <span> </span></label>
                            <input type="email" name="email" class="form-control" value="{{ $adminData->email }}">
                            @error('email') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone <span> </span></label>
                            <input type="text" name="phone" class="form-control" value="{{ $adminData->phone }}">
                            @error('phone') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Company Name <span> </span></label>
                            <input type="text" name="company_name" class="form-control" value="{{ $adminData->company_name }}">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">User Image <span> </span></label>
                            <input type="file" id="image" name="profile_photo_path" class="form-control"
                            onChange="mainThamUrl(this)" >
                        </div>
                        <img class="rounded-circle"
                            src="{{ !empty($adminData->profile_photo_path) ? url('upload/admin_images/' . $adminData->profile_photo_path) : url('upload/No-Image.png') }}"
                            alt="User Avatar" id="showImage" style="width: 100px; height:100px;">
                        {{-- </div>     --}}
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-primary mb-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
