<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::resource('clients', 'ClientController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductsController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Order Details
    Route::delete('order-details/destroy', 'OrderDetailsController@massDestroy')->name('order-details.massDestroy');
    Route::resource('order-details', 'OrderDetailsController');

    // Subscriptions
    Route::delete('subscriptions/destroy', 'SubscriptionsController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionsController');

    // Packages
    Route::delete('packages/destroy', 'PackagesController@massDestroy')->name('packages.massDestroy');
    Route::resource('packages', 'PackagesController');

    // Pending
    Route::delete('pendings/destroy', 'PendingController@massDestroy')->name('pendings.massDestroy');
    Route::resource('pendings', 'PendingController');

    // Overview
    Route::delete('overviews/destroy', 'OverviewController@massDestroy')->name('overviews.massDestroy');
    Route::resource('overviews', 'OverviewController');

    // Prepare Delviery
    Route::delete('prepare-delvieries/destroy', 'PrepareDelvieryController@massDestroy')->name('prepare-delvieries.massDestroy');
    Route::resource('prepare-delvieries', 'PrepareDelvieryController');

    // On Delivery
    Route::delete('on-deliveries/destroy', 'OnDeliveryController@massDestroy')->name('on-deliveries.massDestroy');
    Route::resource('on-deliveries', 'OnDeliveryController');

    // Delivered
    Route::delete('delivereds/destroy', 'DeliveredController@massDestroy')->name('delivereds.massDestroy');
    Route::resource('delivereds', 'DeliveredController');

    // Returned
    Route::delete('returneds/destroy', 'ReturnedController@massDestroy')->name('returneds.massDestroy');
    Route::resource('returneds', 'ReturnedController');

    // Shifts
    Route::delete('shifts/destroy', 'ShiftsController@massDestroy')->name('shifts.massDestroy');
    Route::resource('shifts', 'ShiftsController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::resource('clients', 'ClientController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductsController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Order Details
    Route::delete('order-details/destroy', 'OrderDetailsController@massDestroy')->name('order-details.massDestroy');
    Route::resource('order-details', 'OrderDetailsController');

    // Subscriptions
    Route::delete('subscriptions/destroy', 'SubscriptionsController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionsController');

    // Packages
    Route::delete('packages/destroy', 'PackagesController@massDestroy')->name('packages.massDestroy');
    Route::resource('packages', 'PackagesController');

    // Pending
    Route::delete('pendings/destroy', 'PendingController@massDestroy')->name('pendings.massDestroy');
    Route::resource('pendings', 'PendingController');

    // Overview
    Route::delete('overviews/destroy', 'OverviewController@massDestroy')->name('overviews.massDestroy');
    Route::resource('overviews', 'OverviewController');

    // Prepare Delviery
    Route::delete('prepare-delvieries/destroy', 'PrepareDelvieryController@massDestroy')->name('prepare-delvieries.massDestroy');
    Route::resource('prepare-delvieries', 'PrepareDelvieryController');

    // On Delivery
    Route::delete('on-deliveries/destroy', 'OnDeliveryController@massDestroy')->name('on-deliveries.massDestroy');
    Route::resource('on-deliveries', 'OnDeliveryController');

    // Delivered
    Route::delete('delivereds/destroy', 'DeliveredController@massDestroy')->name('delivereds.massDestroy');
    Route::resource('delivereds', 'DeliveredController');

    // Returned
    Route::delete('returneds/destroy', 'ReturnedController@massDestroy')->name('returneds.massDestroy');
    Route::resource('returneds', 'ReturnedController');

    // Shifts
    Route::delete('shifts/destroy', 'ShiftsController@massDestroy')->name('shifts.massDestroy');
    Route::resource('shifts', 'ShiftsController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
