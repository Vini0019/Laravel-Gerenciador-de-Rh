<?php

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/email', function () {
    
    Mail::raw('Mesangem de teste de RH management', function(Message $message){
        $message->to('teste@gmail.com')
        ->subject('Bem-vindo ao RH MANGNT')
        ->from('rh@rhmangnt.com');
    });

    echo 'email enviado';
});
