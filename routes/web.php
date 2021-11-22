<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\School\ClassController;
use App\Http\Controllers\Backend\School\FacultyController;
use App\Http\Controllers\Backend\UserController;
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

Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');

    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');

    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');

    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

});

// CATEGORY

Route::prefix('category')->group(function(){

    Route::get('/view', [CategoryController::class, 'categoryView'])->name('category.view');

    Route::get('/add', [CategoryController::class, 'categoryAdd'])->name('category.add');

    Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');

    Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

});

// FACULTY

Route::prefix('faculty')->group(function(){

    Route::get('/view', [FacultyController::class, 'facultyView'])->name('faculty.view');

    Route::get('/add', [FacultyController::class, 'facultyAdd'])->name('faculty.add');

    Route::post('/store', [FacultyController::class, 'facultyStore'])->name('faculty.store');

    Route::get('/edit/{id}', [FacultyController::class, 'facultyEdit'])->name('faculty.edit');

    Route::post('/update/{id}', [FacultyController::class, 'facultyUpdate'])->name('faculty.update');

    Route::get('/delete/{id}', [FacultyController::class, 'facultyDelete'])->name('faculty.delete');

});

// CLASS

Route::prefix('class')->group(function(){

    Route::get('/view', [ClassController::class, 'classView'])->name('class.view');

    Route::get('/add', [ClassController::class, 'classAdd'])->name('class.add');

    Route::post('/store', [ClassController::class, 'classStore'])->name('class.store');

    Route::get('/edit/{id}', [ClassController::class, 'classEdit'])->name('class.edit');

    Route::post('/update/{id}', [ClassController::class, 'classUpdate'])->name('class.update');

    Route::get('/delete/{id}', [ClassController::class, 'classDelete'])->name('class.delete');

});


// STUDENT MANAGEMENT

Route::prefix('students')->group(function() {

    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');

    Route::get('/reg/Add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');

    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');

    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');

    Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');

    Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');

    Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');

    Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');

    Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

});
