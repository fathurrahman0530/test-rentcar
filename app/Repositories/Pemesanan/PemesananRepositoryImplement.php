<?php

namespace App\Repositories\Pemesanan;

use App\Models\Car;
use App\Models\Biodata;
use App\Models\Brand;
use App\Models\RequestPemesanan;
use App\Models\Spk;
use App\Models\Transaction;
use App\Models\User;

class PemesananRepositoryImplement implements PemesananRepository
{
    // get data
    public function getAll()
    {
        $data = RequestPemesanan::orderBy('created_at', 'DESC')->get();

        return $data;
    }
    // end get data

    // store data
    public function store($data)
    {
        // TODO: Implement store() method.
        $response = RequestPemesanan::create($data);

        return $response;
    }
    // end store data

    // update data
    public function update($uuid, $data)
    {
        $response = RequestPemesanan::where('uuid', $uuid)->update($data);

        return $response;
    }
    // end update data

    // destroy data
    // end destroy data
}
