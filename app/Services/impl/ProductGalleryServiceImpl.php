<?php


namespace App\Services\impl;


use App\Repository\ProductGalleryRepository;
use App\Services\ProductGalleryServices;

class ProductGalleryServiceImpl implements ProductGalleryServices
{

    protected $repository;

    public function __construct(ProductGalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create($data)
    {
        $data['photos'] = $data->file('photos')->store(
            'assets/product' , 'public'
        );


        return $this->repository->save($data->all());
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function getByProduct($product)
    {
        return $this->repository->findByProduct($product);
    }
}
