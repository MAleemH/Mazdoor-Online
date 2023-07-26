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
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <h4>{{ $job->title }}</h4>
                    <p>Posted By: {{ $job->user->name }}</p>
                    <div class='d-flex flex-column mb-3'>
                        <small>Rate: {{ $job->rate }}</small>
                        @if($job->rate === 'flat')
                            <small>Rs. {{ $job->flat_rate }}</small>
                        @endif
                        <!-- display buttons to labour -->
                        @if(auth()->user()->role === 'labour')
                            @if($job->rate === 'bidding')
                                <a href="{{ route('proposals.create', $job->id) }}" class='btn btn-primary p-0' style='width: 80px; height: 25px;'>Place Bid</a>
                            @else
                                <a href="{{ route('proposals.create', $job->id) }}" class='btn btn-primary p-0' style='width: 120px; height: 25px;'>Submit Proposal</a>
                            @endif
                        @endif
                    </div>
                    <p>{{ $job->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
