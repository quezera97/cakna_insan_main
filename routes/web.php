<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contact-us', function () {
    return view('contact_us');
})->name('contact_us');

Route::get('/join-us', function () {
    return view('join_us');
})->name('join_us');

Route::get('/donation', function () {
    return view('donation.general_donation');
})->name('general_donation');

Route::get('/about-us', function () {
    return view('about_us');
})->name('about_us');
