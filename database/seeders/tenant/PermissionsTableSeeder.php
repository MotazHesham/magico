<?php

namespace Database\Seeders\Tenant;

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
                'type' => 'role.user.audit_log.user_alert',
                'parent' => 1,
            ], 
            [
                'id'    => $i++,
                'title' => 'role_create',
                'type' => 'role',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'role_edit',
                'type' => 'role',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'role_show',
                'type' => 'role',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'role_delete',
                'type' => 'role',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'role_access',
                'type' => 'role',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_create',
                'type' => 'user',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_edit',
                'type' => 'user',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_show',
                'type' => 'user',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_delete',
                'type' => 'user',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_access',
                'type' => 'user',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_show',
                'type' => 'audit_log',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_access',
                'type' => 'audit_log',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_create',
                'type' => 'user_alert',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_show',
                'type' => 'user_alert',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_delete',
                'type' => 'user_alert',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_access',
                'type' => 'user_alert',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'page_create',
                'type' => 'page',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'page_edit',
                'type' => 'page',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'page_show',
                'type' => 'page',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'page_delete',
                'type' => 'page',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'page_access',
                'type' => 'page',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'country_managment_access',
                'type' => 'country.city',
                'parent' => 1,
            ],
            [
                'id'    => $i++,
                'title' => 'country_create',
                'type' => 'country',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'country_edit',
                'type' => 'country',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'country_show',
                'type' => 'country',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'country_delete',
                'type' => 'country',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'country_access',
                'type' => 'country',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'city_create',
                'type' => 'city',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'city_edit',
                'type' => 'city',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'city_show',
                'type' => 'city',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'city_delete',
                'type' => 'city',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'city_access',
                'type' => 'city',
                'parent' => 0,
            ],
            [
                'id'    => $i++,
                'title' => 'product_create',
                'type' => 'product',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'product_edit',
                'type' => 'product',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'product_show',
                'type' => 'product',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'product_delete',
                'type' => 'product',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'product_access',
                'type' => 'product',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_create',
                'type' => 'order',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_edit',
                'type' => 'order',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_show',
                'type' => 'order',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_delete',
                'type' => 'order',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_access',
                'type' => 'order',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_detail_create',
                'type' => 'order_detail',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_detail_edit',
                'type' => 'order_detail',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_detail_show',
                'type' => 'order_detail',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_detail_delete',
                'type' => 'order_detail',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'order_detail_access',
                'type' => 'order_detail',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'operating_stage_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'pending_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'overview_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'prepare_delviery_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'on_delivery_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'delivered_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'returned_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'canceled_access',
                'type' => 'operating_stage',
                'parent' => 2,
            ], 
            [
                'id'    => $i++,
                'title' => 'shift_show',
                'type' => 'shift',
                'parent' => 2,
            ], 
            [
                'id'    => $i++,
                'title' => 'shift_access',
                'type' => 'shift',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'message_generation_access',
                'type' => 'message_generation',
                'parent' => 2,
            ], 
            [
                'id'    => $i++,
                'title' => 'message_generation_create',
                'type' => 'message_generation',
                'parent' => 2,
            ], 
            [
                'id'    => $i++,
                'title' => 'message_generation_show',
                'type' => 'message_generation',
                'parent' => 2,
            ], 
            [
                'id'    => $i++,
                'title' => 'to_overview',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'to_prepare_for_delivery',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'to_on_delivery',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'to_delivered',
                'type' => 'operating_stage',
                'parent' => 2,
            ],
            [
                'id'    => $i++,
                'title' => 'to_returned',
                'type' => 'operating_stage',
                'parent' => 2,
            ], 
            [
                'id'    => $i++,
                'title' => 'to_canceled',
                'type' => 'operating_stage',
                'parent' => 2,
            ], 
            [
                'id'    => $i++,
                'title' => 'profile_password_edit',
                'type' => 'general',
                'parent' => 2,
            ],
        ];

        Permission::insert($permissions);
    }
}
