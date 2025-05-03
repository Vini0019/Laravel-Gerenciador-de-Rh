<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RhUserController;
use App\Models\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('/email', function () {

//     Mail::raw('Mesangem de teste de RH management', function(Message $message){
//         $message->to('teste@gmail.com')
//         ->subject('Bem-vindo ao RH MANGNT')
//         ->from('rh@rhmangnt.com');
//     });

//     echo 'email enviado';
// });

// Route::get('/admin', function(){
//     $admin = User::with('detail', 'department')->find(1);

//     return view ('admin', [
//         'admin' => $admin
//     ]);

// });

// Route::get('/login', function(){
//     return view('auth.login');
// });


// Route::get('/home', function(){
//     return view('home');
// });

Route::middleware('auth')->group(function () {

    Route::redirect('/', 'home');
    Route::view('/home', 'home')->name('home');

    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');

    Route::post('/user/profile/update-password', [ProfileController::class, 'updatePassword'])->name('user.profile.updatePassword');

    Route::post('/user/profile/update-user-data', [ProfileController::class, 'updateUserData'])->name('user.profile.update-user-data');


    //Departamentos
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');

    Route::get('/add-department', [DepartmentController::class, 'FormAddDepartment'])->name('departments.new-department');

    Route::post('/create-department', [DepartmentController::class, 'addDepartment'])->name('departments.create-departments');

    Route::get('/edit-department/{id}', [DepartmentController::class, 'FormEditDepartment'])->name('FormEditDepartment');

    Route::put('/edit-department', [DepartmentController::class, 'UpdateDepartment'])->name('UpdateDepartment');

    Route::delete('/delete-department', [DepartmentController::class, 'DeleteDepartment'])->name('DeleteDepartment');

    //Colaborators

    Route::get('/rh-users', [RhUserController::class, 'index'])->name('colaborators.rh-users');

    Route::get('/add-rh-users', [RhUserController::class, 'newColaborator'])->name('colaborators.new-rh-users');

    Route::post('/create-rh-users', [RhUserController::class, 'addColaborator'])->name('colaborators.create-rh-users');

    Route::get('/edit-rh-user/{id}', [RhUserController::class, 'editColaborator'])->name('colaborators.edit-rh-users');

    Route::put('/update-rh-user', [RhUserController::class, 'updateColaborator'])->name('colaborators.update-rh-users');

    Route::delete('/delete-rh-user', [RhUserController::class, 'deleteColaborator'])->name('colaborators.delete-rh-users');

});
