<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeBanner;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Projects\IncomingProjectController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\Projects\PastProjectController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\DonationDetailController;
use App\Http\Controllers\News\CaknaInsanMalaysia;
use App\Http\Controllers\News\CaknaInsanMalaysiaNewsController;
use App\Http\Controllers\News\DomesticNewsController;
use App\Http\Controllers\News\GlobalNewsController;
use App\Http\Controllers\Projects\ProjectDetail;
use Illuminate\Support\Facades\Artisan;
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

Route::prefix('/news')->name('news.')->group( function () {
    Route::get('/global', [GlobalNewsController::class, 'index'])->name('global');
    Route::get('/domestic', [DomesticNewsController::class, 'index'])->name('domestic');
    Route::get('/cakna-insan-malaysia', [CaknaInsanMalaysiaNewsController::class, 'index'])->name('cakna_insan_malaysia');
    Route::get('/cakna-insan-malaysia/{newsDetail}', [CaknaInsanMalaysiaNewsController::class, 'caknaNewsDetails'])->name('cakna_insan_malaysia_details');
});

Route::get('/about-us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/symlink', function () {
        Artisan::call('storage:link');
    });

    Route::get('/migrate', function () {
        Artisan::call('migrate');
    });

    Route::get('/symlink_public', function () {
        $targetDir = '/home6/caknains/cakna_insan/public';
        $linkDir = '/home6/caknains/public_test';

        $command = "ln -nfs $targetDir $linkDir";
        $output = [];
        $returnValue = 0;

        exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            return 'Error creating symbolic link: ' . implode("\n", $output);
        } else {
            return 'Symbolic link created successfully.';
        }
    });

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(HomeBanner::class)->prefix('/banner')->name('banner.')->group(function () {
        Route::get('/index', 'index')->name('index');
    });

    Route::prefix('/donation')->name('donation.')->group( function () {
        Route::get('/donation-progress', [DonationController::class, 'index'])->name('donation-progress');

        Route::get('/donation-detail', [DonationDetailController::class, 'index'])->name('donation-detail');
    });

    Route::controller(ProjectController::class)->prefix('/project')->name('project.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/add-project', 'addProject')->name('add');
        Route::get('/edit-project/{project}', 'editProject')->name('edit');

        Route::get('/banner', 'banner')->name('banner');
    });

    Route::controller(PosterController::class)->prefix('/poster')->name('poster.')->group(function () {
        Route::get('/index', 'index')->name('index');
    });

    Route::controller(NewsController::class)->prefix('/news')->name('news.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/add-news', 'addNews')->name('add');
        Route::get('/edit-news/{newsDetail}', 'editNews')->name('edit');
        Route::get('/edit-news-images/{newsDetail}', 'editNewsImages')->name('edit-images');
    });

    Route::controller(ImagesController::class)->prefix('/images')->name('images.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/edit-images/{project}', 'editImages')->name('edit');
    });
});
