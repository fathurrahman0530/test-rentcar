<?php

namespace App\Repositories\Dashboard\SPK\Penyewaan;

interface PenyewaanRepository
{
    // get data
    public function getAll();
    public function get($uuid);
    public function getDetail($uuid);
    public function getMobil();
    public function getPelanggan();
    public function getDriver();
    public function getPenyewa($uuid);
    public function getLastNoSPK();
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
