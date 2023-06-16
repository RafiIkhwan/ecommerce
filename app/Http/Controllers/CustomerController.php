<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function logincus()
    {
        if(Auth::guard('customer')->check()){
            return redirect('/')->with('success', 'Selamat datang kembali customer');
        }else{
            return view('login', [
                'login'     => array(    
                    'email' => 'text', 
                    'password' => 'password'
                ),
                'register',
                'status'   => 'login',
                'title'    => 'Login',
                'action'    => '/login/customer',
            ]);
        }
    }

    public function cuscheck(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('customer')->attempt($data)){
            return redirect('/')->with('success', 'Selamat datang kembali customer');
        }else{
            return view('login', [
                'login'     => array(    
                    'email' => 'text', 
                    'password' => 'password'
                ),
                'register',
                'status'   => 'login',
                'title'    => 'Login',
                'action'    => '/login/customer',
            ]);
        }
    }
    
    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect('/')->with('success', 'Berhasil');
    }
    
}