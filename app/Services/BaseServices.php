<?php


namespace App\Services;


interface BaseServices
{

    public function getAll();

    public function create($data);

    public function getById($id);

    public function update($data, $id);

    public function delete($id);

}
