<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Auth::routes();
        });
        
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
            Route::post('clients/update_statuses', 'ClientController@update_statuses')->name('clients.update_statuses');
            Route::resource('clients', 'ClientController');

            // Pages
            Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
            Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
            Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
            Route::resource('pages', 'PagesController'); 

            // Subscriptions
            Route::delete('subscriptions/destroy', 'SubscriptionsController@massDestroy')->name('subscriptions.massDestroy');
            Route::resource('subscriptions', 'SubscriptionsController');

            // Packages
            Route::delete('packages/destroy', 'PackagesController@massDestroy')->name('packages.massDestroy');
            Route::resource('packages', 'PackagesController'); 

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
    });
}