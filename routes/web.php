<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\MailController;



Route::get('/', [StudentController::class,'index'])->name('accueil');
Route::post('/import',[StudentController::Class,'import']);
Route::get('/edit',[EditController::Class,'edit'])->name('modification');
Route::post('/edit',[StudentController::Class,'importnote'])->name('importnote');
Route::get('/doc',[DocController::Class,'doc'])->name('documentation'); 
Route::get('/edit-user/{id}',[StudentController::class,'editnote']);
Route::post('/modifnote',[StudentController::Class,'modificationnotes'])->name('modificationnotes');
Route::post('/student/{id}', [StudentController::class, 'update'])->name('updatestudent');
Route::delete('delete-student/{id}', [StudentController::class, 'destroy'])->name('Destroy');
Route::get('/test/{id}',[MailController::Class,'sendmail'])->name('sendmail');









