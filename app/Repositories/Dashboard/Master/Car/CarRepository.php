<?php

namespace App\Repositories\Dashboard\Master\Car;

interface CarRepository
{
    // get data
    public function getAll();
    public function get($uuid);
    public function getLimit();
    public function getList();
    public function getDetail($uuid);
    // end get data

    // store data
    public function store($data);
    // end store data

    // update data
    public function update($key, $uuid, $data);
    // end update data

    // destroy data
    public function destroy($key, $uuid);
    // end destroy data
}
