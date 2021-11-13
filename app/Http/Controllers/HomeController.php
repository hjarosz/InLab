<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        
        return view('home.dashboard', ['items' => $items]);
        // if(Auth::user()->hasRole('user')){
        //     return view('userdashboard');
        // } elseif(Auth::user()->hasRole('admin')){
        //     return view('admindashboard');
        // }
    }

    public function manageusers()
    {
        return view('home.manageusers');
    } 
}
