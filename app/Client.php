<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $fillable = [
        'nit',
        'name',
        'phone',
        'email',
    ];

    public function invoices(){
        return $this->hasMany('App\Invoice');
    }

}
