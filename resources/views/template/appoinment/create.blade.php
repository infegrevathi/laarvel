@extends('admin.admin_master')
@section('admin')
@section('title')
    Create Appoinment
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 mb-3 d-flex justify-content-between">
            <h4 class="font-weight-bold d-flex align-items-center">Add Appoinment</h4>
            <a href="{{ route('appoinment.index') }}"
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
                        <form action="{{ route('appoinment.store') }}" method="POST" id="appoinment_form"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="name">name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter Name" value="{{ old('name') }}"
                                        autocomplete="off">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter Title" value="{{ old('title') }}"
                                        autocomplete="off">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter Title" value="{{ old('title') }}"
                                        autocomplete="off">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter Title" value="{{ old('title') }}"
                                        autocomplete="off">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter Title" value="{{ old('title') }}"
                                        autocomplete="off">
                                    @error('title')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $(".datePicker").datepicker({
            dateFormat: 'dd-mm-yy',
        });
    });
    CKEDITOR.replace('description', {
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        toolbar: [{
                name: 'basicstyles',
                groups: ['basicstyles'],
                items: ['Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor']
            },
            {
                name: 'styles',
                items: ['Format', 'Font', 'FontSize']
            },
            {
                name: 'scripts',
                items: ['Subscript', 'Superscript']
            },
            {
                name: 'justify',
                groups: ['blocks', 'align'],
                items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent'],
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
            },
            // { name: 'links', items: [ 'Link', 'Unlink' ] },
            // { name: 'insert', items: [ 'Image'] },
            {
                name: 'spell',
                items: ['jQuerySpellChecker']
            },
            {
                name: 'table',
                items: ['Table']
            }
        ],
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
