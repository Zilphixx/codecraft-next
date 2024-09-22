<?php

use App\Http\Controllers\Admin\ManageTeacherController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('landing-page');
});


Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::middleware('admin')->group(function() {
        Route::controller(ManageTeacherController::class)->group(function() {
            Route::get('/verified-teachers', 'verifiedTeachers')
                ->name('verified.teachers');
            Route::get('/unverified-teachers', 'unverifiedTeachers')
                ->name('unverified.teachers');
            
            Route::get('/get-teachers/{condition}', 'teachersList')
                ->name('get.teachers');
            Route::get('/view-file/{file}', 'viewFile')
                ->name('view.teacher_id');
            Route::post('/verify-teacher', 'verifyTeacher')
                ->name('verify.teacher');
        });
    });
});



//Fortify route for becoming a teacher || can't modify vendor files
//So we extend the routes :)
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    Route::get('/be-a-teacher', fn() => view('auth.be-a-teacher'))
        ->middleware(['guest:'.config('fortify.guard')])
        ->name('be.a.teacher');
    
    Route::post('/be-a-teacher', [RegisteredUserController::class, 'store'])
        ->middleware(['guest:'.config('fortify.guard')]);
});