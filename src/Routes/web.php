<?php
Route::middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Dashboard\Controllers')
    ->group(function () {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('dashboards', 'DashboardController');

        Route::name('dashboards.')
            ->prefix('dashboards')
            ->group(function () {
                Route::post('{id}/createWidget', 'DashboardController@storeWidget')
                    ->name('widget.create');
                Route::put('{id}/updateWidget/{widget_pivot_id}', 'DashboardController@updateWidget')
                    ->name('widget.edit');

            });
    });