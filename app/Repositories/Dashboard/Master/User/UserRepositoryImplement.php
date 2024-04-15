<?php

namespace App\Repositories\Dashboard\Master\User;

use App\Models\Biodata;
use App\Models\Car;
use App\Models\User;

class UserRepositoryImplement implements UserRepository
{
    // get data
    public function getAll()
    {
        // TODO: Implement getAll() method.
        /*$data = User::select('users.uuid as IDUser', 'users.*', 'biodatas.uuid as IDBio', 'biodatas.*', 'spks.uuid as IDSpk', 'spks.*')*/
        $data = User::select('users.uuid as IDUser', 'users.*', 'biodatas.uuid as IDBio', 'biodatas.*')
            ->join('biodatas', 'users.uuid', '=', 'biodatas.uuid_user')
            /*->leftJoin('spks', 'spks.uuid_user', '=', 'users.uuid')*/
            ->whereIn('users.role', [2, 3, 4])
            /*->groupBy('users.username')*/
            ->distinct()
            ->get();

        return $data;
    }
    public function get($uuid)
    {
        // TODO: Implement get() method.
        $data = User::where('users.uuid', $uuid)
            ->join('biodatas', 'users.uuid', '=', 'biodatas.uuid_user')
            ->first();

        return $data;
    }

    public function getDetail($uuid)
    {
        // TODO: Implement get() method.
        $data = User::where('users.uuid', $uuid)
            ->join('biodatas', 'users.uuid', '=', 'biodatas.uuid_user')
            ->select('users.uuid as IDUser', 'users.*', 'biodatas.uuid as IDBio', 'biodatas.*')
            ->first();

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
        $response = User::where($key, $uuid)->update($data);

        return $response;
    }
    public function updateBio($key, $uuid, $data)
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
        $response = User::where($key, $uuid)->delete();

        return $response;
    }
    public function destroyBio($key, $uuid)
    {
        // TODO: Implement destroy() method.
        $response = Biodata::where($key, $uuid)->delete();

        return $response;
    }
    // end destroy data
}
