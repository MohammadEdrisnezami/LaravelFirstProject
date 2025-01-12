<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class,'index']);
Route::post('/save',[HomeController::class,'saveNote']);
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('edit');
Route::put('/update/{id}',[HomeController::class,'update']);
////for delete 
Route::get('/delete/{id}',[HomeController::class,'delete'])->name('delete');