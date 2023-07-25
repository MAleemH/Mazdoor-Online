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
                    <h3>Job Details</h3>
                    <h4>{{ $job->title }}</h4>
                    <p>{{ $job->description }}</p>
                    <!-- Add any other job details you want to display -->
                </div>
            </div>
        </div>
    </div>
@endsection
