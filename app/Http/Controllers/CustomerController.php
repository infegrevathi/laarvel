<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;
use App\Models\Center;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        if (Auth::user()->hasRole('financer')) {
            $customer = Customer::where('user_id', auth()->id())->get();
            $is_admin = 0;
        }else{
            $customer = Customer::get();
            $is_admin = 1;
        }

        return view('template.customer.index', compact( 'customer','is_admin' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $center = Center::get();
        return view('template.customer.create', compact('center'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $validated = $request->validate( [
            'name'   => 'required',
            'phone'        => 'required',
            'aadhar_number'    => 'required'
        ] );
        $loanStartDate =null;
        $loanEndDate =null;
        $currentDate = Carbon::now();
        $formattedDate = $currentDate->format( 'Y-m-d' );
        if($request->loan_end_date){
            $originalDate = $request->loan_end_date;
            $loan_end_date = Carbon::createFromFormat('d/m/Y', $originalDate)->format('d-m-Y');
            $loanEndDate = Carbon::createFromFormat('d-m-Y', $loan_end_date)->format('Y-m-d');
        }
        if($request->loan_start_date){
            $loanStartDate = Carbon::createFromFormat('d-m-Y', $request->input('loan_start_date'))->format('Y-m-d');
        }
        
        $data[ 'name' ]                         = $request->name;
        $data[ 'nominee_name' ]                         = $request->nominee_name;
        $data[ 'sender_id' ]                         = $request->sender_id;
        $data[ 'user_id' ]                         = Auth::user()->id;
        $data[ 'customer_date' ]                         = $formattedDate;
        $data[ 'email' ]                         = $request->email;
        $data[ 'phone' ]                              = $request->phone;
        $data[ 'aadhar_number' ]                   = $request->aadhar_number;
        $data[ 'door_no' ]                     = $request->door_no;
        $data[ 'street_address' ]                           = $request->street_address;
        $data[ 'city' ]                              = $request->city;
        $data[ 'status' ]                              = 1;
        $data[ 'state' ]                             = $request->state;
        $data[ 'pin_code' ]                             = $request->pin_code;
        $data[ 'observation' ]                             = $request->observation;
        $data[ 'loan_id' ]                             = $request->loan_id;
        $data[ 'loan_details' ]                             = $request->loan_details;
        $data[ 'loan_start_date' ]                             = $loanStartDate;
        $data[ 'loan_end_date' ]                             =  $loanEndDate;
        $data[ 'loan_type' ]                             = $request->loan_type;
        $data[ 'loan_amount' ]                             = $request->loan_amount;
        $data[ 'loan_duration' ]                             = $request->loan_duration;
        if ($request->file('customer_logo')) {
        $image = $request->file( 'customer_logo' );
        $name_gen = hexdec( uniqid() ).'.'.$image->getClientOriginalExtension();
        Image::make( $image )->resize( 917, 1000 )->save( 'upload/customer_logo/'.$name_gen );
        $data[ 'customer_logo' ] = 'upload/customer_logo/'.$name_gen;
        }
        $Customer = Customer::create( $data );

        $notification = array(
            'message' => 'Customer Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $customer = Customer::with('user','sender')->firstWhere( 'id', $id );

        return view('template.customer.show', compact( 'customer' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $customer = Customer::firstWhere( 'id', $id );
        $center = Center::get();
        $loanStartDate =null;
        $loanEndDate =null;
        if($customer->loan_start_date){
        $loanStartDate = Carbon::createFromFormat('Y-m-d', $customer->loan_start_date)->format('d-m-Y');
        }
        if($customer->loan_end_date){
        $loanEndDate = Carbon::createFromFormat('Y-m-d', $customer->loan_end_date)->format('d/m/Y');
        }
        return view('template.customer.edit', compact('customer','loanStartDate','loanEndDate','center') );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $validated = $request->validate([
            'name'  => 'required',
			'phone'  => 'required',
            'aadhar_number'    => 'required'
        ]);

        $customer = Customer::firstWhere( 'id', $id );
        $loanStartDate =null;
        $loanEndDate =null;
        if($request->loan_end_date){
            $originalDate = $request->loan_end_date;
            $loan_end_date = Carbon::createFromFormat('d/m/Y', $originalDate)->format('d-m-Y');
            $loanEndDate = Carbon::createFromFormat('d-m-Y', $loan_end_date)->format('Y-m-d');
        }
        if($request->loan_start_date){
            $loanStartDate = Carbon::createFromFormat('d-m-Y', $request->input('loan_start_date'))->format('Y-m-d');
        }

        $data[ 'name' ]                         = $request->name;
        $data[ 'nominee_name' ]                         = $request->nominee_name;
        $data[ 'sender_id' ]                         = $request->sender_id;
        $data[ 'email' ]                         = $request->email;
        $data[ 'phone' ]                              = $request->phone;
        $data[ 'aadhar_number' ]                   = $request->aadhar_number;
        $data[ 'door_no' ]                     = $request->door_no;
        $data[ 'street_address' ]                           = $request->street_address;
        $data[ 'city' ]                              = $request->city;
        $data[ 'state' ]                             = $request->state;
        $data[ 'pin_code' ]                             = $request->pin_code;
        $data[ 'observation' ]                             = $request->observation;
        $data[ 'loan_id' ]                             = $request->loan_id;
        $data[ 'loan_details' ]                             = $request->loan_details;
        $data[ 'loan_start_date' ]                             = $loanStartDate;
        $data[ 'loan_end_date' ]                             =  $loanEndDate;
        $data[ 'loan_type' ]                             = $request->loan_type;
        $data[ 'loan_amount' ]                             = $request->loan_amount;
        $data[ 'loan_duration' ]                             = $request->loan_duration;
        if ($request->file('customer_logo')) {
        $image = $request->file( 'customer_logo' );
        $name_gen = hexdec( uniqid() ).'.'.$image->getClientOriginalExtension();
        Image::make( $image )->resize( 917, 1000 )->save( 'upload/customer_logo/'.$name_gen );
        $data[ 'customer_logo' ] = 'upload/customer_logo/'.$name_gen;
        }

        $customer->update( $data );

        return redirect()->route( 'customer.index' )->with( [
            'message' => 'Customer updated successfully', 'alert-type' => 'success'
        ] );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $customer = Customer::findOrFail( $id );
        $customer->delete();
        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );

    }

    public function status( $id ) {
        $customer = Customer::where( 'id', $id )->first();

        if ( $customer->status ) {
            $data[ 'status' ] = 0;
            $notification = array(
                'message' => 'Customer InActive Successfully',
                'alert-type' => 'success'
            );
        } else {
            $data[ 'status' ] = 1;
            $notification = array(
                'message' => 'Customer Active Successfully',
                'alert-type' => 'success'
            );
        }

        $customer->update( $data );

        return redirect()->back()->with( $notification );
    }

    public function customerReport() {
        $customer = Customer::get();
        $financer = User::role( 'financer')->where('is_verified', 1 )->get();
        $aadharNumber = Customer::select('aadhar_number')
        ->groupBy('aadhar_number')
        ->get();
        if (Auth::user()->hasRole('financer')) {
            $is_admin = 0;
        }else{
            $is_admin = 1;
        }
        return view('template.report.customer_report', compact( 'customer', 'financer', 'aadharNumber','is_admin') );
    }

    public function customerAjaxReport( Request $request ) {

        // $startDate = $request->FromDate;
        // $endDate = $request->ToDate;
        $aadharNumber = $request->aadhar_number;

        $customeritem = Customer::with('user')
        ->when($request->aadhar_number, function ($query) use ($aadharNumber) {
            $query->where('aadhar_number', $aadharNumber);
        })
        // ->groupBy('aadhar_number','name')
        ->get();
        if (Auth::user()->hasRole('financer')) {
            $is_admin = 0;
        }else{
            $is_admin = 1;
        }

        return response()->json( array(
            'data' => $customeritem,
            'is_admin' => $is_admin,
        ) );
    }

}
