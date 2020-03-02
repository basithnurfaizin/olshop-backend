<?php


namespace App\Repository\impl;


use App\Model\Transaction;
use App\Repository\TransactionRepository;

class TransactionRepositoryImpl implements TransactionRepository
{
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model::all();
    }

    public function save($data)
    {
        return$this->model::create($data);
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function saveDetails($data)
    {
        return $this->model->details()->saveMany($data);
    }
}
