<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\CheckLogged;
use App\Http\Middleware\CheckLogin;
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

Route::middleware([CheckLogged::class])->group(function () {
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');
});

Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/', [Dashboard::class, 'showAll'])->name('welcome');
    Route::resource('major', MajorController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('student', StudentController::class);
    Route::resource('class', ClassController::class);
    Route::resource('info', InfoController::class);
    Route::resource('mark', MarksController::class);
    Route::name('mark.')->group(function () {
        Route::get('/addNewMark', [MarksController::class, 'addNewMark'])->name('newMark');
        Route::get('/changeMark/{idSub}/{idSt}', [MarksController::class, 'changeMark'])->name('changeMark');
        Route::post('/changeMarkProc/{idSub}/{idSt}', [MarksController::class, 'changeMarkProc'])->name('changeMarkProc');
        Route::get('/mark/{idSub}/{idCl}', [MarksController::class, 'getClassAndMark'])->name('cminfo');
        Route::get('/mark-by-excel', [MarksController::class, 'markByExcel'])->name('mark-by-excel');
        Route::post('/mark-by-excel-process', [MarksController::class, 'import'])->name('mark-by-excel-process');
        Route::get('/markCheck/{idSt}', [MarksController::class, 'markCheck'])->name('markCheck');
    });
    Route::resource('staff', StaffController::class);
    Route::name('info.')->group(function () {
        Route::get('changePassword', [InfoController::class, 'changePassword'])->name('cpw');
        Route::post('changePasswordProc', [InfoController::class, 'changePasswordProc'])->name('cpwp');
    });

    Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');
    Route::name('student.')->group(function () {
        Route::get('/add-by-excel', [StudentController::class, 'addByExcel'])->name('add-by-excel');
        Route::post('/add-by-excel-process', [StudentController::class, 'import'])->name('add-by-excel-process');
        Route::get('/download-excel', [StudentController::class, 'export'])->name('download-excel');
    });
});
