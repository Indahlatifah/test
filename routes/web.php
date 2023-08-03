<?php

//use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\KamsisdalController;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\DireksiController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

// Route::get('/login', function () {
//     return view('login/index', [
//         "title" => "login"
//     ]);
// });

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/statistic', function () {
    return view('/partials/statistic', [
        "title" => "Statistik"
    ]);
});



Route::get('/index', function () {
    return view('index', [
        "title" => "index"
    ]);
});

Route::get('/admin', function () {
    return view('admin', [
        "title" => "admin"
    ]);
});
Route::get('/adm', function () { 
    return view('admin/v_admin'); 
});
Route::get('/admin_control', function () { 
    return view('admin/admin_control'); 
});
Route::get('/create_account', function () { 
    return view('admin/create_account'); 
});
Route::get('/edit', function () { 
    return view('admin/edit'); 
});
Route::get('/pengaduan', function () { 
    return view('admin/pengaduan'); 
});
Route::get('/detail', function () { 
    return view('admin/detail_pengaduan'); 
});
Route::get('profile', function () { 
    return view('admin/profile'); 
});
Route::get('edit_profil', function () { 
    return view('admin/edit_profile'); 
});
/*
Route::prefix('admin')->group(function()
{
    Route::get('/login', 'Admin\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/','Admin\AdminLoginController@index')->name('admin.dashboard')->middleware('admin');
});
*/

/*Login*/
    Route::get('/login', [LoginController::class, 'index' ])->name('login')->middleware('guest');  
    Route::post('/login', [LoginController::class, 'login']);  
/*------*/

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:mahasiswa'])->group(function () 
{
    Route::get('/mhs/mhsdb', [MahasiswaController::class, 'index'])->name('mhs.db');
    Route::get('/mahasiswa/pengaduan', [MahasiswaController::class, 'MhsPengaduan'])->name('mahasiswa.pengaduan');    
    Route::get('/mahasiswa/profil', [MahasiswaController::class, 'MhsProfil'])->name('mahasiswa.profil');    
    Route::get('/mahasiswa/edit_profil', [MahasiswaController::class, 'MhsEditprofil'])->name('mahasiswa.editprofil');
});

Route::middleware(['auth', 'user-access:superadmin'])->group(function () 
{
    Route::get('/superadmin/dashboard', [DashboardController::class, 'Superadmindb'])->name('superadmin.home');
    Route::get('/superadmin/daftarakun', [DashboardController::class, 'Superadmindpakun'])->name('superadmin.dpakun');
    Route::get('/superadmin/pengaduan', [DashboardController::class, 'SuperPengaduan'])->name('superadmin.pengaduan');    
    Route::get('/superadmin/buatakun', [DashboardController::class, 'Supercracc'])->name('superadmin.buatakun');    
    Route::get('/superadmin/detail', [DashboardController::class, 'Superdtpengaduan'])->name('superadmin.dtpengaduan');
    Route::get('/superadmin/edit', [DashboardController::class, 'SuperEdit'])->name('superadmin.edit');    
    Route::get('/superadmin/profil', [DashboardController::class, 'SuperProfil'])->name('superadmin.profil');    
    Route::get('/superadmin/edit_profil', [DashboardController::class, 'SuperEditprofile'])->name('superadmin.editprofile');
    Route::get('/superadmin/admincontrol', [DashboardController::class, 'SuperAdminControl'])->name('superadmin.admin_control');    
  
});

Route::middleware(['auth', 'user-access:kemahasiswaan'])->group(function () 
{
    Route::get('/kemahasiswaan/home', [KemahasiswaanController::class, 'KemahasiswaanHome'])->name('kemahasiswaan.home');
    Route::get('/kemahasiswaan/pengaduan', [KemahasiswaanController::class, 'KmsPengaduan'])->name('kemahasiswaan.pengaduan');    
    Route::get('/kemahasiswaan/buatakun', [KemahasiswaanController::class, 'Kmscracc'])->name('kemahasiswaan.buatakun');    
    Route::get('/kemahasiswaan/detail', [KemahasiswaanController::class, 'Kmsdtpengaduan'])->name('kemahasiswaan.dtpengaduan'); 
    Route::get('/kemahasiswaan/profil', [KemahasiswaanController::class, 'KmsProfil'])->name('kemahasiswaan.profil');    
    Route::get('/kemahasiswaan/edit_profil', [KemahasiswaanController::class, 'KmsEditprofil'])->name('kemahasiswaan.editprofil');   
});

Route::middleware(['auth', 'user-access:akademik'])->group(function () 
{
    Route::get('/akademik/home', [AkademikController::class, 'AkademikHome'])->name('akademik.home');
    Route::get('/akademik/pengaduan', [AkademikController::class, 'AkdPengaduan'])->name('akademik.pengaduan');    
    Route::get('/akademik/buatakun', [AkademikController::class, 'Akdcracc'])->name('akademik.buatakun');    
    Route::get('/akademik/detail', [AkademikController::class, 'Akddtpengaduan'])->name('akademik.dtpengaduan');    
    Route::get('/akademik/profil', [AkademikController::class, 'AkdProfil'])->name('akademik.profil');    
    Route::get('/akademik/edit_profil', [AkademikController::class, 'AkdEditprofil'])->name('akademik.editprofil');
});

Route::middleware(['auth', 'user-access:kamsisdal'])->group(function () 
{
    Route::get('/kamsisdal/home', [KamsisdalController::class, 'KamsisdalHome'])->name('kamsisdal.home');
    Route::get('/kamsisdal/pengaduan', [KamsisdalController::class, 'KmdPengaduan'])->name('kamsisdal.pengaduan');    
    Route::get('/kamsisdal/buatakun', [KamsisdalController::class, 'Kmdcracc'])->name('kamsisdal.buatakun');    
    Route::get('/kamsisdal/detail', [KamsisdalController::class, 'Kmddtpengaduan'])->name('kamsisdal.dtpengaduan');
    Route::get('/kamsisdal/profil', [KamsisdalController::class, 'KmdProfil'])->name('kamsisdal.profil');    
    Route::get('/kamsisdal/edit_profil', [KamsisdalController::class, 'KmdEditprofil'])->name('kamsisdal.editprofil');
});

Route::middleware(['auth', 'user-access:sarpras'])->group(function () 
{
    Route::get('/sarpras/home', [SarprasController::class, 'SarprasHome'])->name('sarpras.home');
    Route::get('/sarpras/pengaduan', [sarprasController::class, 'sarprasPengaduan'])->name('sarpras.pengaduan');    
    Route::get('/sarpras/buatakun', [sarprasController::class, 'sarprascracc'])->name('sarpras.buatakun');    
    Route::get('/sarpras/detail', [sarprasController::class, 'sarprasdtpengaduan'])->name('sarpras.dtpengaduan');
    Route::get('/sarpras/profil', [SarprasController::class, 'sarprasProfil'])->name('sarpras.profil');    
    Route::get('/sarpras/edit_profil', [SarprasController::class, 'sarprasEditprofil'])->name('sarpras.editprofil');
});

Route::middleware(['auth', 'user-access:direksi'])->group(function () 
{
    Route::get('/direksi/home', [direksiController::class, 'DireksiHome'])->name('direksi.home');
    Route::get('/direksi/pengaduan', [direksiController::class, 'direksiPengaduan'])->name('direksi.pengaduan');    
    Route::get('/direksi/buatakun', [direksiController::class, 'direksicracc'])->name('direksi.buatakun');    
    Route::get('/direksi/detail', [direksiController::class, 'direksidtpengaduan'])->name('direksi.dtpengaduan');
    Route::get('/direksi/profil', [DireksiController::class, 'direksiProfil'])->name('direksi.profil');    
    Route::get('/direksi/edit_profil', [DireksiController::class, 'direksiEditprofil'])->name('direksi.editprofil');
});
/*---------------*/

/*Logout*/
Route::get('/logout', [LoginController::class, 'logout']);  
/*Logout*/

//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');  