<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductGalleryServices;
use App\Services\ProductServices;

class ProductController extends Controller
{
    protected $services;

    protected $productGalleryServices;

    public function __construct(ProductServices $services, ProductGalleryServices $productGalleryServices)
    {
        $this->services = $services;
        $this->productGalleryServices = $productGalleryServices;
        $this->middleware('auth');
    }

    public function index()
    {
        $product = $this->services->getAll();

        return view('pages.product.index', compact('product'));
    }

    public function create()
    {
        return view('pages.product.create');
    }

    public function store(ProductRequest $request)
    {
        $this->services->create($request);

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = $this->services->getById($id);

        return view('pages.product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->services->getById($id);

        return view('pages.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->services->update($request, $id);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->services->delete($id);

        return redirect()->route('product.index');
    }

    public function galleries($id)
    {
        $product =  $this->services->getById($id);

        $productGallery =  $this->productGalleryServices->getByProduct($id);

        return view('pages.product.gallery', compact('product', 'productGallery'));

    }
}
