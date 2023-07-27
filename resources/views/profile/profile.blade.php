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
                        <strong>Role:</strong> {{ auth()->user()->role }} <br>
                        
                        @if (auth()->user()->role === 'employer' || auth()->user()->role === 'labour')
                            <strong>Rating:</strong>
                            @php
                                $receivedRatings = auth()->user()->receivedRatings->avg('rating');
                            @endphp
                            @if ($receivedRatings)
                                {{ number_format($receivedRatings, 1) }}/5.0
                            @else
                                No ratings yet
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
