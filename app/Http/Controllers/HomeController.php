<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        
        //return view('welcome');
        if(Auth::user()->hasRole('user')){
            return view('userdashboard');
        } elseif(Auth::user()->hasRole('admin')){
            return view('admindashboard');
        }
    }

    public function manageusers()
    {
        return view('manageusers');
    }

    public function manageinventory()
    {
        return view('manageinventory');
    }

   
}
