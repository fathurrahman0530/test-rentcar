<?php

namespace Database\Seeders;

use App\Models\Activation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Activision extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = Uuid::uuid4()->toString();

        $code = Str::random(6);
        $now = Carbon::now();
        $expired = $now->addDay(30);

        Activation::create([
            'uuid' => $uuid,
            'company' => 'PT demo aplikasi',
            'username' => 'demo',
            'email' => 'demo@gmail.com',
            'notelp' => '1234567891011',
            'verify' => $code,
            'status' => 'D',
            'expired' => $expired->toDateString(),
            'password' => Hash::make('demo123'),
        ]);
    }
}
