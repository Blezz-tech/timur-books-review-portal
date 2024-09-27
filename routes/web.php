<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
//     // $books = Book::withCount('comments')
//     // ->withAvg('comments', 'rating')
//     // ->orderBy('created_at', 'desc')
//     // ->get();

//     $books = Book::withCount('comments')
//     ->withAvg('comments', 'rating')
//     ->where('created_at', '>' ,now()->subMonths(6))
//     ->orderBy('created_at', 'desc')
//     ->get();

//     return view('main', ['books'=>$books]);
// });


Route::resource('books', BookController::class)->only('index', 'show');

Route::get('/regform', [UserController::class, 'create'])->name('user.create');
Route::post('/register', [UserController::class, 'store'])->name('user.store');

Route::get('/loginform', [UserController::class, 'loginform'])->name('user.loginform');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin-home', [AdminController::class, 'adminHome'])->name('admin.home');
});
