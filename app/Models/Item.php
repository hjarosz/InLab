<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'items';
    protected $primaryKey = 'id';
    // protected $timestamps = true;
    

    public function users(){
        return $this->belongsToMany(Item::class, 'user_item', 'item_id', 'user_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'item_tag', 'item_id', 'tag_id');
    }  

}
