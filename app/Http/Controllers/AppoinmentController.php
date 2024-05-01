<?php

namespace App\Http\Controllers;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use Image;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appoinment = Appoinment::get();
        return view('template.appoinment.index', compact('appoinment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $appoinment = Appoinment::get();
    //     return view('template.appoinment.create', compact('appoinment'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name']         = $request->name;
        $data['[phone]']   = $request->phone;
        $data['email']       = $request->email;
        $data['reason']       = $request->reason;
        $data['appoinment_date']  = $request->appoinment_date;
        // $data['tag']       = $request->tag;
            $appoinment = Appoinment::create( $data );
    
            $notification = array(
                'message' => 'appoinment Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('appoinment.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appoinment = Appoinment::findOrFail( $id );
        $appoinment->delete();
        $notification = array(
            'message' => 'appoinment Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }
    public function status( $id ) {
        $appoinment = Appoinment::where( 'id', $id )->first();

        if ( $appoinment->status ) {
            $data[ 'status' ] = 0;
            $notification = array(
                'message' => 'appoinment InActive Successfully',
                'alert-type' => 'success'
            );
        } else {
            $data[ 'status' ] = 1;
            $notification = array(
                'message' => 'appoinment Active Successfully',
                'alert-type' => 'success'
            );
        }

        $appoinment->update( $data );

        return redirect()->back()->with( $notification );
    }
}
