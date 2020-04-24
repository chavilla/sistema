<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table='invoices';
    protected $fillable = [
        'date',
        'user_id',
        'client_id',
        'total',
    ];

    public function details()
    {
        return $this->hasMany('App\Detail');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Cliente', 'client_id');
    }

}
