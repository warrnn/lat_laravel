<?php

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
});

Route::get('/profile', function () {
    return view('profile');
});

// GET -> READ
// POST -> CREATE
// PUT -> UPDATE
// DELETE -> DELETE

Route::get('/getdata', [ProfileController::class, 'getData'])->name('read_data_to_profile'); // READ
Route::post('/postdata', [ProfileController::class, 'postData'])->name('create_data'); // CREATE
Route::delete('/deletedata/{id}', [ProfileController::class, 'deleteData'])->name('delete_data'); // DELETE
Route::put('/putdata/{id}', [ProfileController::class, 'putData'])->name('update_data'); // UPDATE