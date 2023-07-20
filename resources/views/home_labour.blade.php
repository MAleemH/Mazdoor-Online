@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar') <!-- Include the sidebar -->
            </div>
            <div class="col-md-9">
                <!-- Your user-specific content here -->
            </div>
        </div>
    </div>
@endsection
