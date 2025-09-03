<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Website\AllBooks;
use App\Http\Controllers\Website\AllBooksController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\LoginController;
use App\Http\Controllers\Website\MyBooksController;
use App\Http\Controllers\Website\RegisterController;
use App\Http\Controllers\Website\StudentController as WebsiteStudentController;

Route::get('/', function () {
    return redirect()->route("Home.index");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});




     Route::resource("Login",LoginController::class);
     Route::resource("Register",RegisterController::class);
     Route::resource("Student",WebsiteStudentController::class);
     Route::resource("Home",HomeController::class);
     Route::resource("AllBooks",AllBooksController::class);
     Route::resource("MyBooks",MyBooksController::class);

require __DIR__.'/auth.php';
