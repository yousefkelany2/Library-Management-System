<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\BorrowedBookController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\StudentController;




Route::resource("login",LoginController::class);

Route::middleware(['auth:admin', 'is.admin'])->group(function () {
   Route::resource("admin",AdminController::class);
   Route::resource("student",StudentController::class);
   Route::resource("book",BookController::class);
   Route::get('/student-search', [StudentController::class, 'search'])->name('student.search');

Route::resource("BorrowedBook",BorrowedBookController::class);


});
/* Route::middleware('auth')->group(function () {


}); */

