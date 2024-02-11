<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


    Route::get('/', 'App\Http\Controllers\UserController@landingpage')->name('welcome');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');

    // ADMIN MENU
    Route::get('/admin/menu/{category}', 'App\Http\Controllers\Admin\MenuController@showMenuByCategory');
    Route::get('/admin/menu/{id}/edit', 'App\Http\Controllers\Admin\MenuController@edit')->name('menu.edit');
    Route::put('/admin/menu/{id}', 'App\Http\Controllers\Admin\MenuController@update')->name('menu.update');
    Route::get('/admin/menu/create', 'App\Http\Controllers\Admin\MenuController@create')->name('menu.create');
    Route::post('/admin/menu', 'App\Http\Controllers\Admin\MenuController@store')->name('menu.store');
    Route::delete('/admin/menu/{id}', 'App\Http\Controllers\Admin\MenuController@destroy')->name('menu.destroy');

    // ADMIN USER
    Route::get('/admin/user', 'App\Http\Controllers\Admin\UserController@index')->name('admin.users.index');
    Route::get('/admin/user/{id}', 'App\Http\Controllers\Admin\UserController@show');
    Route::get('/admin/user/{id}/edit', 'App\Http\Controllers\Admin\UserController@edit')->name('admin.users.edit');
    Route::put('/admin/user/{id}', 'App\Http\Controllers\Admin\UserController@update')->name('admin.users.update');
    Route::delete('/admin/user/{id}', 'App\Http\Controllers\Admin\UserController@destroy')->name('admin.users.destroy');

    // ADMIN SERVICES AND PACKAGES
    Route::get('/admin/service', 'App\Http\Controllers\Admin\ServiceController@index')->name('admin.service.index');
    Route::get('/admin/service/create', 'App\Http\Controllers\Admin\ServiceController@create')->name('admin.service.create');
    Route::post('/admin/service', 'App\Http\Controllers\Admin\ServiceController@store')->name('admin.service.store');
    Route::get('/admin/service/{id}', 'App\Http\Controllers\Admin\ServiceController@show')->name('admin.service.viewservice');
    Route::get('/admin/service/{id}/edit', 'App\Http\Controllers\Admin\ServiceController@edit')->name('admin.service.edit');
    Route::put('/admin/service/{id}', 'App\Http\Controllers\Admin\ServiceController@update')->name('admin.service.update');
    Route::delete('/admin/service/{id}', 'App\Http\Controllers\Admin\ServiceController@destroy')->name('admin.service.destroy');
    Route::get('/admin/service/{id}/create', 'App\Http\Controllers\Admin\PackageController@create')->name('admin.package.create');
    Route::post('/admin/service/{id}', 'App\Http\Controllers\Admin\PackageController@store')->name('admin.package.store');
    Route::get('/admin/services/{id}/{p_id}/edit', 'App\Http\Controllers\Admin\PackageController@edit')->name('admin.package.edit');
    Route::put('/admin/services/{id}/{p_id}', 'App\Http\Controllers\Admin\PackageController@update')->name('admin.package.update');
    Route::get('/admin/services/{id}/{p_id}', 'App\Http\Controllers\Admin\PackageController@show');
    Route::delete('/admin/services/{id}/{p_id}', 'App\Http\Controllers\Admin\PackageController@destroy')->name('admin.package.destroy');

    // ADMIN THEME
    Route::get('/admin/theme', 'App\Http\Controllers\Admin\ThemeController@index')->name('admin.theme.index');
    Route::get('/admin/theme/create', 'App\Http\Controllers\Admin\ThemeController@create')->name('admin.theme.create');
    Route::post('/admin/theme', 'App\Http\Controllers\Admin\ThemeController@store')->name('admin.theme.store');
    Route::get('/admin/theme/{id}/edit', 'App\Http\Controllers\Admin\ThemeController@edit')->name('admin.theme.edit');
    Route::put('/admin/theme/{id}', 'App\Http\Controllers\Admin\ThemeController@update')->name('admin.theme.update');
    Route::get('/admin/theme/{id}', 'App\Http\Controllers\Admin\ThemeController@show');
    Route::delete('/admin/theme/{id}', 'App\Http\Controllers\Admin\ThemeController@destroy')->name('admin.theme.destroy');

    // ADMIN RESERVATION
    Route::get('/admin/reservation/{status}', 'App\Http\Controllers\Admin\ReservationController@showReservationStatus');
    Route::get('/admin/reservation', 'App\Http\Controllers\Admin\ReservationController@index')->name('admin.reservation.index');
    Route::get('/admin/reservation/{id}/edit', 'App\Http\Controllers\Admin\ReservationController@edit')->name('admin.reservation.edit');
    Route::put('/admin/reservation/{id}', 'App\Http\Controllers\Admin\ReservationController@update')->name('admin.reservation.update');
    Route::delete('/admin/reservation/{id}', 'App\Http\Controllers\Admin\ReservationController@destroy')->name('reservation.destroy');

    // ADMIN CALL STATUS
    Route::get('/admin/reservation/{id}/call', 'App\Http\Controllers\Admin\ReservationController@indexCallStatus')->name('call-status.index');
    Route::get('reservations/{id}/call-status/add', 'App\Http\Controllers\Admin\ReservationController@addCallStatus')->name('call-status.add');
    Route::post('reservations/{id}/call-status/store', 'App\Http\Controllers\Admin\ReservationController@storeCallStatus')->name('call-status.store');

    // Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    // Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    // Route::put('/user/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');

    // Route::get('/users/{user}', 'App\Http\Controllers\UserController@usermanagement_show')->name('admin.users.view');
    // Route::get('/users/{user}/edit', 'App\Http\Controllers\UserController@usermanagement_edit')->name('admin.users.edit');
    // Route::put('/users/{user}', 'App\Http\Controllers\UserController@usermanagement_update')->name('users.update');
    // Route::delete('/users/{user}','App\Http\Controllers\UserController@usermanagement_destroy')->name('users.destroy');

    // Route::get('/service', 'App\Http\Controllers\ServiceController@adminindex')->name('admin.services.index');
    // Route::get('/service/create', 'App\Http\Controllers\ServiceController@admincreate')->name('admin.services.create');
    // Route::post('/service', 'App\Http\Controllers\ServiceController@adminstore')->name('admin.services.store');
    // Route::get('/service/{id}/edit', 'App\Http\Controllers\ServiceController@adminedit')->name('admin.services.edit');
    // Route::put('/service/{id}', 'App\Http\Controllers\ServiceController@adminupdate')->name('admin.services.update');
    // Route::delete('/service/{id}', 'App\Http\Controllers\ServiceController@admindestroy')->name('admin.services.destroy');
    // Route::get('/services/{id}', 'App\Http\Controllers\ServiceController@adminview')->name('admin.services.view');

    // Route::get('/services/{id}/create', 'App\Http\Controllers\ServiceController@pckgcreate')->name('admin.packages.create');
    // Route::post('/services/{id}', 'App\Http\Controllers\ServiceController@pckgstore')->name('admin.packages.store');
    // Route::get('/services/{id}/{p_id}/edit', 'App\Http\Controllers\ServiceController@pckgedit')->name('admin.packages.edit');
    // Route::put('/services/{id}/{p_id}', 'App\Http\Controllers\ServiceController@pckgupdate')->name('admin.packages.update');
    // Route::delete('/service/{id}/{p_id}', 'App\Http\Controllers\ServiceController@pckgdestroy')->name('admin.packages.destroy');

    // Route::delete('/theme/{id}', 'App\Http\Controllers\ServiceController@admin_theme_destroy')->name('admin.themes.destroy');
    // Route::get('/theme/{id}', 'App\Http\Controllers\ServiceController@admin_theme_view')->name('admin.themes.view');

});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', 'App\Http\Controllers\UserController@index')->name('user.dashboard');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::group([], function () {
        Route::get('/reservation/{packageId}', 'App\Http\Controllers\ReservationController@showForm')->name('user.reservations.premade');
        Route::post('/reservation/submit', 'App\Http\Controllers\ReservationController@submitForm')->name('reservation.submit');
        Route::get('/reservation/summary/{reservationId}', 'App\Http\Controllers\ReservationController@showSummary')->name('user.reservations.p_summary');
        Route::get('/generate-summary-pdf/{reservationId}', 'App\Http\Controllers\PDFController@generateSummaryPDF');
        Route::get('/customize', 'App\Http\Controllers\ReservationController@custom')->name('user.reservations.custom_package');
        Route::get('/customize/reservation', 'App\Http\Controllers\ReservationController@showCustomize')->name('user.reservations.customize');
        Route::post('/customize/reservation/form', 'App\Http\Controllers\ReservationController@showCustomizeStore')->name('user.reservations.store');
        Route::get('/customize/reservation/form', 'App\Http\Controllers\ReservationController@showCustomizeForm')->name('user.reservations.customize-form');
        Route::post('/customize/reservation/form/submit', 'App\Http\Controllers\ReservationController@submitCustomizeForm')->name('reservation.customize.submit');
        Route::put('/user/update', 'App\Http\Controllers\UserController@update')->name('profile.update');
        Route::post('/check-date-availability', 'App\Http\Controllers\ReservationController@checkDateAvailability')->name('check.date.availability');
        Route::get('/generate-pdf/{reservationId}', [PDFController::class, 'generatePDF'])->name('generate.pdf');
    });

});

Auth::routes();

Route::get('/menus', 'App\Http\Controllers\MenuController@index')->name('user.menus');
Route::get('/menus/{category?}', 'App\Http\Controllers\MenuController@specificmenuindex')->name('user.menuContainer');

Route::get('/services', 'App\Http\Controllers\ServiceController@index')->name('guest.services');
Route::get('/services/{serviceCategory}/packages', 'App\Http\Controllers\ServiceController@servicePromoIndex')->name('user.servicePackages');

Route::get('/themes', 'App\Http\Controllers\ThemesController@index')->name('user.themes');

// Route::get('/most-ordered-menu/{categoryName}','App\Http\Controllers\MenuController@showMostOrderedMenu')
//     ->name('most-ordered-menu');

    Route::get('/most-ordered-menu/{category}','App\Http\Controllers\MenuController@showMostOrderedMenu')
    ->name('most-ordered-menu');

