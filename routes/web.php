<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
 
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

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


// Admin ruta
Route::controller(AdminController::class)->group(function(){
    Route::get('/user/logout','destroySesion')->name('user.logout');
    //Route::get('/user/profile','userProfile')->name('user.profile');

});


// Apoderado Routes 
Route::controller(StudentController::class)->group(function(){
    Route::get('/all/students','allStudents')->name('all.students');
    
    Route::get('/add/student','addStudent')->name('add.student');
    Route::post('/store/student','storeStudent')->name('store.student');

    Route::get('/edit/student/{id}','editStudent')->name('edit.student');
    Route::post('/update/student/{id}','updateStudent')->name('update.student');

    Route::get('/delete/student/{id}','deleteStudent')->name('delete.student');
    
});


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
