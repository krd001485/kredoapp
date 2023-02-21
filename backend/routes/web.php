<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminController;

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
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/booked/classes/teacher', [TeacherController::class, 'bookedClasses'])->name('teacher.booked.classes');
    Route::patch('class/end/{class_id}', [TeacherController::class, 'endClass'])->name('teacher.end.class');
    Route::delete('class/cancel/{class_id}', [TeacherController::class, 'cancelClass'])->name('teacher.cancel.class');
    Route::patch('class/reschedule/{class_id}', [TeacherController::class, 'rescheduleClass'])->name('teacher.reschedule.class');

Route::group(['prefix'=>'admin', 'as'=>'admin.'], function(){
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    // Route::get('/index', [AdminController::class, 'showStudentCount'])->name('show.modal.show');
    Route::resource('/students', StudentController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/classroom', ClassroomController::class);
    Route::resource('/', AdminController::class);

    # Admin
    Route::delete('/delete/student/{id}', [AdminController::class, 'deactivateStudent'])->name('delete.student');
    Route::patch('/activate/student/{id}', [AdminController::class, 'activateStudent'])->name('activate.student');
    Route::get('/class/show/{class_id}', [AdminController::class, 'show'])->name('classroom.show');
    Route::delete('/delete/teacher/{id}', [AdminController::class, 'deactivateTeacher'])->name('delete.teacher');
    Route::patch('/activate/teacher/{id}', [AdminController::class, 'activateTeacher'])->name('activate.teacher');
    // Route::get('/', [AdminController::class, 'showStudentCount'])->name('show');

    # Booking
    Route::get('/booking', [BookingController::class, 'index'])->name('book.index');
    Route::patch('/class/book/{class_id}', [BookingController::class, 'teacherBookClass'])->name('teacher.book');
    Route::patch('/class/book/student/{class_id}', [BookingController::class, 'studentBookClass'])->name('student.book');

        
});
});

