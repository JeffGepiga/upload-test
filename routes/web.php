<?php

use App\Http\Controllers\DropzoneUploadController;
use App\Http\Controllers\JqueryUploaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dropzone_implementation', 'dropzone_implementation');
Route::post('/upload_from_dropzone', [DropzoneUploadController::class,'upload_from_dropzone']);

Route::view('/livewire_implementation', 'livewire_implementation');

Route::get('/jquery_implementation', [JqueryUploaderController::class,'jquery_implementation']);

Route::post('/api/jquery_upload', [JqueryUploaderController::class,'upload']);


