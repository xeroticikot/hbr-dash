<?php

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

Route::get('/', 'HBR_Dashboard@dashboard')->name('home');
Route::get('/create-users', 'HBR_Dashboard@createUsers');
Route::post('/create-users', 'HBR_Dashboard@createUsers');
Route::get('/users-list', 'HBR_Dashboard@usersList');
Route::post('/users-list', 'HBR_Dashboard@usersList');
Route::post('/users/delete/{id}', 'HBR_Dashboard@deleteUser');
Route::get('/bookings/{link}', 'HBR_Dashboard@allBookings');
Route::get('/bookings/details/{id}', 'HBR_Dashboard@readyBookingsDetails');
Route::post('/get-ready-bookings-data', 'APIHandler@getReadyBookingsData');
Route::get('/boats', 'HBR_Dashboard@boats');
Route::post('/boats', 'HBR_Dashboard@boats');
Route::post('/edit-boat', 'HBR_Dashboard@editBoat');
Route::post('/delete-boat', 'HBR_Dashboard@deleteBoat');
Route::post('/send-mail', 'HBR_Dashboard@sendMail');
Route::post('/send-mail-client', 'HBR_Dashboard@sendMailClient');
Route::post('/change-status', 'HBR_Dashboard@changeStatus');
Route::get('/lead-details/{id}', 'HBR_Dashboard@leadDetails');
Route::post('/lead-details/{id}', 'HBR_Dashboard@leadDetails');
Route::get('/owners', 'HBR_Dashboard@boatOwners');
Route::get('/owners/{id}', 'HBR_Dashboard@ownerLeads');
Route::get('/excel/download/{link}', 'HBR_Dashboard@downloadExcel');
Route::post('/delete', 'HBR_Dashboard@delete');
Route::post('/payment', 'HBR_Dashboard@payment');
Route::get('/hit', function(){
    event(new \App\Events\NotifyAll([
        'event' => 'not-test',
        'msg' => 'Mahmud Abdur Rahman is testing the system.',
        'tos' => [10 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9]
    ]));
    return 'Event was fired!!';
});

Auth::routes();
