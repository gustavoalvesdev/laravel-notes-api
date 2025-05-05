<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/notes', [NoteController::class, 'all']);
Route::get('/note/{id}', [NoteController::class, 'one']);
Route::post('/note', [NoteController::class, 'new']);
Route::put('/note/{id}', [NoteController::class, 'edit']);
Route::delete('/note/{id}', [NoteController::class, 'delete']);
