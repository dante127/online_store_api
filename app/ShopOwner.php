<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopOwner extends Model
{
    protected $fillable=  [
        'mobile','first_name','last_name','user_name','password','shop_id'
    ];
    protected $table ='shop_owner';
    protected $primaryKey = "mobile";
    
}






