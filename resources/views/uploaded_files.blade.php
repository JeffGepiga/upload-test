@extends('layout.main')
@section('page_title','List of all uploaded files')
@section('styles')
@endsection
@section('content')
        <div class="container mt-3">
            <div class="card mt-3" id="livewire">
                <di class="card-header">
                    <div class="row">
                        <div class="col-sm">
                <h4 class="card-title">List of all uploaded files</h4>
                        </div>
                        <div class="col-sm-auto">
                        <a class="btn btn-link" href="{{url('clear-files')}}">Clear Files</a>
                        </div>
                    </div>
                </di>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Directory</th>
                                <th>File Name</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)
                            <tr>
                                <td>{{$file->getrelativePath()}}</td>
                                <td>{{$file->getFileName()}}</td>
                                <td>{{number_format($file->getSize() / 1048576,2)}} Mb</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100"> No file uploaded yet...</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            @stack('child-script')
@endsection