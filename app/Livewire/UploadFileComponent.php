<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;
use Log;

class UploadFileComponent extends Component
{
    use WithFileUploads;
    // Chunks info
    public $chunkSize = 10000000; // 20MB -- CAN BE CHANGE TO FIT THE NEEDS OR MAXIMUM UPLOAD SIZE OF THE SERVER 
    public $fileChunk;

    // Final file 
    public $fileName;
    public $fileSize;
    public $finalFile;
    public $accepted_format = [
        "mp4","mov","avi",'mkv'
    ];
    public function updatedFileChunk()
    {
        $finalPath = Storage::path('/livewire-tmp/'.$this->fileName);
        $tmpPath   = Storage::path('/livewire-tmp/'.$this->fileChunk->getFileName());
        $file = fopen($tmpPath, 'rb');
        $buff = fread($file, $this->chunkSize);
        fclose($file);

        $final = fopen($finalPath, 'ab');
        fwrite($final, $buff);
        fclose($final);
        unlink($tmpPath);
        $curSize = Storage::size('/livewire-tmp/'.$this->fileName);
        Log::info('expected file size is '.$this->fileSize.' current merged size is: '.$curSize);

        if( $curSize == $this->fileSize ){
           $this->Js("alert('File Uploaded Successfully')");
           $this->finalFile = TemporaryUploadedFile::createFromLivewire('/'.$this->fileName);

           //store the file to the file_uploads disk
           $this->finalFile->storeAs('/', $this->fileName,'file_uploads');
        }
    }
    public function render()
    {
        return view('livewire.upload-file-component');
    }
}
