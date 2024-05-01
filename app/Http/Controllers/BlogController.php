<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Image;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::get();
        return view('template.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = Blog::get();
        return view('template.blog.create', compact('blog'));
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
            'title'   => 'required',
        ]);
        $data['title']         = $request->title;
        $data['description']   = $request->description;
        $data['post_by']       = $request->post_by;
        // $data['tag']       = $request->tag;
        if ($request->file('image')) {
            $image = $request->file( 'image' );
            $name_gen = hexdec( uniqid() ).'.'.$image->getClientOriginalExtension();
            Image::make( $image )->resize( 917, 1000 )->save( 'upload/image/'.$name_gen );
            $data[ 'image' ] = 'upload/image/'.$name_gen;
            }
            $blog = Blog::create( $data );
    
            $notification = array(
                'message' => 'Blog Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.index')->with($notification);
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
        $blog = Blog::firstWhere( 'id', $id );
        return view('template.blog.edit', compact('blog') );
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
        $blog = Blog::firstWhere( 'id', $id );
        $data['title']         = $request->title;
        $data['description']   = $request->description;
        $data['post_by']       = $request->post_by;
        if ($request->file('image')) {
            $image = $request->file( 'image' );
            $name_gen = hexdec( uniqid() ).'.'.$image->getClientOriginalExtension();
            Image::make( $image )->resize( 917, 1000 )->save( 'upload/image/'.$name_gen );
            $data['image'] = 'upload/image/'.$name_gen;
            }
            $blog->update($data);
    
            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail( $id );
        $blog->delete();
        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }
    public function status( $id ) {
        $blog = Blog::where( 'id', $id )->first();

        if ( $blog->status ) {
            $data[ 'status' ] = 0;
            $notification = array(
                'message' => 'Blog InActive Successfully',
                'alert-type' => 'success'
            );
        } else {
            $data[ 'status' ] = 1;
            $notification = array(
                'message' => 'Blog Active Successfully',
                'alert-type' => 'success'
            );
        }

        $blog->update( $data );

        return redirect()->back()->with( $notification );
    }
}
