<?php

namespace App\Http\Controllers;

use App\Services\JQueryUploadService;
use Illuminate\Http\Request;

class JqueryUploaderController extends Controller
{
    public function __construct(JQueryUploadService $upload_container){
        $this->upload_container = $upload_container;
    }

    public function jquery_implementation(){
        return view('jquery_implementation',[
            'allowed_types' => $this->upload_container->allowed_types
        ]);
    }
    public function upload(Request $request) {
        //validate
        $request->validate([
            'file'=>'required|mimes:'.implode(',', $this->upload_container->allowed_types)
        ]);

        return $this->upload_container->ProcessUpload($request);
    }
}
