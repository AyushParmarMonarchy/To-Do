<?php

use Illuminate\Support\Facades\Route;
// access the controller
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('welcome');
// });


// show all tasks on index
route::get('/',[TaskController::class,'index'])->name('index');
route::get('/to-do',[TaskController::class,'index'])->name('to-do');
route::get('/to-do/home',[TaskController::class,'index'])->name('to-do.home');


//show the add task form
Route::get('/to-do/create',[TaskController::class,'create'])->name('create');
// store - insert the record in DB
Route::post('/todo/store',[TaskController::class,'store'])->name('store');


//show the update 
Route::get('/to-do/{id}/edit',[TaskController::class,'edit'])->name('edit');

//update the record - logic
Route::put('/to-do/{id}/update',[TaskController::class,'update'])->name('update');


//delete the task
Route::delete('/to-do/{id}/delete',[TaskController::class,'destroy'])->name('destroy');


//update the status pending-> complete and complete-> pending
Route::get('/to-do/{id}/status',[TaskController::class,'status'])->name('status');


// Apply fillters
Route::get('/to-do/Pending',[TaskController::class,'pending'])->name('pending');
Route::get('/to-do/complete',[TaskController::class,'complete'])->name('complete');
