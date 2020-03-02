<?php


namespace App\Repository;


interface BaseRepository
{
    public function all();

    public function save($data);

    public function find($id);

    public function update($data, $id);

    public function delete($id);
}
