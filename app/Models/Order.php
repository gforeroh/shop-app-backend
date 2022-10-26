<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_order',
        'client',
        'document'
    ];

    public function Product()
    {
        return $this->belongsToMany('App\models\Product', 'App\models\OrderProduct', 'order_id', 'product_id' )->withPivot('quantity');
    }

}
