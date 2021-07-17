<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('guest')->except('dashboard', 'logout');
    }
    //show the index page
    public function show_login(){
        return view('users.login');
    }

    public function login(Request $request){

        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $info = $request->all();

        $credentials = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::attempt(array($credentials=>$info['username'], 'password'=>$info['password'], 'is_admin'=>1))){
            return redirect()->intended('dashboard')->with('success', 'logged in successfully');
        }

        return redirect()->route('show.login')->with('error', 'Error, login details are incorrect');
    }

    public function show_register()
    {
        return view('users.register');
    }

    public function register(Request $request){
        $request->validate([
            'username'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);

        $user_data = $request->all();
        $this->create($user_data);

        return redirect()->route('show.login')->with('success', 'registered successfully, you can now login');
    }

    public function create(array $data){
        return User::create([
            'username'=>$data['username'],
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);
    }

    public function dashboard(){
        if(Auth::check()){
            //get count drinks
            $drinks = Drink::count();
            //get count orders
            $orders = Order::count();

            //get the latest orders
            $latest_orders  = Order::orderBy('created_at', 'desc')->take(8)->get();

            //get the recently added products
            $recent_drinks  = Drink::orderBy('created_at', 'desc')->take(5)->get();

            //get users
            $users = User::count();

            //admins
            $admin = User::where('is_admin', true)->count();

            return view('dashboard.admin', compact('latest_orders', 'recent_drinks'))->
            with('drinks', $drinks)->with('orders', $orders)->with('users', $users)->with('admins', $admin);
        }

        return redirect()->route('show.login')->with('error', 'Error, Access denied');
    }

    public function logout(Request $request){

        Auth::logout();
        Session::flush();

        $request->session()->invalidate();

        return redirect()->route('show.login')->with('success', 'Logged out successfully');
    }
}
