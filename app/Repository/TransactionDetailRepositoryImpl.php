<?php


namespace App\Repository;


use App\Model\TransactionDetail;

class TransactionDetailRepositoryImpl implements TransactionDetailRepository
{
    protected $model;

    public function __construct(TransactionDetail $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function save($data)
    {
        return $this->model->create($data);
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
}
