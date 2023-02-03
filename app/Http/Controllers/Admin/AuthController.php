<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'password' => 'required|string|min:6',
            ]);
//            dd($request->all());
            $credentials = $request->only('name', 'password');
            $checkLogin = Http::asForm()->post('http://localhost/laravel-project/public/api/auth/login', $credentials);
//            dd(json_decode($checkLogin));
            if(json_decode($checkLogin)){
                return redirect(url('backend/dashboard'));
            }

        }

        return view('admin.users.login');
    }

    public function logout(){
        Http::asForm()->withHeaders()->post('http://localhost/laravel-project/public/api/auth/login');
        return redirect(url('user/login'));
    }
    public function test(){
        return response()->json('Chua login');
    }


}
