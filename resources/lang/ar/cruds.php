<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'الصلاحية',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'المجموعة',
            'title_helper'       => ' ',
            'permissions'        => 'الصلاحيات',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'الأسم',
            'name_helper'              => ' ',
            'email'                    => 'البريد الاكتروني',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'المجموعات',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'قبول',
            'approved_helper'          => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'تنبيهات المستخدمين',
        'title_singular' => 'تنبيه',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'التنبيه',
            'alert_text_helper' => ' ',
            'alert_link'        => 'اللينك',
            'alert_link_helper' => ' ',
            'user'              => 'المستخدمين',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'client' => [
        'title'          => 'العملاء',
        'title_singular' => 'عميل',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'الأسم',
            'name_helper'         => ' ',
            'phone_number'        => 'رقم الهاتف',
            'phone_number_helper' => ' ',
            'company_name'        => 'اسم الشركة',
            'company_name_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'address'             => 'العنوان',
            'address_helper'      => ' ',
            'logo'                => 'اللوجو',
            'logo_helper'         => ' ',
            'domain'              => 'Domain',
            'domain_helper'       => ' ',
        ],
    ],
    'page' => [
        'title'          => 'الصفحات',
        'title_singular' => 'صفحة',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ', 
            'page_name'         => 'اسم الصفحة',
            'page_name_helper'  => ' ',
            'page_link'         => 'لينك الصفحة',
            'page_link_helper'  => ' ',
            'logo'              => 'اللوجو',
            'logo_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'countryManagment' => [
        'title'          => 'إدارة المدن',
        'title_singular' => 'إدارة المدن',
    ],
    'country' => [
        'title'          => 'البلاد',
        'title_singular' => 'بلد',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'البلد',
            'name_helper'       => ' ',
            'short_code'        => 'كود',
            'short_code_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'predictions'              => 'التنبؤات',
            'predictions_helper'       => ' ',
        ],
    ],
    'city' => [
        'title'          => 'المدن',
        'title_singular' => 'مدينة',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'المدينة',
            'name_helper'       => ' ',
            'country'           => 'البلد',
            'country_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'cost'              => 'السعر',
            'cost_helper'       => ' ',
            'code'              => 'الكود',
            'code_helper'       => ' ',
            'predictions'              => 'التنبؤات',
            'predictions_helper'       => ' ',
        ],
    ],
    'product' => [
        'title'          => 'المنتجات',
        'title_singular' => 'منتج',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'اسم المنتج',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'price'             => 'السعر',
            'price_helper'      => ' ',
            'quantity'          => 'الكمية في المخزن',
            'quantity_helper'   => ' ',
            'colors'            => 'الألوان',
            'colors_helper'     => ' ',
            'sizes'             => 'المقاسات',
            'sizes_helper'      => ' ',
            'page'              => 'الصفحة',
            'page_helper'       => ' ',
            'predictions'              => 'التنبؤات',
            'predictions_helper'       => ' ',
        ],
    ],
    'order' => [
        'title'          => 'الطلبات',
        'title_singular' => 'طلب',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'phone_number'            => 'رقم الهاتف',
            'phone_number_helper'     => ' ',
            'shipping_address'        => 'العنوان',
            'shipping_address_helper' => ' ',
            'total_cost'              => 'الأجمالي',
            'total_cost_helper'       => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'name'                    => 'الأسم',
            'name_helper'             => ' ',
            'operating_status'        => 'حالة التشغيل',
            'operating_status_helper' => ' ',
            'cancel_reason'           => 'سبب الألغاء',
            'cancel_reason_helper'    => ' ',
            'country'                 => 'البلد',
            'country_helper'          => ' ',
            'city'                    => 'المدينة',
            'city_helper'             => ' ',
            'shift'                   => 'الشيفت',
            'shift_helper'            => ' ',
            'full_message'            => 'الرسالة كاملة',
            'full_message_helper'     => ' ',
            'tokens'                  => 'Tokens',
            'tokens_helper'           => ' ',
            'shipping_cost'           => 'سعر الشحن',
            'shipping_cost_helper'    => ' ',
            'district'                => 'المنطقة',
            'district_helper'         => ' ',
            'phone_number_2'          => 'رقم الهاتف 2',
            'phone_number_2_helper'   => ' ',
        ],
    ],
    'orderDetail' => [
        'title'          => 'تفاصيل الطلب',
        'title_singular' => 'تفاصيل الطلب',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'order'             => 'الطلب',
            'order_helper'      => ' ',
            'product'           => 'المنتج',
            'product_helper'    => ' ',
            'price'             => 'السعر',
            'price_helper'      => ' ',
            'quantity'          => 'الكمية',
            'quantity_helper'   => ' ',
            'total_cost'        => 'الأجملي',
            'total_cost_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'colors'             => 'الألوان',
            'colors_helper'      => ' ',
            'size'              => 'المقاس',
            'size_helper'       => ' ',
            'returned'          => 'هل مرتجع ؟',
            'returned_helper'   => ' ',
        ],
    ],
    'subscription' => [
        'title'          => 'الاشتراكات',
        'title_singular' => 'اشتراك',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'client'                  => 'العميل',
            'client_helper'           => ' ',
            'start_date'              => 'تاريخ البداية',
            'start_date_helper'       => ' ',
            'end_date'                => 'تاريخ النهاية',
            'end_date_helper'         => ' ',
            'note'                    => 'الملحوظة',
            'note_helper'             => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'package'                 => 'الباقة',
            'package_helper'          => ' ',
            'price'                   => 'السعر',
            'price_helper'            => ' ',
            'tokens'                  => 'Tokens',
            'tokens_helper'           => ' ',
            'remaining_tokens'        => 'Remaining Tokens',
            'remaining_tokens_helper' => ' ',
            'is_active'               => 'Is Active',
            'is_active_helper'        => ' ',
        ],
    ],
    'package' => [
        'title'          => 'الباقات',
        'title_singular' => 'باقة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'اسم الباقة',
            'name_helper'        => ' ',
            'description'        => 'الوصف',
            'description_helper' => ' ',
            'price'              => 'السعر',
            'price_helper'       => ' ',
            'tokens'             => 'Tokens',
            'tokens_helper'      => 'Chatgpt Tokens',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'operatingStage' => [
        'title'          => 'حالات التشغيل',
        'title_singular' => 'حالات التشغيل',
    ],
    'pending' => [
        'title'          => 'قيد الانتظار',
        'title_singular' => 'قيد الانتظار',
    ],
    'overview' => [
        'title'          => 'تحت المراجعة',
        'title_singular' => 'تحت المراجعة',
    ],
    'prepareDelviery' => [
        'title'          => 'تجهيز للشحن',
        'title_singular' => 'تجهيز للشحن',
    ],
    'onDelivery' => [
        'title'          => 'مع شركة الشحن',
        'title_singular' => 'مع شركة الشحن',
    ],
    'delivered' => [
        'title'          => 'تم التوصيل',
        'title_singular' => 'تم التوصيل',
    ],
    'returned' => [
        'title'          => 'مرتجعات',
        'title_singular' => 'مرتجعات',
    ],
    'canceled' => [
        'title'          => 'ملغاة',
        'title_singular' => 'ملغاة',
    ],
    'shift' => [
        'title'          => 'الشيفتات',
        'title_singular' => 'شيفت',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'user'                    => 'المستخدم',
            'user_helper'             => ' ',
            'operating_status'        => 'حالة التشغيل',
            'operating_status_helper' => ' ',
            'start_date'              => 'تاريخ الشيفت',
            'start_date_helper'       => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'messageGeneration' => [
        'title'          => 'Magic Messages',
        'title_singular' => 'Magic Message',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'full_message'        => 'الرسالة كاملة',
            'full_message_helper' => ' ',
            'response'            => 'Response',
            'response_helper'     => ' ',
            'tokens'              => 'Tokens',
            'tokens_helper'       => ' ',
            'shift'               => 'الشيفت',
            'shift_helper'        => ' ',
            'order'               => 'الطلب',
            'order_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],

];
