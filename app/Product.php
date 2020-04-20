<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Indica la tabla del modelo
    protected $table='products';

    // Relación one to may con tabla categorías
    /* public function categories(){
        return $this->hasMany('App\Category');
    } */

    public function categories()
    {
        return $this->belongsTo('App\Category','category_id');
    }


    //Relation many to one
    public function user(){
            return $this->belongsTo('App\User', 'user_id');
    }

    //Relation many to one
    public function entry()
    {
        return $this->hasMany('App\Entry');
    }

}
