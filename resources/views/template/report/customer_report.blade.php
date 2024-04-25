@extends('admin.admin_master')
@section('admin')
@section('title')
    Customer Report
@endsection
<style>
    /* Style for the select box */
    select {
        width: 200px;
        padding: 8px;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Customer Report</h5>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">Product List</h3> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Aadhar Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="aadhar_number" id="aadhar_number"
                            placeholder="Enter Aadhar Number" autocomplete="off">
                        {{-- <label for="aadhar_number">Aadhar Number</label>
                        <select id="aadhar_number" name="aadhar_number" class="form-control select2"
                        >
                            <option value="">select Aadhar Number</option>
                            @foreach ($aadharNumber as $aadharNumbers)
                                <option data-tokens="{{ $aadharNumbers->aadhar_number }}" value="{{ $aadharNumbers->aadhar_number }}">{{ $aadharNumbers->aadhar_number }}
                                </option>
                            @endforeach
                        </select> --}}
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="">Date</label>
                        <div class="form-group">
                            <button type="button" class="btn btn-flat btn-default" id="btnDate"
                                style="height: 36px;">
                                <i data-feather="calendar" class="text-primary"></i><span id="spnDate"
                                    style="padding-left: 5px;">Today</span>
                            </button>
                        </div>
                    </div> --}}
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTablesales" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        @if ($is_admin)
                                            <th>Financer Name</th>
                                        @endif
                                        <th>Aadhar Number</th>
                                        <th>Loan Id</th>
                                        <th>Loan Start Date</th>
                                        <th>Loan End Start</th>
                                        <th>Loan Amount</th>
                                        <th>Loan Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> --}}

<script type="text/javascript">
    var table = "";
    // var FromDate = moment().format('YYYY/MM/DD');
    // var ToDate = moment().format('YYYY/MM/DD');

    $(document).ready(function() {
        // $("#btnDate").daterangepicker({
        //         ranges: {
        //             'Today': [moment(), moment()],
        //             'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
        //             'Last 7 Days': [moment().subtract('days', 6), moment()],
        //             'Last 30 Days': [moment().subtract('days', 29), moment()],
        //             'This Month': [moment().startOf('month'), moment().endOf('month')],
        //             'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract(
        //                 'month', 1).endOf('month')]
        //         },
        //         startDate: moment(),
        //         endDate: moment()
        //     },
        //     function(start, end) {
        //         FromDate = start.format('YYYY/MM/DD')
        //         ToDate = end.format('YYYY/MM/DD')
        //         table.destroy();
        //         listreportcustomer();
        //         $("#spnDate").html($(".ranges > ul > li[class='active']").text());
        //     }
        // );
        // $("#aadhar_number").change(function() {
        //     table.destroy();
        //     listreportcustomer();
        // });
        $('#aadhar_number').on('input', function() {
            table.destroy();
            listreportcustomer();
        });

        listreportcustomer();
    });


    function listreportcustomer() {
        var aadhar_number = $("#aadhar_number").val();
        $.ajax({
            url: '/customer/ajax/report',
            method: 'POST',
            data: '&aadhar_number=' + aadhar_number

        }).done(function(response) {

            $('#tbodyList tr').empty();

            var List = "";
            $.each(response.data, function(idx, val) {

                List += "<tr>";
                List += "<td>" + val.name + "</td>";
                if (response.is_admin == 1) {
                    // Display financer name if the user is an admin
                    List += "<td>" + val.user.name + "</td>";
                }
                List += "<td>" + val.aadhar_number + "</td>";
                List += "<td>" + val.loan_id + "</td>";
                List += "<td>" + val.loan_start_date + "</td>";
                List += "<td>" + val.loan_end_date + "</td>";
                List += "<td>" + val.loan_amount + "</td>";
                List += "<td>" + val.loan_duration + "</td>";
                List += "<td><div class='dropdown'>" +
                    "<button class='btn' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                    "<i class='fas fa-ellipsis-vertical'></i>" +
                    "</button>" +
                    "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>" +
                    "<a class='dropdown-item' href='" + "{{ url('customer/view/') }}" + "/" + val.id +
                    "'>View</a>" +
                    "</div>" +
                    "</div></td>";
                List += "</tr>";
            });

            $('#tbodyList').html(List);
            table = $('#dataTablesales').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });
        });
    }
</script>
@endsection
