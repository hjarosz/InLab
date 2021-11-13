<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    public function index()
    {       
        if(Auth::check()){
            $items = Item::all();

            return view('item.index', [
                'items' => $items
            ]);
        }      
    }

    public function create(){
        if(Auth::user()->hasRole('admin'))
            return view('item.create');
    }

       
}
