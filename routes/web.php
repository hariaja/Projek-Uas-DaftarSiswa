<?php

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

// FrontEnd Controller
Route::get('/', 'SiteController@home');
Route::get('register', 'SiteController@register');
Route::get('about', 'SiteController@about');
Route::post('post/register', 'SiteController@post_register');

Route::get('login', 'AuthController@login')->name('login');
Route::post('login/proses', 'AuthController@prosesLogin');
Route::get('logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'Permissions:Admin,Siswa,Guru']], function () {
    Route::get('dashboard', 'DashboardController@dashboard');
    // Route Yang Mengatur Informasi Kelas
    Route::get('kelas', 'KelasController@index');
    // Route Yang Mengatur Halaman mapel
    Route::get('mapel', 'MapelController@index');
});

Route::group(['middleware' => ['auth', 'Permissions:Admin,Guru']], function () {
    // Halaman Profile Admin
    Route::get('lihat/{id}/profile-admin', 'AdminController@profile');
    // Halaman Siswa
    Route::get('siswa', 'SiswaController@index');
    Route::get('siswa/tambah-siswa', 'SiswaController@create');
    Route::post('siswa/tambah-siswa/proses', 'SiswaController@store');
    Route::get('siswa/{siswa}/detail', 'SiswaController@show');
    Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
    Route::post('siswa/{siswa}/update', 'SiswaController@update');
    Route::get('siswa/{siswa}/delete', 'SiswaController@destroy');
    Route::post('siswa/{id}/tambah-nilai', 'SiswaController@input');
    Route::get('siswa/{siswa}/{idmapel}/delete-nilai', 'SiswaController@deleteNilai');
    Route::get('siswa/export', 'SiswaController@exportExcel');
    Route::get('siswa/exportpdf', 'SiswaController@exportPDF');

    // Halaman Yang Mengatur Halaman Guru
    Route::get('guru', 'GuruController@index');
    Route::get('guru/tambah-guru', 'GuruController@create');
    Route::post('guru/tambah-guru/proses', 'GuruController@store');
    Route::get('guru/{id}/detail', 'GuruController@show');
    Route::get('guru/{id}/edit', 'GuruController@edit');
    Route::post('guru/{id}/update', 'GuruController@update');
    Route::get('guru/{id}/delete', 'GuruController@destroy');

    // Route Yang Mengatur Informasi Kelas
    // Route::get('kelas', 'KelasController@index');
    Route::post('kelas/tambah-kelas', 'KelasController@store');
    Route::get('kelas/{ruangan}/edit', 'KelasController@edit');
    Route::post('kelas/{ruangan}/update', 'KelasController@update');
    Route::get('kelas/{ruangan}/delete', 'KelasController@destroy');

    // Route Yang Mengatur Halaman mapel
    // Route::get('mapel', 'MapelController@index');
    Route::post('mapel/tambah-mapel', 'MapelController@store');
    Route::get('mapel/{mapel}/edit', 'MapelController@edit');
    Route::post('mapel/{mapel}/update', 'MapelController@update');
    Route::get('mapel/{mapel}/delete', 'MapelController@destroy');

    // Posts Route
    Route::get('posts', 'PostController@index')->name('post.index');
    Route::get('posts/add', [
        'uses' => 'PostController@create',
        'as' => 'post.add'
    ]);
    Route::post('posts/store', [
        'uses' => 'PostController@store',
        'as' => 'post.add.data'
    ]);

    Route::get('posts/{id}/delete', [
        'uses' => 'PostController@destroy',
        'as' => 'post.delete'
    ]);
});

Route::group(['middleware' => ['auth', 'Permissions:Admin,Siswa']], function () {
    // Route Profile
    Route::get('lihat/{siswa}/profile-siswa', 'SiswaController@show');
    Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
    Route::post('siswa/{siswa}/update', 'SiswaController@update');
});

Route::group(['middleware' => ['auth', 'Permissions:Admin,Guru']], function () {
    // Route Halaman Siswa
    Route::get('siswa', 'SiswaController@index');
    Route::get('siswa/{siswa}/detail', 'SiswaController@show');
    Route::get('lihat/{siswa}/profile-siswa', 'SiswaController@show');
    // Route Guru
    Route::get('lihat/{id}/profile-guru', 'GuruController@show');
    Route::get('guru/{id}/edit', 'GuruController@edit');
    Route::post('guru/{id}/update', 'GuruController@update');
});

Route::get('/{slug}', [
    'uses' => 'SiteController@singlePost',
    'as' => 'site.single.post'
]);
