@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Navigation Sidebar -->
    

        <!-- Main Content Area -->
        <div class="col py-3">
            @if ($errors->any())
            <div class="pt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- Welcome Message -->
            <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                <h1>Selamat datang</h1>
            </div>
        </div>
    </div>
</div>
@endsection
