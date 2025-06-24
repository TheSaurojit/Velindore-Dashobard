<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'product_id',

        'user_email',
        'user_name',
        'user_phone',

        'shipping_street_address',
        'shipping_city',
        'shipping_state_province',
        'shipping_postal_code',
        'shipping_country',

        'quantity',
        'price',
        'total_price',
        'status',

        'payment_status',

        
        'ordered_at',
        // 'shipped_at',
        // 'delivered_at',
        // 'cancelled_at',

        'created_at',
        'updated_at',
    ];

    public function product()
    {

        return $this->belongsTo(Product::class);
    }
}
