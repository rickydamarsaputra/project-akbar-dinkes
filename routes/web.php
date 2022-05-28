<?php

use App\Exports\BarangKeluarExport;
use App\Exports\BarangMasukExport;
use App\Exports\MutasiBarangExport;
use App\Exports\RekeningExport;
use App\Exports\ReportExcel;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MutasiBarangController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::view('/', 'pages.auth.landing')->name('landing.view');
    Route::get('/login', 'loginView')->name('login.view');
    Route::post('/login', 'loginAction')->name('login.action');
    Route::get('/logout', 'logoutAction')->name('logout.action');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // user route
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'createView')->name('create.view');
        Route::post('/create', 'createAction')->name('create.action');
        Route::get('/update/{id}', 'updateView')->name('update.view');
        Route::put('/update/{id}', 'updateAction')->name('update.action');
        Route::get('/delete/{id}', 'delete')->name('delete.action');
        Route::get('/datatables', 'datatables')->name('datatables');
    });

    // penyedia route
    Route::controller(PenyediaController::class)->prefix('penyedia')->name('penyedia.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'createView')->name('create.view');
        Route::post('/create', 'createAction')->name('create.action');
        Route::get('/update/{id}', 'updateView')->name('update.view');
        Route::put('/update/{id}', 'updateAction')->name('update.action');
        Route::get('/detail/{id}', 'detail')->name('detail.view');
        Route::get('/delete/{id}', 'delete')->name('delete.action');
        Route::get('/datatables', 'datatables')->name('datatables');
    });

    // rekening route
    Route::controller(RekeningController::class)->prefix('rekening')->name('rekening.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'createView')->name('create.view');
        Route::post('/create', 'createAction')->name('create.action');
        Route::get('/update/{id}', 'updateView')->name('update.view');
        Route::put('/update/{id}', 'updateAction')->name('update.action');
        Route::get('/detail/{id}', 'detail')->name('detail.view');
        Route::get('/delete/{id}', 'delete')->name('delete.action');
        Route::get('/datatables', 'datatables')->name('datatables');
    });

    // barang masuk route
    Route::controller(BarangMasukController::class)->prefix('barang-masuk')->name('barang-masuk.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'createView')->name('create.view');
        Route::post('/create', 'createAction')->name('create.action');
        Route::get('/update/{id}', 'updateView')->name('update.view');
        Route::put('/update/{id}', 'updateAction')->name('update.action');
        Route::get('/detail/{id}', 'detail')->name('detail.view');
        Route::get('/delete/{id}', 'delete')->name('delete.action');
        Route::get('/datatables', 'datatables')->name('datatables');
    });

    // barang keluar route
    Route::controller(BarangKeluarController::class)->prefix('barang-keluar')->name('barang-keluar.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'createView')->name('create.view');
        Route::post('/create', 'createAction')->name('create.action');
        Route::get('/update/{id}', 'updateView')->name('update.view');
        Route::put('/update/{id}', 'updateAction')->name('update.action');
        Route::get('/detail/{id}', 'detail')->name('detail.view');
        Route::get('/delete/{id}', 'delete')->name('delete.action');
        Route::get('/datatables', 'datatables')->name('datatables');
    });

    // mutasi barang route
    Route::controller(MutasiBarangController::class)->prefix('mutasi-barang')->name('mutasi-barang.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'createView')->name('create.view');
        Route::post('/create', 'createAction')->name('create.action');
        Route::get('/update/{id}', 'updateView')->name('update.view');
        Route::put('/update/{id}', 'updateAction')->name('update.action');
        Route::get('/detail/{id}', 'detail')->name('detail.view');
        Route::get('/delete/{id}', 'delete')->name('delete.action');
        Route::get('/datatables', 'datatables')->name('datatables');
    });

    // export report route
    Route::prefix('export')->name('export.')->group(function () {
        Route::get('/barang-masuk', function () {
            $file_name = 'barang-masuk-' . time() . '.xlsx';
            return (new BarangMasukExport)->download($file_name);
        })->name('barang.masuk');
        Route::get('/barang-keluar', function () {
            $file_name = 'barang-keluar-' . time() . '.xlsx';
            return (new BarangKeluarExport)->download($file_name);
        })->name('barang.keluar');
        Route::get('/rekening', function () {
            $file_name = 'rekening-' . time() . '.xlsx';
            return (new RekeningExport)->download($file_name);
        })->name('rekening');
    });
    Route::get('/export-report', function () {
        $file_name = 'report-excel-' . date('dmy') . '.xlsx';
        return (new ReportExcel)->download($file_name);
    })->name('export-report');
});
