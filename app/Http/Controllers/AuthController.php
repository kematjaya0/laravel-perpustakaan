<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Description of LoginController
 *
 * @author apple
 */
class AuthController extends Controller 
{
    public function login(Request $request)
    {
        if (Request::METHOD_POST == $request->getMethod()) {
            $credentials = $request->validate([
                "email" => ["required", "email"],
                "password" => ["required"]
            ]);            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                return redirect()->intended('dashboard');
            }
 
            return back()->withErrors([
                'email' => 'coba cek kembali email dan password anda.',
            ]);
        }
        
        return view('login');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('app_login');
    }
}
