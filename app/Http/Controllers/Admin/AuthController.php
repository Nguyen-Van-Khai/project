<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request){
        if(session()->has('expires_in') && (time() - session()->get('expires_in') > 3600)){
            session()->flush();
            return redirect(url('user/login'))->with('error', 'Het phien dang nhap');
        }

        if($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'password' => 'required|string|min:6',
            ]);
            $credentials = $request->only('name', 'password');
            $checkLogin = Http::asForm()->post('http://localhost/laravel-project/public/api/auth/login', $credentials);
            $info = json_decode($checkLogin);
            if (!empty($info->access_token)) {
                session()->put('access_token', $info->access_token);
                session()->put('expires_in', time());
            }

            if(session()->has('access_token') && !empty(session()->get('access_token'))){
                return redirect(url('backend/dashboard'));
            }else{
                return redirect(url('user/login'))->with('error', 'Sai tai khoan mat khau');
            }
        }
        return view('admin.users.login');
    }

    public function logout(){
        $accessToken = session()->get('access_token');
        $checkLogout = Http::withToken($accessToken)->post('http://localhost/laravel-project/public/api/auth/logout');
        session()->flush();
        return redirect(url('user/login'))->with('success', 'Logout success!');
    }
}
