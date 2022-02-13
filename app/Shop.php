<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable=  [
        'shop_id','name','number','area','category','rate'
    ];
    protected $table ='shop';
    protected $primaryKey = "shop_id";


}
