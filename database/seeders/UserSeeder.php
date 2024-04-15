<?php

namespace Database\Seeders;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = Uuid::uuid4()->toString();

        User::create([
            'uuid' => $uuid,
            'username' => 'demo',
            'password' => Hash::make('demo123'),
            'status' => 'T',
            'role' => 1,
        ]);

        Biodata::create([
            'uuid' => Uuid::uuid4()->toString(),
            'fullname' => 'demo aplikasi',
            'email' => 'demo@gmail.com',
            'notelp' => '1234567891011',
            'uuid_user' => $uuid,
        ]);
    }
}
