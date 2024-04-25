@extends('admin.admin_master')
@section('admin')
@section('title')
    Create Customer
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 mb-3 d-flex justify-content-between">
            <h4 class="font-weight-bold d-flex align-items-center">Add Customer</h4>
            <a href="{{ route('customer.index') }}"
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
                        <form action="{{ route('customer.store') }}" method="POST" id="customer_form"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="name">Customer Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter Customer Name" value="{{ old('name') }}"
                                        autocomplete="off">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="nominee_name">Nominee Name</label>
                                    <input type="text" class="form-control" name="nominee_name" id="nominee_name"
                                        placeholder="Enter Nominee Name" value="{{ old('nominee_name') }}"
                                        autocomplete="off">
                                    @error('nominee_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="center">Centre</label>
                                    <select name="sender_id" id="sender_id" class="form-select select2"
                                        data-type="select">
                                        <option value="">Select Centre</option>
                                        @foreach ($center as $item)
                                            <option value="{{ $item->id }}">{{ $item->sender}}</option>
                                        @endforeach
                                    </select>
                                    @error('sender_id')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter Email" value="{{ old('email') }}" autocomplete="off">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Enter Phone" value="{{ old('phone') }}" autocomplete="off">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="aadhar_number">Aadhar Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="aadhar_number" id="aadhar_number"
                                        placeholder="Enter Aadhar Number" value="{{ old('aadhar_number') }}">
                                    @error('aadhar_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="customer_logo">Customer Photo</label>
                                    <input type="file" class="form-control" name="customer_logo" id="customer_logo"
                                        value="{{ old('customer_logo') }}" onChange="mainThamUrl(this)">
                                    @error('customer_logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <img src="" id="mainThmb">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="door_no">Door No </label>
                                    <input type="text" class="form-control" name="door_no" id="door_no"
                                        placeholder="Enter Door No" value="{{ old('door_no') }}">
                                    @error('door_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="street_address">Street Address
                                    </label>
                                    <input type="text" class="form-control" name="street_address"
                                        id="street_address" placeholder="Enter Street Address"
                                        value="{{ old('street_address') }}">
                                    @error('street_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="city">City </label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        placeholder="Enter City" value="{{ old('city') }}">
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="state">State </label>
                                    <input type="text" class="form-control" name="state" id="state"
                                        placeholder="Enter State" value="Tamil Nadu">
                                    @error('state')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="pin_code">Pin Code</label>
                                    <input type="text" class="form-control" name="pin_code" id="pin_code"
                                        placeholder="Enter Pin Code" value="{{ old('pin_code') }}">
                                    @error('pin_code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="loan_id">Loan Id </label>
                                    <input type="text" class="form-control" name="loan_id" id="loan_id"
                                        placeholder="Enter Loan Id" value="{{ old('loan_id') }}">
                                    @error('loan_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="loan_details">loan Details</label>
                                    <input type="text" class="form-control" name="loan_details" id="loan_details"
                                        placeholder="Enter Loan Details" value="{{ old('loan_details') }}">
                                    @error('loan_details')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="loan_start_date">Loan Start Date
                                    </label>
                                    <input type="text" class="form-control datePicker" name="loan_start_date"
                                        id="loan_start_date" value="{{ old('loan_start_date') }}">
                                    @error('loan_start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group col-lg-3">
                                    <label for="txtDepartmentName">
                                        Loan Type</label>
                                    <select name="loan_type" id="loan_type" class="form-control">
                                        <option value="">Select Loan Type</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                    @error('loan_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="loan_duration">Loan Duration
                                    </label>
                                    <input type="text" class="form-control" name="loan_duration"
                                        id="loan_duration" placeholder="Enter Loan Duration"
                                        value="{{ old('loan_duration') }}">
                                    @error('loan_duration')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="loan_amount">Loan Amount </label>
                                    <input type="text" class="form-control" name="loan_amount" id="loan_amount"
                                        placeholder="Enter Loan Amount" value="{{ old('loan_amount') }}">
                                    @error('loan_amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="loan_end_date">Loan End Date
                                    </label>
                                    <input type="text" class="form-control" name="loan_end_date"
                                        id="loan_end_date" value="{{ old('loan_end_date') }}" readonly>
                                    @error('loan_end_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="observation">Observation </label>
                                    <textarea type="text" class="form-control" name="observation" id="observation" placeholder="Enter Observation"
                                        value="{{ old('observation') }}" autocomplete="off" rows="5"></textarea>
                                    @error('observation')
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

<script>
    $(document).ready(function() {
        $(".datePicker").datepicker({
            dateFormat: 'dd-mm-yy',
            onSelect: function(selectedDate) {
                calculateEndDate();
            }
        });

        $("#loan_type, #loan_duration").on("change input", function() {
            calculateEndDate();
        });

        function calculateEndDate() {
            var startDate = $("#loan_start_date").datepicker("getDate");
            if (startDate !== null) {
                var loanType = $("#loan_type").val();
                var loanDuration = parseInt($("#loan_duration").val());

                if (!isNaN(loanDuration)) {
                    var endDate = new Date(startDate);

                    switch (loanType) {
                        case "daily":
                            endDate.setDate(endDate.getDate() + loanDuration);
                            break;
                        case "weekly":
                            endDate.setDate(endDate.getDate() + (loanDuration * 7));
                            break;
                        case "monthly":
                            endDate.setMonth(endDate.getMonth() + loanDuration);
                            break;
                        case "yearly":
                            endDate.setFullYear(endDate.getFullYear() + loanDuration);
                            break;
                    }
                    //  $("#loan_end_date").datepicker("setDate", endDate);
                    var formattedEndDate = endDate.toLocaleDateString('en-GB');
                    $("#loan_end_date").val(formattedEndDate);
                  
                }
            }
        }
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
