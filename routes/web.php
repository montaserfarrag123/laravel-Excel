<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageUserController;
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

Route::get('users/data' , [ManageUserController::class,'index']);
Route::post('users/import' , [ManageUserController::class,'import']);
Route::get('users/export/', [ManageUserController::class, 'export']);
