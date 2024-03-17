<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login',[
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function register(Request $request){
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = bcrypt($request->password);
        $user->role=1;
        $user->save();
        $this->Authenticate( $request);

if (Auth::attempt(['email' => $request->email,'password' => $request->password ])) {
    return Redirect()->route('admin');
}

    }

    public function Authenticate(Request $request){
        // dd($request->input());
        // $this->validate($request,[
        //     'email'=> 'required|email:filter',
        //     'password'=> 'required'
        // ]);


        if (Auth::attempt(['email' => $request->email,'password' => $request->password ])){
            return Redirect()->route('admin');
        }
        // echo("sai");
        // Session::flash('error', "Email hoặc password không đúng vui lòng nhập lại");
        return Redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return Redirect()->route('login');
    }
    //
}
