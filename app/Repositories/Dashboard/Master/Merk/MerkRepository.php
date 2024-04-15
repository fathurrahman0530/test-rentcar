<?php

namespace App\Repositories\Dashboard\Master\Merk;

interface MerkRepository
{
    // get data
    public function getAll();
    public function get($key, $uuid);
    public function getEdit($key, $uuid);
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
