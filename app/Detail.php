<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table='details';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'count',
        'price',
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'invoice_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

}
