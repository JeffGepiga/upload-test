<?php

namespace App\Http\Controllers;

use App\Services\JQueryUploadService;
use Illuminate\Http\Request;

class JqueryUploaderController extends Controller
{
    public function upload(Request $request) {
        //validate
        $request->validate([
            'file'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        return (new JQueryUploadService)->ProcessUpload($request);
    }
}
