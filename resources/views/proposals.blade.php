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
                    <h3>Proposals for "{{ $job->title }}"</h3>
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
                    @if (count($proposals) > 0)
                        <ul>
                            @foreach ($proposals as $proposal)
                                <li class="mb-3">
                                    <h4>Submitted by: <a href="{{ route('users.rate', $proposal->user->id) }}">{{ $proposal->user->name }}</a></h4>
                                    <p>Proposal Text: {{ $proposal->proposal_text }}</p>
                                    @if ($proposal->job->rate === 'bidding')
                                        <p>Bid Amount: Rs. {{ $proposal->price }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No proposals for this job yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
