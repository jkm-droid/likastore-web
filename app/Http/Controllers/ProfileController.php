<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deactivate_profile($admin_id){
        $admin = User::find($admin_id);
        if ($admin->is_admin == 1){
            DB::table('users')->where('id',$admin_id)->update(['is_admin'=>0]);

            return redirect()->route('profile.index')->with('success', 'Deactivated successfully');
        }elseif ($admin->is_admin == 0){
            DB::table('users')->where('id',$admin_id)->update(['is_admin'=>1]);
        }

        return redirect()->route('profile.index')->with('success', 'Activated successfully');
    }
    public function get_user_details(){
        $users = User::get();
//        dd($users);
        return view('profile.index', compact('users'));
    }

    public function view_profile($admin_id){
        $user = User::find($admin_id);

        return view('profile.view_profile')->with('user', $user);
    }

    public function edit_profile($admin_id){
        $user = User::find($admin_id);

        return view('profile.edit_profile')->with('user', $user);
    }

    public function update_profile(Request $request, $admin_id){
        $request->validate([
            'name'=>'required',
            'username'=>'required'
        ]);

        $user_info = $request->all();
        $user = User::find($admin_id);

        if ($request->hasFile('profile_picture')){
            $imageName = str_replace(' ', '_',$user_info['name']).'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $imageName);
            File::delete($user->profile_url);

            $user_info['profile_url'] = $imageName;
            $user->profile_url = $imageName;
        }
        unset($user_info['profile_picture']);

        $user->name = $user_info['name'];
        $user->username = $user_info['username'];
        $user->update($user_info);

        return redirect()->route('profile.view', $admin_id)->with('success', 'Profile update successfully');
    }

    public function delete_profile($admin_id){
        $user = User::find($admin_id);
        $user->delete();
        return redirect()->route('profile.index')->with('success', 'Deleted Successfully');
    }
}
