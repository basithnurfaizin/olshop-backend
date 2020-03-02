<?php


namespace App\Repository;


interface ProductRepository extends BaseRepository
{
    public function findByName($name, $paginate);

    public function findBySlug($slug, $paginate);

    public function findByPriceFrom($price, $paginate);

    public function findByPriceTo($price, $paginate);

    public function decrement($id);

}
