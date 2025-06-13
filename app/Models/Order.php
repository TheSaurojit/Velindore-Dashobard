<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    public function product()
    {

        return $this->belongsTo(Product::class);
    }
}
