@extends('layout.main')
@section('page_title','Dropzone')
@section('styles')
       <link
            rel="stylesheet"
            href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
            type="text/css"
            />
            <style type="text/css" media="screen">
            
            .dropzone {
            border: dashed 4px #ddd !important ;
            background-color: #f2f6fc;
            border-radius: 15px;
            }
            
            .dropzone .dropzone-container {
            padding: 2rem 0;
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #8c96a8;
            z-index: 20;
            }
            
            .dropzone .file-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            visibility: hidden;
            cursor: pointer;
            }
            .file-icon{
            font-size: 60px;
            }
            .hr-sect {
            display: flex;
            flex-basis: 100%;
            align-items: center;
            margin: 8px 0px;
            }
            .hr-sect:before,
            .hr-sect:after {
            content: "";
            flex-grow: 1;
            background: #ddd;
            height: 1px;
            font-size: 0px;
            line-height: 0px;
            margin: 0px 8px;
            }
            </style>
@endsection
@section('content')
<div class="container mt-3">
    <div class="card" id="dropzone">
        <di class="card-header">
        <h4 class="card-title">Dropzone</h4>
        </di>
        <div class="card-body">
            
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mt-5">
                    <div class="bg-white p-5 rounded shadow-sm border">
                        <div class="dropzone d-block">
                            <label for="files" class="dropzone-container">
                                <div class="file-icon"><i class="fa-solid fa-file-circle-plus text-primary"></i></div>
                                <div class="text-center pt-3 px-5">
                                    <p class="w-80 h5 text-dark fw-bold">Drag your documents, photos or videos here to start uploading.</p>
                                    <div class="hr-sect">or</div>
                                    <a class="btn btn-primary mb-2" >Browse Files</a>
                                </div>
                            </label>
                            <input id="files" name="files[]" type="file" class="file-input" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
            <script>
    Dropzone.autoDiscover = false;
            // Dropzone has been added as a global variable.
            const dropzone = new Dropzone("#files", {
             url: `{{url("upload_from_dropzone")}}`, 
            uploadMultiple: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
         });
            </script>
@endsection