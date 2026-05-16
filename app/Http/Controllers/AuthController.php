<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function welcomePage(){
        return view('loginPage');
    }

    public function userLogin(Request $req) {
        $this->validate($req, [
            'user_name_or_phone' => 'required',
            'password' => 'required',
        ]);

        $user_name_or_phone = $req['user_name_or_phone'];
        $password = $req['password'];
        $remember = $req['remember'];

        if(User::where(function($query) use ($user_name_or_phone) {
           $query->where('user_name', $user_name_or_phone)->orWhere('contact', $user_name_or_phone);
        })->where('email_verified_at', null)->exists()) {
            $notification = array(
                'message' => trans('messages.email_not_verify'),
                'alert-type' => 'error'
            );
            return response()->json(["message" => $notification], 406);
        }

        if(Auth::attempt(['user_name' => $user_name_or_phone, 'password' => $password], $remember) || 
        Auth::attempt(['contact' => $user_name_or_phone, 'password' => $password], $remember)){
            $notification = array(
                'message' => trans('messages.login_success', ['email' => $user_name_or_phone]),
                'alert-type' => 'success'
            );
            return response()->json(['response' => $notification], 200);
        }

        else {
            $notification = array(
                'message' => trans('messages.login_fail', ['email' => $user_name_or_phone]),
                'alert-type' => 'error'
            );
            // session()->flash('error', 'error');
            return response()->json(["message" => $notification], 406);
        }
    }

    public function login(Request $req){
        $this->validate($req, [
            'user_name' => 'required',
            'password' => 'required',
        ]);

        $email = $req['user_name'];
        $password = $req['password'];
        $remember = $req['remember'];

        //all admins using email
        if(Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)){
            $notification = array(
                'message' => trans('messages.login_success', ['email' => $email]),
                'alert-type' => 'success'
            );
            return redirect()->route('admin.home')->with($notification);
        }
        //all admins using user name
        else if(Auth::guard('admin')->attempt(['user_name' => $email, 'password' => $password], $remember)){
            $notification = array(
                'message' => trans('messages.login_success', ['email' => $email]),
                'alert-type' => 'success'
            );
            return redirect()->route('admin.home')->with($notification);
        }

        //all teachers
        else if(Auth::guard('teacher')->attempt(['email' => $email, 'password' => $password], $remember)){
            $notification = array(
                'message' => trans('messages.login_success', ['email' => $email]),
                'alert-type' => 'success'
            );
            return redirect()->route('teacher.home')->with($notification);
        }

        //all student
        else if(Auth::guard('student')->attempt(['school_id' => $email, 'password' => $password, 'suspended' => 0, 'dismissed' => 0], $remember)){

            $notification = array('message' => trans('messages.login_success_user'), 'alert-type' => 'success');
            return redirect()->route('student.home')->with($notification);
        }
        else {
            $notification = array(
                'message' => trans('messages.login_fail', ['email' => $email]),
                'alert-type' => 'error'
            );
            session()->flash('error', 'error');
            return redirect()->back()->withInput()->with($notification);
        }
    }

    public function adminLogout(){
        $notification = array(
            'message' => trans('messages.logout_messages'),
            'alert-type' => 'info'
        );
        session()->flash('error', 'error');
        Auth::guard('admin')->logout();
        return redirect('/')->with($notification);
    }

    public function studentLogout(){
        $notification = array(
            'message' => trans('messages.logout_messages'),
            'alert-type' => 'info'
        );
        Auth::guard('student')->logout();
        return redirect('/')->with($notification);
    }
    public function teacherLogout(){
        $notification = array(
            'message' => trans('messages.logout_messages'),
            'alert-type' => 'info'
        );
        Auth::guard('teacher')->logout();
        return redirect('/')->with($notification);
    }

    public function userLogout(){
        $notification = array(
            'message' => trans('messages.logout_messages'),
            'alert-type' => 'info'
        );
        Auth::logout();
        return redirect('/')->with($notification);
    }
}
