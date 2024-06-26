<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Upload API Samples</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if(Request::is('dropzone_implementation')) active @endif"  href="{{url('dropzone_implementation')}}">Dropzone Implentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Request::is('livewire_implementation')) active @endif" href="{{url('livewire_implementation')}}">Livewire Implementation</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link @if(Request::is('jquery_implementation')) active @endif" href="{{url('jquery_implementation')}}">Jquery Implementation</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link @if(Request::is('uploaded_files')) active @endif" href="{{url('uploaded_files')}}">Uploaded_files</a>
                </li>
            </ul>
        </div>
    </div>
</nav>