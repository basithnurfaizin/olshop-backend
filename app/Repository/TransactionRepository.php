<?php


namespace App\Repository;


interface TransactionRepository extends BaseRepository
{
    public function saveDetails($data);
}
