<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\KategoriServiceController;
use App\Http\Controllers\bengkel\BengkelController;
use App\Http\Controllers\bengkel\profilengkelController;
use App\Http\Controllers\pelanggan\PelangganController;
use App\Events\notif;





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
/* Admin / kelola data transaksi */
Route::get('/admin/datatransaksi', 'admin\AdminController@datatransaksi')->name('datatransaksi');

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
route::get('/riwayatpemesanan', 'pelanggan\PelangganController@riwayatpemesanan')->name('riwayatpemesanan');
route::get('/tentang', 'pelanggan\PelangganController@tentang')->name('tentang');
route::get('/lupapassword', 'pelanggan\PelangganController@forgotpassword')->name('forgotpassword');
route::post('/lupapassword', 'pelanggan\PelangganController@postforgotpwd')->name('postpwd');
Route::get('/reset-password/{token}/{email}', 'pelanggan\PelangganController@getPassword')->name('getPassword');
Route::post('/reset-password', 'pelanggan\PelangganController@updatePassword')->name('updatePassword');



/* Bengkel Service */
Route::get('/dashboard', 'Bengkel\BengkelController@index')->name('dashboard');
Route::get('/register', 'bengkel\BengkelController@register')->name('register');
Route::post('/postregister', 'bengkel\BengkelController@postregister')->name('registerbengkel');
Route::get('/login', 'bengkel\BengkelController@loginbengkel')->name('loginbengkel1');
Route::post('/postlogin', 'bengkel\BengkelController@postlogin')->name('loginbengkel');
Route::get('/logoutbengkel', 'bengkel\BengkelController@logout')->name('logoutbengkel');
Route::get('/profil', 'bengkel\profilbengkelController@profil')->name('bengkelprofil');
Route::get('/editprofil', 'bengkel\profilbengkelController@editprofil')->name('editbengkelprofil');
Route::post('/updateprofil/{id}', 'bengkel\profilbengkelController@updateprofil')->name('updatebengkelprofil');
Route::get('/gantipassword', 'bengkel\profilbengkelController@gantipassword')->name('gantipassword');
Route::post('/updatepassword', 'bengkel\profilbengkelController@updatepassword')->name('updatepassword');

Route::get('/daftarpemesanan', 'bengkel\BengkelController@daftarPemesanan')->name('daftarpemesanan');
Route::get('/editpesanan/{id}', 'bengkel\BengkelController@editPesanan')->name('editpesanan');
Route::post('/updatepesanan', 'bengkel\BengkelController@updatePesanan')->name('updatepesanan');
Route::post('/estimasibiaya', 'bengkel\BengkelController@estimasiBiaya')->name('estimasiBiaya');
Route::get('/editbiaya/{id}', 'bengkel\BengkelController@editBiaya')->name('editBiaya');
Route::post('/updateBiaya', 'bengkel\BengkelController@updateBiaya')->name('updatebiaya');
Route::delete('/hapusBiaya/{id}', 'bengkel\BengkelController@hapusBiaya')->name('hapusbiaya');
Route::delete('/hapuspesanan/{id}', 'bengkel\BengkelController@hapusPesanan')->name('hapuspesanan');
Route::get('/riwayatpesanan', 'bengkel\BengkelController@riwayatpesanan')->name('riwayatpesanan');
// Route::get('/daftartransaksi', 'bengkel\BengkelController@daftartransaksi')->name('daftartransaksi');


// Route::get('/test-notif', function(){
//     $data = [
//         'kode_pemesanan' => mt_rand(1111, 9999),
//             'nama_pemesan' => 'Cindol',
//             'no_wa' => '86758475847',
//             'tanggal_pemesanan' => '2929-23-12',
//             'kecamatan' => 'Tegal timur',
//             'kelurahan' => 'Kejambon',
//             'alamat' => 'Bonkgo',
//             'id_bengkel_service' => '1',
//             'id_pelanggan' => 1,
//             'informasi_tambahan' => 'laka',  
//         ];
//     event(new notif($data));
//     return "Sucess";
// });