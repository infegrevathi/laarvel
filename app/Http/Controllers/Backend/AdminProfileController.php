<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
		$id = Auth::user()->id;
		$adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    }
    public function AdminProfileEdit(){
        $id = Auth::user()->id;
		$editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }
    public function AdminProfileStore(Request $request){
		$id = Auth::user()->id;
		$request->validate([
            'name'  => 'unique:users,name,' . $id,
			'email'  => 'unique:users,email,' . $id,
			'phone'  => 'unique:users,phone,' . $id,
    	]); 
		$data = User::find($id); 
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;
		$data->company_name = $request->company_name;


		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/admin_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

        $notification = array(
			'message' => 'Admin Profile Updated Successfully',
			'alert-type' => 'success'
		);


        return redirect()->route('dashboard')->with($notification);
        // return redirect()->back()->with($notification);
        // return redirect()->route('admin.profile');
    }
    public function AdminChangePassword(){

		return view('admin.admin_change_password');

	}

    public function AdminUpdateChangePassword(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		// $hashedPassword = Auth::user()->password;
		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			// $admin = Admin::find(Auth::id());
			$admin = User::find(Auth::id());
			$admin->password = Hash::make($request->password);
			$admin->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}


	}// end method

	// public function AllUsers(){
	// 	$users = User::latest()->get();
	// 	return view('backend.user.all_user',compact('users'));
	// }


}
