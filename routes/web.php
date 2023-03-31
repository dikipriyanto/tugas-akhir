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
Route::get('/dashboard_admin', 'admin\AdminController@index')->name('dashboardindex');
Route::get('/admin/register', 'admin\AdminController@register')->name('register');
Route::post('/admin/postregister', 'admin\AdminController@postregister')->name('registeradmin');
Route::get('/admin/login', 'admin\AdminController@loginadmin')->name('loginadmin');
Route::post('/admin/postlogin', 'admin\AdminController@postlogin')->name('loginadmin');
Route::get('/admin/logout', 'admin\AdminController@logout')->name('logoutadmin');
/* Admin / kelola bengkel service */
Route::resource('/kategoriservice', admin\KategoriServiceController::class);

/* Admin / Edit Profile*/
Route::get('/admin/editadmin', 'admin\AdminController@editadmin')->name('editadmin');
Route::post('/admin/editadmin', 'admin\AdminController@editadminupdate')->name('editadminupdate');


/* Admin / masalahservice service */
Route::get('/masalahservice', 'admin\KategoriServiceController@masalahindex')->name('masalah');
Route::get('/masalahcreate', 'admin\KategoriServiceController@masalahcreate')->name('masalahcreate');
Route::get('/masalahstore', 'admin\KategoriServiceController@masalahstore')->name('masalahstore');
Route::get('/masalahedit/{id}', 'admin\KategoriServiceController@masalahedit')->name('masalahedit');
Route::post('/masalah/update/{id}', 'admin\KategoriServiceController@masalahupdate')->name('masalahupdate');
Route::DELETE('/masalah/hapus/{id}', 'admin\KategoriServiceController@masalahhapus')->name('masalahhapus');
/* Admin / jenisservice service */
Route::get('/jenisservice', 'admin\KategoriServiceController@jenisindex')->name('jenis');
Route::get('/jeniscreate', 'admin\KategoriServiceController@jeniscreate')->name('jeniscreate');
Route::get('/jenisstore', 'admin\KategoriServiceController@jenisstore')->name('jenisstore');
Route::get('/jenisedit/{id}', 'admin\KategoriServiceController@jenisedit')->name('jenisedit');
Route::post('/jenis/update/{id}', 'admin\KategoriServiceController@jenisupdate')->name('jenisupdate');
Route::DELETE('/jenis/hapus/{id}', 'admin\KategoriServiceController@jenishapus')->name('jenishapus');
/* Admin / Merek service */
Route::get('/merekservice', 'admin\KategoriServiceController@merekindex')->name('merek');
Route::get('/merekcreate', 'admin\KategoriServiceController@merekcreate')->name('merekcreate');
Route::get('/merekstore', 'admin\KategoriServiceController@merekstore')->name('merekstore');
Route::get('/merekedit/{id}', 'admin\KategoriServiceController@merekedit')->name('merekedit');
Route::post('/merek/update/{id}', 'admin\KategoriServiceController@merekupdate')->name('merekupdate');
Route::DELETE('/merek/hapus/{id}', 'admin\KategoriServiceController@merekhapus')->name('merekhapus');

Route::get('/admin/penggunabengkel', 'admin\PenggunabengkelController@index')->name('penggunabengkel');
Route::delete('/admin/penggunabengkel/hapus/{id}', 'admin\PenggunabengkelController@destroy')->name('penggunabengkelhapus');
Route::post('/admin/penggunabengkel/updatestatus', 'admin\PenggunabengkelController@updatestatus')->name('updatestatus');
/* Admin / kelola pelanggan */
Route::get('/admin/pelangganservice', 'admin\PelangganserviceController@index')->name('pelangganservice');
Route::delete('/admin/pelangganservice/hapus/{id}', 'admin\pelangganserviceController@destroy')->name('pelangganservicehapus');
Route::post('/admin/pelangganservice/updatestatus', 'admin\PelangganserviceController@updatestatus')->name('updatestatuspelanggan');
/* Admin / kelola data transaksi */
Route::get('/admin/datatransaksi', 'admin\AdminController@datatransaksi')->name('datatransaksi');
route::get('/searchtanggal', 'admin\AdminController@searchtanggal')->name('searchtanggal');




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
Route::post('/addrating', 'pelanggan\PelangganController@addRating')->name('addRating');
route::get('/searchbengkel', 'pelanggan\PelangganController@searchbengkel')->name('searchbengkel');


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
route::get('/lupapasswordbengkel', 'bengkel\BengkelController@forgotpasswordbengkel')->name('forgotpasswordbengkel');
route::post('/lupapasswordbengkel', 'bengkel\BengkelController@postforgotpwdbengkel')->name('postpwdbengkel');
Route::get('/reset-password-bengkel/{token}/{email}', 'bengkel\BengkelController@getPasswordbengkel')->name('getPasswordbengkel');
Route::post('/reset-password-bengkel', 'Bengkel\BengkelController@updatePasswordbengkel')->name('updatePasswordBengkel');
Route::get('/verif-registrasi/{token}/{email}', 'bengkel\BengkelController@verifyBengkel')->name('getverifybengkel');

Route::get('/daftarpemesanan', 'bengkel\BengkelController@daftarPemesanan')->name('daftarpemesanan');
Route::get('/editpesanan/{id}', 'bengkel\BengkelController@editPesanan')->name('editpesanan');
Route::post('/updatepesanan', 'bengkel\BengkelController@updatePesanan')->name('updatepesanan');
Route::post('/estimasibiaya', 'bengkel\BengkelController@estimasiBiaya')->name('estimasiBiaya');
Route::get('/editbiaya/{id}', 'bengkel\BengkelController@editBiaya')->name('editBiaya');
Route::post('/updateBiaya', 'bengkel\BengkelController@updateBiaya')->name('updatebiaya');
Route::delete('/hapusBiaya/{id}', 'bengkel\BengkelController@hapusBiaya')->name('hapusbiaya');
Route::delete('/hapuspesanan/{id}', 'bengkel\BengkelController@hapusPesanan')->name('hapuspesanan');
Route::get('/daftartransaksi', 'bengkel\BengkelController@daftartransaksi')->name('daftartransaksi');
Route::post('/daftartransaksi', 'bengkel\BengkelController@daftartransaksi')->name('daftartransaksi');
Route::get('/searchtable', 'bengkel\BengkelController@searchtable')->name('searchtable');

Route::post("/close-order", 'bengkel\BengkelController@closeOrder')->name('closeOrder');


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