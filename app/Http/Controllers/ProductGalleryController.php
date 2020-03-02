<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Services\ProductGalleryServices;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{

    protected $services;

    protected $productService;

    public function __construct(ProductGalleryServices $services, ProductServices $productService)
    {
        $this->services = $services;
        $this->productService = $productService;
        $this->middleware('auth');
    }

    public function index()
    {
        $productGalleries = $this->services->getAll();

        return view('pages.productGalleries.index', compact('productGalleries'));
    }


    public function create()
    {
        $products = $this->productService->getAll();

        return view('pages.productGalleries.create', compact('products'));
    }


    public function store(ProductGalleryRequest $request)
    {
        $this->services->create($request);

        return redirect()->route('product-gallery.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $this->services->delete($id);

        return redirect()->route('product-gallery.index');
    }
}
