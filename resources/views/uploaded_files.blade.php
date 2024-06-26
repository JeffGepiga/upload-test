@extends('layout.main')
@section('page_title','Livewire')
@section('styles')
@endsection
@section('content')
        <div class="container mt-3">
            <div class="card mt-3" id="livewire">
                <di class="card-header">
                <h4 class="card-title">Livewire</h4>
                </di>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Directory</th>
                                <th>File Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)
                            <tr>
                                <td>{{$file->getrelativePath()}}
                                </td>
                                <td>{{$file->getFileName()}}
                                </td>
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