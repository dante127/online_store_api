<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=  [
        'order_id','item_id','user_id','isConfirmed'
    ];
    protected $table ='orders';
    protected $primaryKey = "order_id";

}
