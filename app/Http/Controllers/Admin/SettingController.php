<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.settings",[
            "active"=>1
        ]);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required',
            "image"=>'required',
        ]);

        
        // get form images
        $image = $request->file('image');
        $slug = Str::slug($request->product_name);
        $user = User::findOrFail(Auth::user()->id);

        if(isset($image)){
        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
        // check user directory is exists
        if(!Storage::disk('public')->exists('profile')){
            Storage::disk('public')->makeDirectory('profile');
        }

        // delete old image
        if(Storage::disk('public')->exists('profile/'.$user->image)){
            Storage::disk('public')->delete('profile/'.$user->image);
        }
        // resize image for user and is_uploaded_file
        $profile = Image::make($image)->resize(500,500)->stream();
        Storage::disk('public')->put('profile/'.$imageName,$profile);

        }else{
            $imageName=$user->image;
        }

        $user->name = $request->name;
        $user->email =$request->email;
        $user->save();

        Toastr::success('User Updated Successfully','Success');

        return redirect('admin/dashboard');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed:password_confirmation'
        ]);

        $hasedPassword = Auth::user()->password;

       
        if(Hash::check($request->old_password,$hasedPassword)){
            if(!Hash::check($request->password,$hasedPassword)){
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();

                Toastr::success('Password Updated Successfully','Success');
                Auth::logout();
            }else{
                Toastr::error('New Password Can not be Same as Old Password','Error');
            }
        }else{
            Toastr::error('Current Password Not Match','Error');
        }
        //redirect()->route( 'clients.show' )->with( [ 'id' => $id ] )
        return redirect()->to('admin/setting')->with([
            "active"=>2
        ]);
    }

}
