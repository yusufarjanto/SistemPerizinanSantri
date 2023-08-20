<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\KuotaIzinController;
use App\Http\Controllers\KelasController; 



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AdminController::class,'index'])->name('index')->middleware('auth');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login/action',[LoginController::class, 'action_login'])->name('actionlogin');
route::get('/login/logout', [LoginController::class, 'action_logout'])->name('actionlogout');
// PERIZINAN
// Route::get('/perizinan', [AdminController::class,'perizinan'])->name('perizinan')->middleware('auth');
// Route::get('/perizinan/simpan', [AdminController::class, 'tambahizin'])->name('tambahizin')->middleware('auth');
// Route::post('/simpanizin', [AdminController::class,'simpanizin'])->name('simpanizin')->middleware('auth');
// Route::get('/izin/edit/{id}', [AdminController::class,'editizin'])->name('editizin')->middleware('auth');
// Route::post('/izin/update', [AdminController::class,'update'])->name('update')->middleware('auth');
// Route::get('/izin/hapus/{id}',[AdminController::class,'hapusizin'])->name('hapusizin')->middleware('auth');

//TAMPIL SANTRI
Route::get('/santri', [SantriController::class,'santri'])->name('santri')->middleware('auth');

//CETAK
Route::get('perizinan/cetak', [AdminController::class, 'cetakperizinan'])->name('cetakperizinan')->middleware('auth');

//TAMPIL ORANG TUA
Route::get('orangtua', [OrangTuaController::class,'index'])->name('orangtua')->middleware('auth');

//TAMPIL USER
Route::get('user', [UserController::class,'index'])->name('user')->middleware('auth');

//TAMPIL ROLE
Route::get('role', [UserController::class,'role'])->name('role')->middleware('auth');

//PERIZINAN
Route::get('/perizinan', [PerizinanController::class,'perizinan'])->name('perizinan')->middleware('auth');
Route::get('/tambahizin', [PerizinanController::class,'add'])->name('add')->middleware('auth');
Route::get('/perizinan/tambahizin/{id}', [PerizinanController::class,'tambahizin'])->name('tambahizin')->middleware('auth');
Route::post('/perizinan/update_jenis', [PerizinanController::class,'updatejenis'])->name('updatejenis')->middleware('auth');
Route::get('/perizinan/jadwal_izin/{id}', [PerizinanController::class,'jadwalizin'])->name('jadwalizin')->middleware('auth');
Route::post('/perizinan/update_jadwal', [PerizinanController::class,'updatejadwal'])->name('updatejadwal')->middleware('auth');
Route::get('/perizinan/pengikut/{id}', [PerizinanController::class,'pengikut'])->name('pengikut')->middleware('auth');

Route::get('/perizinan/hapus/{id}', [PerizinanController::class,'hapus'])->name('hapus')->middleware('auth');





//TAHUN AJARAN
Route::get('/tahunajaran', [TahunAjaranController::class,'tampiltahunajaran'])->name('tampiltahunajaran')->middleware('auth');
Route::get('/tambahtahunajaran', [TahunAjaranController::class,'tambahtahunajaran'])->name('tambahtahunajaran')->middleware('auth');
Route::post('tahunajaran/simpantahunajaran', [TahunAjaranController::class,'simpantahunajaran'])->name('simpantahunajaran')->middleware('auth');

Route::get('/tahunajaran/delete/{id}', [TahunAjaranController::class,'delete'])->name('delete')->middleware('auth');
Route::get('/tahunajaran/edit/{id}', [TahunAjaranController::class,'edittahunajaran'])->name('edittahunajaran')->middleware('auth');
Route::post('/tahunajaran/update', [TahunAjaranController::class,'updatetahunajaran'])->name('updatetahunajaran')->middleware('auth');

//KUOTA IZIN
Route::get('kuotaizin', [KuotaIzinController::class,'kuotaizin'])->name('kuotaizin')->middleware('auth');
Route::get('kuotaizin/tambah', [KuotaIzinController::class,'createkuotaizin'])->name('createkuotaizin')->middleware('auth');
Route::post('kuotaizin/save', [KuotaIzinController::class,'savekuotaizin'])->name('savekuotaizin')->middleware('auth');
Route::get('kuota/delete/{id}', [KuotaIzinController::class,'hapus'])->name('hapuskuota')->middleware('auth');
Route::get('kuota/edit/{id}', [KuotaIzinController::class,'editkuota'])->name('editkuota')->middleware('auth');
Route::post('kuota/update', [KuotaIzinController::class,'updatekuota'])->name('updatekuota')->middleware('auth');

//KELAS
Route::get('kelas', [KelasController::class,'showkelas'])->name('showkelas')->middleware('auth');
Route::get('tambahkelas', [KelasController::class,'createclass'])->name('createclass')->middleware('auth');
Route::post('saveclass', [KelasController::class,'saveclass'])->name('saveclass')->middleware('auth');

Route::get('kelas/delete/{id}', [KelasController::class,'deleteclass'])->name('deleteclass')->middleware('auth');
Route::get('kelas/edit/{id}', [KelasController::class,'editclass'])->name('editclass')->middleware('auth');
Route::post('kelas/update', [KelasController::class,'updateclass'])->name('updateclass')->middleware('auth');
