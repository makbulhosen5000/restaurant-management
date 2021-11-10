<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    protected $fillable = [
        'name','phone', 'email', 'address','image',
    ];
}
