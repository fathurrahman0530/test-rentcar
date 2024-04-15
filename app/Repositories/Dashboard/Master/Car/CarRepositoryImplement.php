<?php

namespace App\Repositories\Dashboard\Master\Car;

use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarRepositoryImplement implements CarRepository
{
    // get data
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $data = Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
            ->select('cars.*', 'brands.name as brand_name')
            ->get();

        return $data;
    }
    public function get($uuid)
    {
        // TODO: Implement get() method.
        $data = Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
            ->select('cars.*', 'brands.name as brand_name')->where('cars.uuid', $uuid)->first();

        return $data;
    }
    public function getLimit()
    {
        // TODO: Implement get() method.
        $data = Car::select('name', DB::raw('MAX(image) as image'), DB::raw('MAX(harga) as harga'))->groupBy('name')->where('status', 'RD')->limit(5)->get();

        return $data;
    }
    public function getList()
    {
        // TODO: Implement get() method.
        $data = Car::select('name', DB::raw('MAX(image) as image'), DB::raw('MAX(harga) as harga'))->groupBy('name')->where('status', 'RD')->get();

        return $data;
    }

    public function getDetail($uuid)
    {
        // TODO: Implement get() method.
        $data = Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
            ->select('cars.*', 'brands.name as brand_name')->where('cars.uuid', $uuid)->first();

        return $data;
    }
    // end get data

    // store data
    public function store($data)
    {
        // TODO: Implement store() method.
        $response = Car::create($data);

        return $response;
    }
    // end store data

    // update data
    public function update($key, $uuid, $data)
    {
        // TODO: Implement update() method.
        $response = Car::where($key, $uuid)->update($data);

        return $response;
    }
    // end update data

    // destroy data
    public function destroy($key, $uuid)
    {
        // TODO: Implement destroy() method.
        $response = Car::where($key, $uuid)->delete();

        return $response;
    }
    // end destroy data
}
