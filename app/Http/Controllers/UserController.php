<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\NewsLetter;
use App\Models\Order;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
        $remember_me = $request->has('remember_me');

        $credentials = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::attempt(array($credentials=>$info['username'], 'password'=>$info['password'], 'is_admin'=>1), $remember_me)){
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

    public function logout(Request $request){

        Auth::logout();
        Session::flush();

        $request->session()->invalidate();

        return redirect()->route('show.login')->with('success', 'Logged out successfully');
    }

    public function show_forgot_pass_form(){
        return view('users.forgot_pass');
    }

    public function submit_forgot_pass_form(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
        ]);

        //generate token
        $token = Str::random(65);
        DB::table('password_resets')->insert([
            'email'=>trim($request->email),
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);

        Mail::send('mail.forgot_pass', ['token'=>$token], function ($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return redirect()->route('user.forgot_pass')->with('success', 'We have emailed an email reset link to '.$request->email);
    }

    public function show_reset_pass_form($token){
        return view('users.reset_pass', ['token'=>$token]);
    }

    public function reset_pass(Request $request){
        $request->validate([
            'email'=>'email|exists:users',
            'password'=>'required|string|min:6|same:password_confirm',
            'password_confirm'=>'required'
        ]);

        $info = $request->all();
        $email = trim($info['email']);
        $password = trim($info['password']);
        $token = $request->token;

        $new_password = DB::table('password_resets')->where([
            'email'=>$email,
            'token'=>$token
        ])->first();

        if (!$new_password){
            return back()->withInput()->with('error','Invalid token');
        }

        $user = User::where('email', $email)->update(['password'=>Hash::make($password)]);
        DB::table('password_resets')->where(['email'=>$email])->delete();

        return redirect()->route('show.login')->with('success', 'Password changed successfully, Login');
    }

    public function subscribe_to_newsletter(Request $request){
        $request->validate([
            'email'=>'required|email|unique:news_letters'
        ]);
        $email =  trim($request->email);
        $newsLetter = new NewsLetter();
        $newsLetter->email = $email;
        $newsLetter->ip_address = $request->getClientIp();
        $newsLetter->created_at = Carbon::now();

        $newsLetter->save();

        return redirect()->route('welcome')->with('success', 'Subscribed successfully');

    }
}
