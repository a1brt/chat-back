<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    \App\Events\TestEvent::dispatch('test');
   // return 'test';
});
