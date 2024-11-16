<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

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
})->name('home')->middleware('isLogin');

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

// GET -> READ
// POST -> CREATE
// PUT -> UPDATE
// DELETE -> DELETE

Route::get('/getdata', [ProfileController::class, 'getData'])->name('read_data_to_profile'); // READ
Route::post('/postdata', [ProfileController::class, 'postData'])->name('create_data'); // CREATE
Route::delete('/deletedata/{id}', [ProfileController::class, 'deleteData'])->name('delete_data'); // DELETE
Route::put('/putdata/{id}', [ProfileController::class, 'putData'])->name('update_data'); // UPDATE

Route::post('/process_login', [LoginController::class, 'login'])->name('process_login');
Route::get('/process_logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/process_register', [LoginController::class, 'register'])->name('process_register');