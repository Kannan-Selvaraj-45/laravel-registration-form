<?php

use App\Http\Controllers\StudentForm;
use Illuminate\Support\Facades\Route;


Route::get('/', [StudentForm::class,'viewForm'])->name('home');


Route::post('/add-student', [StudentForm::class,'addStudent']);

// routes/web.php
Route::delete('/delete-student/{id}', [StudentForm::class, 'deleteStudent'])->name('delete-student');
