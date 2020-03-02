<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CheckoutRequest;
use App\Services\TransactionServices;

class CheckoutController extends Controller
{
    protected $services;

    public function __construct(TransactionServices $services)
    {
        $this->services = $services;
    }

    public function checkout(CheckoutRequest $checkoutRequest)
    {
        return $this->services->checkout($checkoutRequest);
    }
}
