<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $table = 'product_galleries';

    protected $fillable = ['product_id', 'photos', 'is_default'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function getPhotosAttribute($value)
    {
        return url('storage/', $value);
    }
}
