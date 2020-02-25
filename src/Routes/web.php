<?php
Route::middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Dashboard\Controllers')
    ->group(function () {

        Route::get(config('cw_dashboard.route.index'), 'DashboardController@index')->name('dashboard');
        Route::resource('dashboards', 'DashboardController');

        Route::name('dashboards.widget.')
            ->prefix('dashboards')
            ->group(function () {
                Route::post('{dashboard_id}/widget/add', 'DashboardController@storeWidget')
                    ->name('store');
                Route::put('{dashboard_id}/widget/{widget_id}/edit', 'DashboardController@updateWidget')
                    ->name('update');
            });
    });