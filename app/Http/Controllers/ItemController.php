<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
        $tags = Tag::all();

        if(Auth::user()->hasRole('admin'))
            return view('item.create', compact('tags'));
    }

    public function store(){
       $data = request()->validate([
            'Name' => 'required|max:255',
            'Model' => 'required|max:255',
            'Image' => 'image|required',
            'Description' => 'required',
            'URL' => 'URL|required',
            'Quantity' => 'required|min:1',
        ]);

        
        $imagePath = "storage/" . request('Image')->store('uploads', 'public');

        $image = Image::make(public_path($imagePath))->resize(300,300);
        $image->save();

        $item = Item::create([
            'Name' => $data['Name'],
            'Model' => $data['Model'],
            'Image' => $imagePath,
            'Description' => $data['Description'],
            'URL' => $data['URL'],
            'Quantity' => $data['Quantity'],           
        ]);

        $tags = request()->input('tags');

        $item->tags()->sync($tags);        

        return redirect('dashboard');
    }

    public function edit(Item $item){

        $tags = Tag::all();
        if(Auth::user()->hasRole('admin'))
            return view('item.edit', compact('item','tags'));
    }

    public function update(Item $item){
        $data = request()->validate([
             'Name' => 'required|max:255',
             'Model' => 'required|max:255',
             'Image' => 'image|nullable',
             'Description' => 'required',
             'URL' => 'URL|required',
             'Quantity' => 'required|min:1',
         ]);

        $imagePath = $item->image;
 
         if(request('Image')){
            $imagePath = "storage/" . request('Image')->store('uploads', 'public');

            $image = Image::make(public_path($imagePath))->resize(300,300);
            $image->save();
        }

         $item->update(
             array_merge(
                 $data,
                 ['Image' => $imagePath]
             )
         );   

        $tags = request()->input('tags');

        $item->tags()->sync($tags);

        return redirect('dashboard');
     }

     public function rent(Item $item){
         
        Auth::user()->items()->attach($item);
        return redirect('dashboard');
     }

     public function return(Item $item){
        Auth::user()->items()->detach($item);
        return redirect('dashboard');
    } 
    
    public function delete(Item $item){
        
        $item->delete();

        return redirect('dashboard');
    }


       
}
