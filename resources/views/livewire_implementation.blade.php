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
                    <livewire:upload-file-component>
                    </div>
                </div>
            </div>
            @stack('child-script')
@endsection