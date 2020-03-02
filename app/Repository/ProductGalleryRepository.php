<?php


namespace App\Repository;


interface ProductGalleryRepository extends BaseRepository
{
    public function findByProduct($product);
}
