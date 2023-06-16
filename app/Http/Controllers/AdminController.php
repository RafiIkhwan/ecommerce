<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function loginadm()
    {
        if(Auth::guard('admin')->check()){
            return redirect('admin')->with('success', 'Selamat datang kembali admin');
        }else{
            return view('login', [
                'login'     => array(    
                    'email' => 'text', 
                    'password' => 'password'
                ),
                'register',
                'status'   => 'login',
                'title'    => 'Login Admin',
                'action'    => '/login/admin',
            ]);
        }
    }

    public function admcheck(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('admin')->attempt($data)){
            return redirect('admin')->with('success', 'Selamat datang kembali admin');
        }else{
            return view('login', [
                'login'     => array(    
                    'email' => 'text', 
                    'password' => 'password'
                ),
                'register',
                'status'   => 'login',
                'title'    => 'Login Admin',
                'action'    => '/login/admin',
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/')->with('success', 'Berhasil logout admin');
    }

    public function dashboard()
    {
        return view('admin',[
            'no'        => 1,
            'produk'    => Produk::paginate(5),
        ]);
    }
}
