<?php


namespace App\Services;


interface ProductGalleryServices extends BaseServices
{
    public function getByProduct($product);
}
