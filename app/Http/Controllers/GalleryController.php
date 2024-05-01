<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::get();
        return view('template.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = Gallery::get();
        return view('template.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'   => 'required',
        ]);
        $data['title']         = $request->title;
        if ($request->file('image')) {
            $image = $request->file( 'image' );
            $name_gen = hexdec( uniqid() ).'.'.$image->getClientOriginalExtension();
            Image::make( $image )->resize( 917, 1000 )->save( 'upload/image/'.$name_gen );
            $data[ 'image' ] = 'upload/image/'.$name_gen;
            }
            $gallery = Gallery::create( $data );
    
            $notification = array(
                'message' => 'Photo Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('gallery.index')->with($notification);
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
    public function edit($id)
    {
        $gallery = Gallery::firstWhere( 'id', $id );
        return view('template.gallery.edit', compact('gallery') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::firstWhere( 'id', $id );
        $data['title']         = $request->title;
        if ($request->file('image')) {
            $image = $request->file( 'image' );
            $name_gen = hexdec( uniqid() ).'.'.$image->getClientOriginalExtension();
            Image::make( $image )->resize( 917, 1000 )->save( 'upload/image/'.$name_gen );
            $data['image'] = 'upload/image/'.$name_gen;
            }
            $gallery->update($data);
    
            $notification = array(
                'message' => 'Photo Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('gallery.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        $notification = array(
            'message' => 'Photo Deleted Successfully',
            'alert-type' => 'success'
        );
    } catch (Exception $e) {
        $notification = array(
            'message' => 'Photo Not Deleted',
            'alert-type' => 'success'
        );
    }
        return redirect()->back()->with( $notification );
    }
    public function status( $id ) {
        $gallery = Gallery::where( 'id', $id )->first();

        if ( $gallery->status ) {
            $data[ 'status' ] = 0;
            $notification = array(
                'message' => 'Gallery InActive Successfully',
                'alert-type' => 'success'
            );
        } else {
            $data[ 'status' ] = 1;
            $notification = array(
                'message' => 'Gallery Active Successfully',
                'alert-type' => 'success'
            );
        }

        $gallery->update( $data );

        return redirect()->back()->with( $notification );
    }
}
