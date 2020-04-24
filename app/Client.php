<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'direction',
    ];

    public function invoices(){
        return $this->hasMany('App\Invoice');
    }

}
