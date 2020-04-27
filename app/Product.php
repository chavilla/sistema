<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Product extends Model
{
    //Indica la tabla del modelo
    protected $table='products';

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'stock',
        'priceTotal',
        'tax',
        'inventory',
        'description',
        'reference',
        'user_id',
    ];

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

    public function detail(){
        return $this->hasMany('App\Detail');
    }

}
