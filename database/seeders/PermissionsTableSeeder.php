<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $i = 1;
        $permissions = [
            [
                'id'    => $i++,
                'title' => 'user_management_access',
            ], 
            [
                'id'    => $i++,
                'title' => 'role_create',
            ],
            [
                'id'    => $i++,
                'title' => 'role_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'role_show',
            ],
            [
                'id'    => $i++,
                'title' => 'role_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'role_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'user_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_access',
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => $i++,
                'title' => 'client_create',
            ],
            [
                'id'    => $i++,
                'title' => 'client_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'client_show',
            ],
            [
                'id'    => $i++,
                'title' => 'client_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'client_access',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_create',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_show',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_access',
            ],
            [
                'id'    => $i++,
                'title' => 'package_create',
            ],
            [
                'id'    => $i++,
                'title' => 'package_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'package_show',
            ],
            [
                'id'    => $i++,
                'title' => 'package_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'package_access',
            ],
            [
                'id'    => $i++,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
