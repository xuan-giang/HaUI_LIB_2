<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\BorrowController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReaderController;
use App\Http\Controllers\Backend\School\ClassController;
use App\Http\Controllers\Backend\School\FacultyController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('admin.index');

})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name("admin.logout");

// USER PROFILE
Route::prefix('profile')->group(function () {

    Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');

    Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');

    Route::post('/store', [ProfileController::class, 'profileStore'])->name('profile.store');

    Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('password.view');

    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');

});

// USER

Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');

    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');

    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');

    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

    Route::get('/setup', [UserController::class, 'UserSetup'])->name('users.setup');
});

// CATEGORY

Route::prefix('category')->group(function () {

    Route::get('/view', [CategoryController::class, 'categoryView'])->name('category.view');

    Route::get('/add', [CategoryController::class, 'categoryAdd'])->name('category.add');

    Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');

    Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

});

// BOOK

Route::prefix('book')->group(function () {

    Route::get('/view', [BookController::class, 'bookView'])->name('book.view');

    Route::get('/add', [BookController::class, 'bookAdd'])->name('book.add');

    Route::post('/store', [BookController::class, 'bookStore'])->name('book.store');

    Route::get('/edit/{id}', [BookController::class, 'bookEdit'])->name('book.edit');

    Route::post('/update/{id}', [BookController::class, 'bookUpdate'])->name('book.update');

    Route::get('/delete/{id}', [BookController::class, 'bookDelete'])->name('book.delete');

});

// FACULTY

Route::prefix('faculty')->group(function () {

    Route::get('/view', [FacultyController::class, 'facultyView'])->name('faculty.view');

    Route::get('/add', [FacultyController::class, 'facultyAdd'])->name('faculty.add');

    Route::post('/store', [FacultyController::class, 'facultyStore'])->name('faculty.store');

    Route::get('/edit/{id}', [FacultyController::class, 'facultyEdit'])->name('faculty.edit');

    Route::post('/update/{id}', [FacultyController::class, 'facultyUpdate'])->name('faculty.update');

    Route::get('/delete/{id}', [FacultyController::class, 'facultyDelete'])->name('faculty.delete');

});

// CLASS

Route::prefix('class')->group(function () {

    Route::get('/view', [ClassController::class, 'classView'])->name('class.view');

    Route::get('/add', [ClassController::class, 'classAdd'])->name('class.add');

    Route::post('/store', [ClassController::class, 'classStore'])->name('class.store');

    Route::get('/edit/{id}', [ClassController::class, 'classEdit'])->name('class.edit');

    Route::post('/update/{id}', [ClassController::class, 'classUpdate'])->name('class.update');

    Route::get('/delete/{id}', [ClassController::class, 'classDelete'])->name('class.delete');

});


// READER

Route::prefix('reader')->group(function () {

    Route::get('/view', [ReaderController::class, 'readerView'])->name('reader.view');

    Route::get('/add', [ReaderController::class, 'readerAdd'])->name('reader.add');

    Route::post('/store', [ReaderController::class, 'readerStore'])->name('reader.store');

    Route::get('/edit/{id}', [ReaderController::class, 'readerEdit'])->name('reader.edit');

    Route::post('/update/{id}', [ReaderController::class, 'readerUpdate'])->name('reader.update');

    Route::get('/delete/{id}', [ReaderController::class, 'readerDelete'])->name('reader.delete');

});

// BORROW ACTIVITIES

Route::prefix('borrow')->group(function () {

    Route::get('/view', [BorrowController::class, 'borrowView'])->name('borrow.view');

    Route::get('/add', [BorrowController::class, 'borrowAdd'])->name('borrow.add');

    Route::get('/return', [BorrowController::class, 'returnAdd'])->name('return.add');

    Route::post('/store_return', [BorrowController::class, 'borrowStoreReturn'])->name('return.store');

    Route::post('/store', [BorrowController::class, 'borrowStore'])->name('borrow.store');

    Route::get('/edit/{id}', [BorrowController::class, 'borrowEdit'])->name('borrow.edit');

    Route::post('/update/{id}', [BorrowController::class, 'borrowUpdate'])->name('borrow.update');

    Route::get('/delete/{id}', [BorrowController::class, 'borrowDelete'])->name('borrow.delete');

    Route::get('/detail/{id}', [BorrowController::class, 'borrowDetail'])->name('borrow.detail');

});

