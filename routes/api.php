<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [ApiController::class,'login']);

//JENIS IZIN API CODE
Route::post('jenisizin/tambah', [ApiController::class,'createjenisizin']);
Route::get('jenisizin/show', [ApiController::class,'showjenisizin']);
Route::post('jenisizin/delete', [ApiController::class,'delete']);
Route::post('jenisizin/update', [ApiController::class,'updatejenisizin']);

//KELAS API CODE
Route::post('kelas/tambah', [ApiController::class,'createclass']);
Route::get('kelas/show', [ApiController::class,'showclass']);
Route::post('kelas/delete', [ApiController::class,'deleteclass']);
Route::post('class/update', [ApiController::class,'updateclass']);

//ROUTE PARENTS
Route::get('orangtua', [ApiController::class,'showortu']);
Route::post('orangtua/create', [ApiController::class,'createparent']);
Route::post('orangtua/update', [ApiController::class,'updateparent']);
Route::post('orangtua/delete', [ApiController::class,'deleteparent'])->name('deleteparent');

//PERMISSION ROUTES
Route::get('permission/show', [ApiController::class,'showpermission']);
