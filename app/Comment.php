<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{	

    protected $fillable=  [
        'id','item_id','user_id','date','comment'
    ];
    protected $table ='comments';
    protected $primaryKey = "id";



}
