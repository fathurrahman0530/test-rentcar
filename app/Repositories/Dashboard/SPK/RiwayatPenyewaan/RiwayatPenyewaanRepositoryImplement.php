<?php

namespace App\Repositories\Dashboard\SPK\RiwayatPenyewaan;

use App\Models\Car;
use App\Models\Biodata;
use App\Models\Brand;
use App\Models\Spk;
use App\Models\Transaction;
use App\Models\User;

class RiwayatPenyewaanRepositoryImplement implements RiwayatPenyewaanRepository
{
    // get data
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $data = Spk::select('spks.uuid as idSpks', 'spks.*', 'u.uuid as idUser', 'u.*', 'b.uuid as idBio', 'b.*')
            ->join('users as u', 'u.uuid', '=', 'spks.uuid_user')
            ->join('biodatas as b', 'b.uuid_user', '=', 'u.uuid')
            ->where('spks.status', 'T')
            ->orderBy('spks.created_at', 'DESC')
            ->get();

        return $data;
    }
    public function get($uuid)
    {
        // TODO: Implement get() method.
        $data = Biodata::where('uuid_user', $uuid)->first();

        return $data;
    }

    public function getDetail($uuid)
    {
        // TODO: Implement get() method.
        $data = Spk::select('spks.uuid as idSpks', 'spks.*', 'u.uuid as idUser', 'u.*', 'b.uuid as idBio', 'b.*')
            ->join('users as u', 'u.uuid', '=', 'spks.uuid_penyewa')
            ->join('biodatas as b', 'b.uuid_user', '=', 'u.uuid')
            ->where('spks.uuid', $uuid)
            ->first();

        return $data;
    }
    public function getMobil()
    {
        $data = Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
            ->select('cars.*', 'brands.name as brand_name')
            ->where('cars.status', 'RD')
            ->get();
        return $data;
    }
    public function getPelanggan()
    {
        $data = User::select('users.uuid as IDUser', 'users.*', 'biodatas.uuid as IDBio', 'biodatas.*', 'spks.uuid as IDSpk', 'spks.*')
            ->join('biodatas', 'users.uuid', '=', 'biodatas.uuid_user')
            ->leftJoin('spks', 'spks.uuid_user', '=', 'users.uuid')
            ->where('users.role', 5)
            ->get();

        return $data;
    }
    public function getDriver()
    {
        $data = User::select('users.uuid as IDUser', 'users.*', 'biodatas.uuid as IDBio', 'biodatas.*', 'spks.uuid as IDSpk', 'spks.*')
            ->join('biodatas', 'users.uuid', '=', 'biodatas.uuid_user')
            ->leftJoin('spks', 'spks.uuid_user', '=', 'users.uuid')
            ->where('users.role', 4)
            ->get();

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
