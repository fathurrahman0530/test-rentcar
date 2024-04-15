<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = Uuid::uuid4()->toString();
        Company::create([
            'uuid' => $uuid,
            'name' => 'demo',
            'alamat' => 'jln demo',
            'maps' => 'demo',
            'telp' => '1234567890',
            'fax' => '1234567890',
            'mobile_1' => '1234567890',
            'mobile_2' => '1234567890',
            'email' => 'demo@gmail.com',
            'logo' => 'logo1711211264.png',
            'zona' => 'WITA',
            'icon' => 'icon1711211264.png',
        ]);
    }
}
