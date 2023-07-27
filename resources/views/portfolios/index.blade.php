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
                    <div class="d-flex justify-content-between">
                    <h3>Your Portfolio</h3>
                    @if ($user->role === 'labour')
                        @if (count($portfolios) === 0)
                            <!-- Display a button to add a new portfolio -->
                            <a href="{{ route('portfolios.create') }}" class="btn btn-primary">Add New Portfolio</a>
                        @endif
                    @endif
                    </div>
                    @if (count($portfolios) > 0)
                        <ul>
                            @foreach ($portfolios as $portfolio)
                                <li>
                                    <h3>{{ $portfolio->specialization }}</h3>
                                    <p>{{ $portfolio->description }}</p>
                                    <!-- Add any other portfolio details you want to display -->
                                    @if ($user->id === $portfolio->user_id)
                                        <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-primary">Edit</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No portfolio found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection









