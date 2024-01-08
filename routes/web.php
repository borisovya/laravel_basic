<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestNewController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestNewController::class, 'index']);

Route::get('/posts', [PostsController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('post.create');

Route::post('/posts', [PostsController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('post.show');
Route::get('/posts/edit/{post}', [PostsController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostsController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('post.delete');

Route::get('/posts/first_or_create', [PostsController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostsController::class, 'updateOrCreate']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');

Route::get('/db', function () {
    try {
        DB::connection()->getPdo();
        return 'Подключение к базе данных успешно!';
    } catch (\Exception $e) {
        return 'Ошибка подключения к базе данных: ' . $e->getMessage();
    }
});
