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
        $allTags = Tag::all();

        $currentTags = session('currentTags');

        if(is_null($currentTags) or empty($currentTags))
            $items = Item::all();
        else
            $items = Item::whereHas('tags', function($q) use ($currentTags){
                $q->whereIn('id', $currentTags);
            })->get();

        return view('home.dashboard', ['items' => $items, 'allTags' => $allTags, 'currentTags' => $currentTags]);
    }

    public function filter(Tag $tag){

        $currentTags = session()->get('currentTags');

        if(is_null($currentTags) or empty($currentTags))
            $currentTags = array($tag->id);
        else if (!in_array($tag->id,$currentTags))
            array_push($currentTags, $tag->id);
        else
            if(($key = array_search($tag->id, $currentTags)) !== false) {
                unset($currentTags[$key]);
            }
        
        session()->put('currentTags', $currentTags);    

        return redirect('dashboard');    
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
    
    public function report(){

       $items = Item::all();
       $users = User::all();

        return view('home.report', compact('items','users'));
    }

}
