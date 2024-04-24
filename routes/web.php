<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\JoinUsController;
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

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact_us');
Route::get('/join-us', [JoinUsController::class, 'index'])->name('join_us');

Route::get('/donation', function () {
    return view('donation.general_donation');
})->name('general_donation');

Route::get('/detail-donation', function () {
    return view('donation.detail_donation');
})->name('detail_donation');

Route::get('/about-us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/incoming-project', function () {
    return view('project.incoming_project');
})->name('incoming_project');

Route::get('/past-project', function () {
    return view('project.past_project');
})->name('past_project');

Route::get('/project-detail', function () {
    return view('project.project_detail');
})->name('project_detail');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');
