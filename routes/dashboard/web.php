<?php

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'role:super_admin|admin'])
    ->group(function () {

        //welcome route
        Route::get('/', 'WelcomeController@index')->name('welcome');

        //category routes
        Route::resource('categories', 'CategoryController')->except(['show']);

       

        //role routes
        Route::resource('roles', 'RoleController')->except(['show']);

        //user routes
        Route::resource('users', 'UserController');

        //subscription routes
        Route::resource('subscriptions', 'SubscriptionController');
        Route::get('/subscriptions/user-subscriptions/{subscription}', 'SubscriptionController@user_subscriptions')->name('subscriptions.user-subscriptions');
        Route::get('/subscriptions/generate-pdf/{id?}','SubscriptionController@generatePDF')->name('subscriptions.generatePDF');
        
          //post routes
          Route::resource('pos', 'PosController');
          Route::get('/subscriptions/user-pos/{pos}', 'PosController@user_pos')->name('pos.user-pos');
          //cards routes
          Route::resource('cards', 'CardController');
          Route::get('/cards/user-cards/{card}', 'CardController@user_cards')->name('cards.user-cards');


        

        Route::get('/settings/social_login', 'SettingController@social_login')->name('settings.social_login');
        Route::get('/settings/social_links', 'SettingController@social_links')->name('settings.social_links');
        Route::post('/settings', 'SettingController@store')->name('settings.store');
    });