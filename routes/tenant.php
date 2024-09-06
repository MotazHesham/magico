<?php

declare(strict_types=1);

use App\Http\Controllers\Frontend\LoginController; 
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['as' => 'frontend.', 'namespace' => 'App\Http\Controllers\Frontend', 'middleware' => ['auth']], function () {

        // Ai Message
        Route::post('message_ai', 'MagicoController@message_ai')->name('message_ai');
        Route::post('storeOrder', 'MagicoController@storeOrder')->name('storeOrder');

        Route::get('/home', 'HomeController@index')->name('home');
    
        // Audit Logs
        Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

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
        Route::post('orders/massUpdateStages', 'OrdersController@massUpdateStages')->name('orders.massUpdateStages');
        Route::get('orders/updateStage/{id}/{stage}', 'OrdersController@updateStage')->name('orders.updateStage');
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
        Route::resource('pendings', 'PendingController');
    
        // Overview 
        Route::resource('overviews', 'OverviewController');
    
        // Prepare Delviery 
        Route::resource('prepare-delvieries', 'PrepareDelvieryController');
    
        // On Delivery 
        Route::resource('on-deliveries', 'OnDeliveryController');
    
        // Delivered 
        Route::resource('delivereds', 'DeliveredController');
    
        // Returned 
        Route::resource('returneds', 'ReturnedController');
    
        // Canceled 
        Route::resource('canceleds', 'CanceledController');
    
        // Shifts
        Route::delete('shifts/destroy', 'ShiftsController@massDestroy')->name('shifts.massDestroy');
        Route::get('shifts/updateStage/{stage}/{id}', 'ShiftsController@updateStage')->name('shifts.updateStage');
        Route::resource('shifts', 'ShiftsController');
        
        // Message Generations 
        Route::resource('message-generations', 'MessageGenerationsController'); 
        
        Route::get('messenger', 'MessengerController@index')->name('messenger.index');
        Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
        Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
        Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
        Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
        Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
        Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
        Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
        Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

        
        Route::group(['prefix' => 'frontend/profile', 'as' => 'profile.'], function () {
            // Change password
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
            Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        });
    });
});
