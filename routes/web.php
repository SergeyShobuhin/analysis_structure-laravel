<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestRequest;
use App\Http\Controllers\TestMessage;
use App\Http\Controllers\ArrayTest;
use App\Http\Controllers\TextController;

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
});

//Route::get('/show-message/{iterations}', [TestMessage::class, 'showMessage'])->name('show-message');
//
//Route::get('/test-array',[TestRequest::class, 'testGet']);
//Route::post('/test-array',[TestRequest::class, 'testPost']);
//
//Route::get('/array-color', [ArrayTest::class, 'showColor']);

Route::get('/telegraph', [TextController::class, 'index']);
Route::get('/storages', [TextController::class, 'listPublication'])->name('storage.listPublication');
Route::post('/storages', [TextController::class, 'addPublication'])->name('storage.addPublication');
Route::put('/storages/{id}', [TextController::class, 'updatePublication'])->name('storage.updatePublication');
Route::delete('/storages/{id}', [TextController::class, 'deletePublication'])->name('storage.deletePublication');
//Route::get('/storages', [TextController::class, 'listPublication']);

