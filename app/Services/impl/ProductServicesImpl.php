<?php


namespace App\Services\impl;


use App\Http\Controllers\Api\ResponseFormatter;
use App\Repository\ProductRepository;
use App\Services\ProductServices;
use Illuminate\Support\Str;

class ProductServicesImpl implements ProductServices
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create($data)
    {
        $data['slug'] = Str::slug($data->name);

        return $this->repository->save($data->all());
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function update($data, $id)
    {
        $data['slug'] = Str::slug($data->name);

        return $this->repository->update($data->all(), $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function all($data)
    {
        $id = $data->input('id');
        $limit = $data->input('limit', 0);
        $name = $data->input('name');
        $slug = $data->input('slug');
        $priceFrom = $data->input('price_from');
        $priceTo = $data->input('price_to');

        if($id){
            $product = $this->repository->find($id);
            //dd($product);
            if($product)
                return ResponseFormatter::success($product, '200');
            else
                return ResponseFormatter::error(null, '404');
        }

        if($slug){
            $product = $this->repository->findBySlug($slug, $limit);
            if($product)
                return ResponseFormatter::success($product, '200');
            else
                return ResponseFormatter::error(null, '404');
        }

        if($name){
            $product = $this->repository->findByName($name, $limit);
            if($product)
                return ResponseFormatter::success($product, '200');
            else
                return ResponseFormatter::error(null, '404');
        }

        if($priceFrom){
            $product = $this->repository->findByPriceFrom($priceFrom, $limit);
            if($product)
                return ResponseFormatter::success($product, '200');
            else
                return ResponseFormatter::error(null, '404');
        }

        $product = $this->repository->all();
        if($product)
            return ResponseFormatter::success($product, '200');
        else
            return ResponseFormatter::error(null, '404');

    }
}
