<?php

namespace App\Repositories\Pemesanan;

interface PemesananRepository
{
    // get data
    public function getAll();
    // end get data

    // store data
    public function store($data);
    // end store data

    // update data
    public function update($uuid, $data);
    // end update data

    // destroy data
    // end destroy data
}
