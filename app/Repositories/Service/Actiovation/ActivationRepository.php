<?php

namespace App\Repositories\Service\Actiovation;

interface ActivationRepository
{
    // get data
    public function cek();
    public function cekActive($uuid);
    public function cekUser($uuid);
    public function cekBiodata($uuid);
    // end get data

    // store data
    public function store($data);
    public function storeUser($data);
    public function storeBio($data);
    public function storeCom($data);
    // end store data

    // update data
    public function update($uuid, $data);
    // end update data

    // destroy data
    public function delActive($uuid);
    public function delUser($uuid);
    public function delBio($uuid);
    // end destroy data
}
