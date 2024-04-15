<?php

namespace App\Repositories\Dashboard\SPK\Laporan;

use App\Models\Car;
use App\Models\Biodata;
use App\Models\Brand;
use App\Models\Spk;
use App\Models\Transaction;
use App\Models\User;

class LaporanRepositoryImplement implements LaporanRepository
{
    // get data
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $data = Brand::all();

        return $data;
    }
    public function get($uuid)
    {
        // TODO: Implement get() method.
        $data = Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
            ->select('cars.*', 'brands.name as brand_name')->where('brands.uuid', $uuid)->get();

        return $data;
    }

    public function getDetail($uuid)
    {
        // TODO: Implement get() method.
        // $data = Spk::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
        //     ->select('cars.*', 'brands.name as brand_name')->where('');
        $data = Spk::select('spks.uuid as idSpks', 'spks.*', 'u.uuid as idUser', 'u.*', 'b.uuid as idBio', 'b.*')
            ->join('users as u', 'u.uuid', '=', 'spks.uuid_user')
            ->join('biodatas as b', 'b.uuid_user', '=', 'u.uuid')
            ->first();

        return $data;
    }
    // end get data

    // store data
    public function store($data)
    {
        // TODO: Implement store() method.
        $response = Spk::create($data);

        return $response;
    }
    public function storeTransaction($data)
    {
        // TODO: Implement store() method.
        $response = Transaction::create($data);

        return $response;
    }
    // end store data

    // update data
    public function update($key, $uuid, $data)
    {
        // TODO: Implement update() method.
        $response = Spk::where($key, $uuid)->update($data);

        return $response;
    }
    // end update data

    // destroy data
    public function destroy($key, $uuid)
    {
        // TODO: Implement destroy() method.
        $response = Biodata::where($key, $uuid)->delete();

        return $response;
    }
    public function destroyUser($key, $uuid)
    {
        // TODO: Implement destroy() method.
        $response = User::where($key, $uuid)->delete();

        return $response;
    }
    // end destroy data
}
