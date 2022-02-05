<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * Description of LoginController
 *
 * @author apple
 */
class LoginController extends Controller 
{
    public function login()
    {
        return view('login');
    }
}
