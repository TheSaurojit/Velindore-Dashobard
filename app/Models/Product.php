<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'name', 'description', 'price', 'quantity',  'three_d_image', 'status', 'label_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function label()
    {
        return $this->belongsTo(Label::class);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function singleImage()
    {
        return $this->hasOne(ProductImage::class);
    }
}
