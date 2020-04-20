<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
     //Indica la tabla del modelo
     protected $table='entries';

     // Relación one to may con tabla categorías
     public function products(){
         return $this->belongsTo('App\Product', 'product_id');
     }

     public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
