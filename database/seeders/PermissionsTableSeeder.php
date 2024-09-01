<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'client_create',
            ],
            [
                'id'    => 24,
                'title' => 'client_edit',
            ],
            [
                'id'    => 25,
                'title' => 'client_show',
            ],
            [
                'id'    => 26,
                'title' => 'client_delete',
            ],
            [
                'id'    => 27,
                'title' => 'client_access',
            ],
            [
                'id'    => 28,
                'title' => 'page_create',
            ],
            [
                'id'    => 29,
                'title' => 'page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'page_show',
            ],
            [
                'id'    => 31,
                'title' => 'page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'page_access',
            ],
            [
                'id'    => 33,
                'title' => 'country_managment_access',
            ],
            [
                'id'    => 34,
                'title' => 'country_create',
            ],
            [
                'id'    => 35,
                'title' => 'country_edit',
            ],
            [
                'id'    => 36,
                'title' => 'country_show',
            ],
            [
                'id'    => 37,
                'title' => 'country_delete',
            ],
            [
                'id'    => 38,
                'title' => 'country_access',
            ],
            [
                'id'    => 39,
                'title' => 'city_create',
            ],
            [
                'id'    => 40,
                'title' => 'city_edit',
            ],
            [
                'id'    => 41,
                'title' => 'city_show',
            ],
            [
                'id'    => 42,
                'title' => 'city_delete',
            ],
            [
                'id'    => 43,
                'title' => 'city_access',
            ],
            [
                'id'    => 44,
                'title' => 'product_create',
            ],
            [
                'id'    => 45,
                'title' => 'product_edit',
            ],
            [
                'id'    => 46,
                'title' => 'product_show',
            ],
            [
                'id'    => 47,
                'title' => 'product_delete',
            ],
            [
                'id'    => 48,
                'title' => 'product_access',
            ],
            [
                'id'    => 49,
                'title' => 'order_create',
            ],
            [
                'id'    => 50,
                'title' => 'order_edit',
            ],
            [
                'id'    => 51,
                'title' => 'order_show',
            ],
            [
                'id'    => 52,
                'title' => 'order_delete',
            ],
            [
                'id'    => 53,
                'title' => 'order_access',
            ],
            [
                'id'    => 54,
                'title' => 'order_detail_create',
            ],
            [
                'id'    => 55,
                'title' => 'order_detail_edit',
            ],
            [
                'id'    => 56,
                'title' => 'order_detail_show',
            ],
            [
                'id'    => 57,
                'title' => 'order_detail_delete',
            ],
            [
                'id'    => 58,
                'title' => 'order_detail_access',
            ],
            [
                'id'    => 59,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 60,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 61,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 62,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 63,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 64,
                'title' => 'package_create',
            ],
            [
                'id'    => 65,
                'title' => 'package_edit',
            ],
            [
                'id'    => 66,
                'title' => 'package_show',
            ],
            [
                'id'    => 67,
                'title' => 'package_delete',
            ],
            [
                'id'    => 68,
                'title' => 'package_access',
            ],
            [
                'id'    => 69,
                'title' => 'operating_stage_access',
            ],
            [
                'id'    => 70,
                'title' => 'pending_create',
            ],
            [
                'id'    => 71,
                'title' => 'pending_edit',
            ],
            [
                'id'    => 72,
                'title' => 'pending_show',
            ],
            [
                'id'    => 73,
                'title' => 'pending_delete',
            ],
            [
                'id'    => 74,
                'title' => 'pending_access',
            ],
            [
                'id'    => 75,
                'title' => 'overview_create',
            ],
            [
                'id'    => 76,
                'title' => 'overview_edit',
            ],
            [
                'id'    => 77,
                'title' => 'overview_show',
            ],
            [
                'id'    => 78,
                'title' => 'overview_delete',
            ],
            [
                'id'    => 79,
                'title' => 'overview_access',
            ],
            [
                'id'    => 80,
                'title' => 'prepare_delviery_create',
            ],
            [
                'id'    => 81,
                'title' => 'prepare_delviery_edit',
            ],
            [
                'id'    => 82,
                'title' => 'prepare_delviery_show',
            ],
            [
                'id'    => 83,
                'title' => 'prepare_delviery_delete',
            ],
            [
                'id'    => 84,
                'title' => 'prepare_delviery_access',
            ],
            [
                'id'    => 85,
                'title' => 'on_delivery_create',
            ],
            [
                'id'    => 86,
                'title' => 'on_delivery_edit',
            ],
            [
                'id'    => 87,
                'title' => 'on_delivery_show',
            ],
            [
                'id'    => 88,
                'title' => 'on_delivery_delete',
            ],
            [
                'id'    => 89,
                'title' => 'on_delivery_access',
            ],
            [
                'id'    => 90,
                'title' => 'delivered_create',
            ],
            [
                'id'    => 91,
                'title' => 'delivered_edit',
            ],
            [
                'id'    => 92,
                'title' => 'delivered_show',
            ],
            [
                'id'    => 93,
                'title' => 'delivered_delete',
            ],
            [
                'id'    => 94,
                'title' => 'delivered_access',
            ],
            [
                'id'    => 95,
                'title' => 'returned_create',
            ],
            [
                'id'    => 96,
                'title' => 'returned_edit',
            ],
            [
                'id'    => 97,
                'title' => 'returned_show',
            ],
            [
                'id'    => 98,
                'title' => 'returned_delete',
            ],
            [
                'id'    => 99,
                'title' => 'returned_access',
            ],
            [
                'id'    => 100,
                'title' => 'shift_create',
            ],
            [
                'id'    => 101,
                'title' => 'shift_edit',
            ],
            [
                'id'    => 102,
                'title' => 'shift_show',
            ],
            [
                'id'    => 103,
                'title' => 'shift_delete',
            ],
            [
                'id'    => 104,
                'title' => 'shift_access',
            ],
            [
                'id'    => 105,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
