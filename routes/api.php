<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/**
 * @OA\Info(
 *     title="Laravel Notes API",
 *     version="1.0.0",
 *     description="API para gerenciamento de notas"
 * )
 */

Route::get('/notes', [NoteController::class, 'all']);
Route::get('/note/{id}', [NoteController::class, 'one']);
Route::post('/note', [NoteController::class, 'new']);
Route::put('/note/{id}', [NoteController::class, 'edit']);
Route::delete('/note/{id}', [NoteController::class, 'delete']);
