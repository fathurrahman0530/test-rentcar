<?php

namespace App\Repositories\Dashboard\Master\Merk;

use App\Models\Brand;

class MerkRepositoryImplement implements MerkRepository
{
    // get data
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $data = Brand::all();

        return $data;
    }
    public function get($key, $uuid)
    {
        // TODO: Implement get() method.
        $data = Brand::join('cars as c', 'c.uuid_brand', '=', 'brands.uuid')
        ->where($key, $uuid)->get();

        return $data;
    }
    public function getEdit($key, $uuid)
    {
        // TODO: Implement getEdit() method.
        $data = Brand::where($key, $uuid)->first();

        return $data;
    }
    // end get data

    // store data
    public function store($data)
    {
        // TODO: Implement store() method.
        $response = Brand::create($data);

        return $response;
    }
    // end store data

    // update data
    public function update($key, $uuid, $data)
    {
        // TODO: Implement update() method.
        $response = Brand::where($key, $uuid)->update($data);

        return $response;
    }
    // end update data

    // destroy data
    public function destroy($key, $uuid)
    {
        // TODO: Implement destroy() method.
        $response = Brand::where($key, $uuid)->delete();

        return $response;
    }
    // end destroy data
}
