<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
     //Indica la tabla del modelo
     protected $table='entries';

    protected $fillable = [
        'product_id', 'count', 'cost','user_id',
    ];

     // Relación one to may con tabla categorías
     public function product(){
         return $this->belongsTo('App\Product', 'product_id');
     }

     public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
