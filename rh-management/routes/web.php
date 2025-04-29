<?php

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

Route::middleware('auth')->group(function(){

    Route::redirect('/', 'home');
    Route::view('/home', 'home')->name('home');

});