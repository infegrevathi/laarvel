@extends('admin.admin_master')
@section('admin')
@section('title')
    Create Centre
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 mb-3 d-flex justify-content-between">
            <h4 class="font-weight-bold d-flex align-items-center">Add Centre</h4>
            <a href="{{ route('center.index') }}"
                class="btn btn-primary btn-sm d-flex align-items-center justify-content-between ms-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ms-2">Back</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-block">
                <div class="card-body">
                    <div class="acc-edit">
                        <form action="{{ route('center.store') }}" method="POST" id="center_form"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="center">Centre Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="center" id="center"
                                        placeholder="Enter Centre Name" value="{{ old('center') }}"
                                        autocomplete="off">
                                    @error('center')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6"><br><br>
                                    <div class=" mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
