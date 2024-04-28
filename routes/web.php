<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\IncomingProjectController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\PastProjectController;
use App\Http\Controllers\ProjectDetail;
use App\Models\IncomingProject;
use App\Models\PastProject;
use App\Models\Project;
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

Route::get('/incoming-project', [IncomingProjectController::class, 'index'])->name('incoming_project');
Route::get('/past-project', [PastProjectController::class, 'index'])->name('past_project');
Route::get('/project-detail/{project}', [ProjectDetail::class, 'index'])->name('project_detail');
Route::get('/donation/{project?}', [DonationController::class, 'index'])->name('donation');

Route::get('/about-us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
