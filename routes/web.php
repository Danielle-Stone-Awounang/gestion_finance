<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;


Route::prefix('/finance')->name('finance.')->group(function () {
    Route::get('/', function (Request $request): View {
        return view('test.index');
      
    })->name('index');

    Route::get('/expence', function (Request $request): View {
        return view('test.index');
      
    })->name('expence');

    Route::get('/income', function (Request $request): View {
        return view('test.index');
      
    })->name('income');

});
  

Route::get('/', function () {
    return view('welcome');
});


