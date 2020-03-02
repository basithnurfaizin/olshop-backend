<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';

    protected $fillable = ['name', 'type', 'description', 'price', 'slug', 'quantity'];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
