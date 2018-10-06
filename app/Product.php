<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'price'
    ];

    protected $table = 'products';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
