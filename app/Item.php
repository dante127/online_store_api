<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=  [
        'item_id','name','pictures','price','rate','feedback','description','shop_id','image_url'
    ];
    protected $table ='item';
    protected $primaryKey = "item_id";
    
}
