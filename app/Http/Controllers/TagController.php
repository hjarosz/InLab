<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {       
        if(Auth::check()){
            $tags = Tag::all();

            return view('tag.index', [
                'tags' => $tags
            ]);
        }      
    }

    public function create(){
        if(Auth::user()->hasRole('admin'))
            return view('tag.create');
    }

    public function edit(Tag $tag){

        return view('tag.edit', compact('tag'));
    }


    public function store(){
        $data = request()->validate([
             'Name' => 'required|max:255|unique:tags'
         ]);

         Tag::create([
             'Name' => $data['Name'],      
         ]);
 
         return redirect('dashboard/managetags');
     }  

     public function update(Tag $tag){

        $data = request()->validate([
             'Name' => 'required|max:255|unique:tags',
         ]);

        $tag->update([
             'name' => $data['Name'],
         ]);
        
        return redirect('dashboard/managetags');
    }

     
     public function delete(Tag $tag){
        
        $tag->delete();

        return redirect('dashboard/managetags');
    }
     


}
