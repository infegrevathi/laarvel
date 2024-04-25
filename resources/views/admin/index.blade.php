@extends('admin.admin_master')
@section('admin')
@section('title')
Admin |Finance
@endsection

  <!-- Content Header (Page header) -->
  
        <div class="page-content">
  
          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h3 class="mb-3 mb-md-0">Dashboard</h3>
            </div>
            {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
              <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control">
              </div>
            </div> --}}
          </div>

          {{-- <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="mb-3 mb-md-0">Customers</h4>
            </div>
          </div> --}}
  
          <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total patient</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Doctor</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div> <!-- row -->
        </div>
@endsection