@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0">
                @include('layouts.sidebar') <!-- Include the sidebar -->
            </div>
            <div class="col-md-10 p-0">
                <!-- Your user-specific content here -->
                <div class="data-container">
                    Welcome {{ auth()->user()->name }}
                </div>
            </div>
        </div>
    </div>
@endsection
