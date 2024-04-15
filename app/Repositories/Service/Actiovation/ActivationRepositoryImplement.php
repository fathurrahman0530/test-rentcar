<?php

namespace App\Repositories\Service\Actiovation;

use App\Models\Activation;
use App\Models\Biodata;
use App\Models\Company;
use App\Models\User;

class ActivationRepositoryImplement implements ActivationRepository
{
    // get data
    public function cek()
    {
        // TODO: Implement cek() method.
        $data = Activation::first();

        return $data;
    }
    public function cekActive($uuid)
    {
        // TODO: Implement cekActive() method.
        $data = Activation::where('uuid', $uuid)->first();

        return $data;
    }
    public function cekUser($uuid)
    {
        // TODO: Implement cekUser() method.
        $data = User::where('uuid', $uuid)->first();

        return $data;
    }
    public function cekBiodata($uuid)
    {
        // TODO: Implement cekBiodata() method.
        $data = Biodata::where('uuid', $uuid)->first();

        return $data;
    }
    // end get data

    // store data
    public function store($data)
    {
        // TODO: Implement store() method.
        $response = Activation::create($data);

        return $response;
    }
    public function storeBio($data)
    {
        // TODO: Implement storeBio() method.
        $response = Biodata::create($data);

        return $response;
    }
    public function storeUser($data)
    {
        // TODO: Implement storeUser() method.
        $response = User::create($data);

        return $response;
    }
    public function storeCom($data)
    {
        $response = Company::create($data);

        return $response;
    }
    // end store data

    // update data
    public function update($uuid, $data)
    {
        // TODO: Implement update() method.
        $response = Activation::where('uuid', $uuid)->update($data);

        return $response;
    }
    // end update data

    // destroy data
    public function delActive($uuid)
    {
        // TODO: Implement delActive() method.
        $response = Activation::where('uuid', $uuid)->delete();

        return $response;
    }
    public function delUser($uuid)
    {
        // TODO: Implement delUser() method.
        $response = User::where('uuid', $uuid)->delete();

        return $response;
    }
    public function delBio($uuid)
    {
        // TODO: Implement delBio() method.
        $response = Biodata::where('uuid', $uuid)->delete();

        return $response;
    }
    // end destroy data
}
