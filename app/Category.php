<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

     //Relation many to one
     public function product()
     {
         return $this->belongsTo('App\Product', 'idProduct');
     }

     public function products()
     {
         return $this->hasMany('App\Product');
     }
}
