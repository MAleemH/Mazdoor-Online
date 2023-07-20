@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-md-2 p-0">
                @include('layouts.sidebar') <!-- Include the sidebar -->
            </div>
            <div class="col-md-10 p-0">
                <!-- Your user-specific content here -->
                <div class="data-container">
                    <h3>Profile</h3>
                    <div>
                        <strong>Name:</strong> {{ auth()->user()->name }} <br>
                        <strong>Email:</strong> {{ auth()->user()->email }} <br>
                        <strong>Role:</strong> {{ auth()->user()->role }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
