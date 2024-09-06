<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $packages = [
            [
                'id'            => 1,
                'name'          => 'باقة 1',
                'description'   => 'باقة 1',
                'price'         => 500,
                'tokens'        => 2000000,
            ],
            [
                'id'            => 2,
                'name'          => 'باقة 2',
                'description'   => 'باقة 2',
                'price'         => 1000,
                'tokens'        => 5000000,
            ],
        ];

        Package::insert($packages);
    }
}
