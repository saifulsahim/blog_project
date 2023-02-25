<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
Auth::routes();
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('website.home');
});

Route::get('/category', function () {
    return view('website.category');
});

Route::get('/post', function () {
    return view('website.post');
});
// Admin panel routes
Route::group(['prefix'=> 'admin','middleware'=>['auth']],function (){
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});
    Route::resource('category',CategoryController::class);
    Route::resource('post',PostController::class);
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__.'/auth.php';

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
