<?php

use App\Http\Controllers\DropzoneUploadController;
use App\Http\Controllers\JqueryUploaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/livewire_implementation', 'livewire_implementation');

Route::get('/jquery_implementation', [JqueryUploaderController::class,'jquery_implementation']);

Route::post('/api/jquery_upload', [JqueryUploaderController::class,'upload'])->middleware('api');


Route::get('/uploaded_files', function(){
    $filesInFolder = \File::allFiles(\Storage::disk('file_uploads')->path('/'));
    return view('uploaded_files',[
        'files' => collect($filesInFolder)->sortBy('aTime') 
    ]);
});


