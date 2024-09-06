<?php

namespace Database\Seeders;

use Database\Seeders\Tenant\CitiesTableSeeder;
use Database\Seeders\Tenant\CountriesTableSeeder;
use Database\Seeders\Tenant\PermissionRoleTableSeeder;
use Database\Seeders\Tenant\PermissionsTableSeeder;
use Database\Seeders\Tenant\RolesTableSeeder;
use Database\Seeders\Tenant\RoleUserTableSeeder;
use Database\Seeders\Tenant\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseTenantSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class, 
            CountriesTableSeeder::class, 
            CitiesTableSeeder::class, 
        ]);
    }
}
