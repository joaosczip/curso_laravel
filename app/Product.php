<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'price',
        'brand_id',
    ];

    protected $with = ['brand', 'categories'];

    protected $table = 'products';

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
    ];

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getPriceAttribute($value)
    {
        return "R$ $value";
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
