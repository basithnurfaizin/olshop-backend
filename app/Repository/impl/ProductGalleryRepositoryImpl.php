<?php


namespace App\Repository\impl;


use App\Model\ProductGallery;
use App\Repository\ProductGalleryRepository;

class ProductGalleryRepositoryImpl implements ProductGalleryRepository
{

    protected $model;

    public function __construct(ProductGallery $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('product')->whereHas('product')->get();
    }

    public function save($data)
    {
        return $this->model::create($data);
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update($model, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $productGallery = $this->find($id);

        return $productGallery->delete();
    }

    public function findByProduct($product)
    {
       return $this->model->with('product')->where('product_id', $product)->get();
    }
}
