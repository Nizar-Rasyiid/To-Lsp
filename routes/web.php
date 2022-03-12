<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    KategoriController,
    AuthController,
    ArtikelController
};

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
// Login
Route::get('/', function () {
    return view('auth/login');
})->name('login');

Route::get('/login', function () {
    return view('auth/login');
})->name('login2');

Route::post('/login',[AuthController::class,'login'])->name('loginProses');

// Register
Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::post('/register',[AuthController::class,'Register'])->name('registerProses');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// Admin Fitures
Route::group(['auth::sanctum'],function() {
    Route::middleware('role:admin')->prefix('admin')->group(function(){
        Route::get('/dashboard', function () {
            return view('admin/isidashboard');
        })->name('dashboard');
        

        // Artikel Routes
        Route::get('/artikel',[ArtikelController::class,'index'])->name('artikel');

        // Add Artikel Proceses
        Route::get('/add-artikel',[ArtikelController::class,'create'],function () {
            return view('admin/addartikel');
        })->name('add-artikel');
        Route::post('/save-artikel',[ArtikelController::class,'store'])->name('save-artikel');

        // Edit Artikel Proseses
        Route::get('/edit-artikel/{id}',[ArtikelController::class,'edit'])->name('edit-artikel');
        Route::post('/update-artikel/{id}',[ArtikelController::class,'update'])->name('update-artikel');

        //Delete Artikel
        Route::get('/delete-artikel/{id}',[ArtikelController::class,'destroy'])->name('delete-artikel');

         // Kategori Routes
         Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');

         // Add Kategori Proceses
         Route::get('/add-kategori',function () {
            return view('admin/addkategori');
        })->name('add-kategori');
         Route::post('/save-kategori',[KategoriController::class,'store'])->name('save-kategori');
 
         // Edit Kategori Proseses
         Route::get('/edit-kategori/{id}',[KategoriController::class,'edit'])->name('edit-kategori');
         Route::post('/update-kategori/{id}',[KategoriController::class,'update'])->name('update-kategori');
 
         //Delete Kategori
         Route::get('/delete-kategori/{id}',[KategoriController::class,'destroy'])->name('delete-kategori');
    }); 

});

Route::group(['auth::sanctum'],function() {
    Route::middleware('role:user')->prefix('user')->group(function(){

        //index
        Route::get('/index',[ArtikelController::class,'Uindex'],function(){
            return view('user/index');
        })->name('index');
        //read
        Route::get('/read/{id}',[ArtikelController::class,'show'])->name('read');

    });
});