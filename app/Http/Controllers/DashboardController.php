<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

/**
 * Description of DashboardController
 *
 * @author apple
 */
class DashboardController extends AbstractController 
{
    public function index()
    {
        return view('dashboard');
    }
}
