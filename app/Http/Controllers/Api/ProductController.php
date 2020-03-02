<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $services;

    public function __construct(ProductServices $services)
    {
        $this->services = $services;
    }

    public function all(Request $request)
    {
        return $this->services->all($request);
    }

}
