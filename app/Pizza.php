<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use SoftDeletes;
    
    protected $table = 'pizzas';
    protected $fillable = ['name', 'desc', 'price', 'img_loc'];
}
