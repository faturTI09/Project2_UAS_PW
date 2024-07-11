@include('layouts.header')
<!-- /.navbar -->
<!-- Main Sidebar Container -->
@include('layouts.sidebar')
<div class='content-wrapper'>
    <x-app-layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="p-3 bg-white">
                        <h1 class="display-1">Error</h1>
                        <h2 class="display-3 text-danger">Maaf anda tidak diizinkan untuk mengakses halaman ini</h2>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
