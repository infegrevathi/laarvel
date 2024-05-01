@extends('admin.admin_master')
@section('admin')
@section('title')
    Create Gallery
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 mb-3 d-flex justify-content-between">
            <h4 class="font-weight-bold d-flex align-items-center">Add Gallery</h4>
            <a href="{{ route('gallery.index') }}"
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
                        <form action="{{ route('gallery.store') }}" method="POST" id="gallery_form"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter Title" value="{{ old('title') }}"
                                        autocomplete="off">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-lg-3">
                                    <label for="image"> Photo</label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        value="{{ old('image') }}" onChange="mainThamUrl(this)">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <img src="" id="mainThmb">
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

<script>
    $(document).ready(function() {
        $(".datePicker").datepicker({
            dateFormat: 'dd-mm-yy',
        });
    });
</script>

<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
