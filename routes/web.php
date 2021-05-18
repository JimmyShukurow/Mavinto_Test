<?php

use App\Http\Controllers\HomPageController;
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

Route::get('/', [HomPageController::class, 'index']);

//Import data to db
Route::post('/importData',  [HomPageController::class, 'importData'])->name('import-data-toDb');