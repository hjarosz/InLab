<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();

        $allTags = Tag::all();
     
        return view('home.dashboard', ['items' => $items, 'allTags' => $allTags]);
        // if(Auth::user()->hasRole('user')){
        //     return view('userdashboard');
        // } elseif(Auth::user()->hasRole('admin')){
        //     return view('admindashboard');
        // }
    }

    public function manageusers()
    {
        $users = User::all();

        return view('home.manageusers', ['users' => $users]);
    } 

    public function managetags()
    {
        $tags = Tag::all();

        return view('home.managetags', ['tags' => $tags]);
    }     

}
