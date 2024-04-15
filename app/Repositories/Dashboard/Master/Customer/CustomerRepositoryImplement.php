<?php

namespace App\Repositories\Dashboard\Master\Customer;

use App\Models\Car;
use App\Models\Biodata;
use App\Models\User;

class CustomerRepositoryImplement implements CustomerRepository
{
    // get data
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $data = User::select('users.uuid as IDUser', 'users.*', 'biodatas.uuid as IDBio', 'biodatas.*', 'spks.uuid as IDSpk', 'spks.*')
            ->join('biodatas', 'users.uuid', '=', 'biodatas.uuid_user')
            ->leftJoin('spks', 'spks.uuid_user', '=', 'users.uuid')
            ->where('users.role', 5)
            ->get();

        return $data;
    }
    public function get($uuid)
    {
        // TODO: Implement get() method.
        $data = Biodata::where('uuid_user', $uuid)->first();

        return $data;
    }
    public function getSpk($uuid)
    {
        // TODO: Implement get() method.
        $data = Biodata::join('spks', 'spks.uuid_penyewa', '=', 'biodatas.uuid_user')
            ->where('biodatas.uuid_user', $uuid)->get();

        return $data;
    }

    public function getDetail($uuid)
    {
        // TODO: Implement get() method.
        $data = Biodata::where('uuid_user', $uuid)->first();

        return $data;
    }
    // end get data

    // store data
    public function store($data)
    {
        // TODO: Implement store() method.
        $response = User::create($data);

        return $response;
    }
    public function storeBio($data)
    {
        // TODO: Implement store() method.
        $response = Biodata::create($data);

        return $response;
    }
    // end store data

    // update data
    public function update($key, $uuid, $data)
    {
        // TODO: Implement update() method.
        $response = Biodata::where($key, $uuid)->update($data);

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
