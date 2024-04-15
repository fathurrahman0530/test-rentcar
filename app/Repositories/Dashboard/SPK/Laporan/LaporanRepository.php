<?php

namespace App\Repositories\Dashboard\SPK\Laporan;

interface LaporanRepository
{
    // get data
    public function getAll();
    public function get($uuid);
    public function getDetail($uuid);
    // end get data

    // store data
    public function store($data);
    public function storeTransaction($data);
    // end store data

    // update data
    public function update($key, $uuid, $data);
    // end update data

    // destroy data
    public function destroy($key, $uuid);
    public function destroyUser($key, $uuid);
    // end destroy data
}
