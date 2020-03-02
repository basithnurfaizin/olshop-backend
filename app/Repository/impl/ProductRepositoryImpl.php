<?php


namespace App\Repository\impl;

use App\Model\Product;
use App\Repository\ProductRepository;

class ProductRepositoryImpl implements ProductRepository
{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model::with('galleries')->get();
    }

    public function save($data)
    {
        return $this->model::create($data);
    }

    public function find($id)
    {
        return $this->model::with('galleries')->findOrFail($id);
    }

    public function update($model, $id)
    {
        $product = $this->find($id);

        return $product->update($model);
    }

    public function delete($id)
    {
        $product = $this->find($id);

        return $product->delete();
    }


    public function findByName($name, $paginate)
    {
        return $this->model
            ->with('galleries')->where('name', 'like', '%'.$name.'%')->paginate($paginate);
    }

    public function findBySlug($slug, $paginate)
    {
        return $this->model
            ->with('galleries')->where('slug', 'like', '%'.$slug.'%')->get();
    }

    public function findByPriceFrom($price, $paginate)
    {
        return $this->model->with('galleries')->where('price', '<=', $price)->paginate($paginate);
    }

    public function findByPriceTo($price, $paginate)
    {
        return $this->model->with('galleries')->where('price', '<=', $price)->paginate($paginate);
    }

    public function decrement($id)
    {
       return $this->model->find($id)->decrement('quantity');
    }
}
