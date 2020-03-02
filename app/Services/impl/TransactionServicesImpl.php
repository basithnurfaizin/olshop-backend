<?php


namespace App\Services\impl;

use App\Http\Controllers\Api\ResponseFormatter;
use App\Repository\ProductRepository;
use App\Repository\TransactionDetailRepository;
use App\Repository\TransactionRepository;
use App\Services\TransactionServices;

class TransactionServicesImpl implements TransactionServices
{
    protected $repository;
    protected $transactionDetailRepository;
    protected $productRepository;

    public function __construct(TransactionRepository $repository,
                                TransactionDetailRepository $transactionDetailRepository,
                                ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->transactionDetailRepository = $transactionDetailRepository;
        $this->productRepository = $productRepository;

    }

    public function checkout($data)
    {
        $item = $data->except('transaction_details');
        $item['uuid'] = 'TRX' . mt_rand(1000, 9000) .mt_rand(100,900);

        $transaction = $this->repository->save($item);

        foreach ($data->transaction_details as $product)
        {
            $details[] = $this->transactionDetailRepository->save([
               'transaction_id' => $transaction->id,
                'product_id' => $product
            ]);

            $this->productRepository->decrement($product);

        }

        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction, 200);
    }

}
