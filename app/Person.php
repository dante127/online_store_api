<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'id','firstname','lastname','address','phone','username','password',
    ];

    protected $table = "users";

}
