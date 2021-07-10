<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\KategoriServiceController;
use App\Http\Controllers\bengkel\BengkelController;
use App\Http\Controllers\bengkel\profilengkelController;
use App\Http\Controllers\pelanggan\PelangganController;






// Route::get('/', function () {
//     return view('welcome');
// });



/* Admin */
Route::get('/dashboard_admin', 'admin\AdminController@index');
Route::get('/admin/register', 'admin\AdminController@register')->name('register');
Route::post('/admin/postregister', 'admin\AdminController@postregister')->name('registeradmin');
Route::get('/admin/login', 'admin\AdminController@loginadmin')->name('loginadmin');
Route::post('/admin/postlogin', 'admin\AdminController@postlogin')->name('loginadmin');
Route::get('/admin/logout', 'admin\AdminController@logout')->name('logoutadmin');
/* Admin / kelola bengkel service */
Route::resource('/kategoriservice', admin\KategoriServiceController::class);
Route::get('/admin/penggunabengkel', 'admin\PenggunabengkelController@index')->name('penggunabengkel');
Route::delete('/admin/penggunabengkel/hapus/{id}', 'admin\PenggunabengkelController@destroy')->name('penggunabengkelhapus');
/* Admin / kelola pelanggan */
Route::get('/admin/pelangganservice', 'admin\PelangganserviceController@index')->name('pelangganservice');
Route::delete('/admin/pelangganservice/hapus/{id}', 'admin\pelangganserviceController@destroy')->name('pelangganservicehapus');

/* pelanggan */
Route::get('/', 'pelanggan\PelangganController@index')->name('pelanggan.index');
Route::post('/registerpelanggan', 'pelanggan\PelangganController@postRegister')->name('registerPelanggan');
Route::post('/loginpelanggan', 'pelanggan\PelangganController@postLogin')->name('loginPelanggan');
Route::get('/logoutpelanggan', 'pelanggan\PelangganController@logout')->name('logoutPelanggan');
route::get('/caribengkel', 'pelanggan\PelangganController@caribengkel')->name('caribengkel');
// route::get('/caribengkelindex', 'pelanggan\PelangganController@caribengkelindex')->name('caribengkelindex');
route::get('/status', 'pelanggan\PelangganController@status')->name('statusservice');
route::get('/formpemesanan/{id}', 'pelanggan\PelangganController@formpemesanan')->name('formpemesanan');

Route::post('/buat-pesanan', 'pelanggan\PesananController@buatPesanan')->name('pelanggan.pesan');


/* Bengkel Service */
Route::get('/dashboard', 'Bengkel\BengkelController@index')->name('dashboard');
Route::get('/register', 'bengkel\BengkelController@register')->name('register');
Route::post('/postregister', 'bengkel\BengkelController@postregister')->name('registerbengkel');
Route::get('/login', 'bengkel\BengkelController@loginbengkel')->name('loginbengkel1');
Route::post('/postlogin', 'bengkel\BengkelController@postlogin')->name('loginbengkel');
Route::get('/logoutbengkel', 'bengkel\BengkelController@logout')->name('logoutbengkel');
Route::get('/profil', 'bengkel\profilbengkelController@profil')->name('bengkelprofil');
Route::get('/daftarpemesanan', 'bengkel\BengkelController@daftarPemesanan')->name('daftarpemesanan');
Route::get('/editpesanan/{id}', 'bengkel\BengkelController@editPesanan')->name('editpesanan');
Route::post('/updatepesanan', 'bengkel\BengkelController@updatePesanan')->name('updatepesanan');
Route::post('/estimasibiaya', 'bengkel\BengkelController@estimasiBiaya')->name('estimasiBiaya');
Route::get('/editbiaya/{id}', 'bengkel\BengkelController@editBiaya')->name('editBiaya');
Route::post('/updateBiaya', 'bengkel\BengkelController@updateBiaya')->name('updatebiaya');
Route::delete('/hapusBiaya/{id}', 'bengkel\BengkelController@hapusBiaya')->name('hapusbiaya');

// Route::get('/status', function () {
//         return view('pelanggan.pages.status');
//     });