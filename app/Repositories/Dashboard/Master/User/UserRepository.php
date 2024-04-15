<?php

namespace App\Repositories\Dashboard\Master\User;

interface UserRepository
{
    // get data
    public function getAll();
    public function get($uuid);
    public function getDetail($uuid);
    // end get data

    // store data
    public function store($data);
    public function storeBio($data);
    // end store data

    // update data
    public function update($key, $uuid, $data);
    public function updateBio($key, $uuid, $data);
    // end update data

    // destroy data
    public function destroy($key, $uuid);
    public function destroyBio($key, $uuid);
    // end destroy data
}
