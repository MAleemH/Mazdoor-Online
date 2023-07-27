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
                    <h3>Placed Proposals</h3>
                    @if (count($proposals) > 0)
                        <ul>
                            @foreach ($proposals as $proposal)
                                <li class="mb-3">
                                    <h4>Job Title: {{ $proposal->job->title }}</h4>

                                    <small>Rate: {{ $proposal->job->rate }}</small> <br>

                                    @if($proposal->job->rate === 'flat')
                                        <small>Rs. {{ $proposal->job->flat_rate }}</small>
                                    @endif
                                    
                                    @if ($proposal->job->rate === 'bidding')
                                        <small>Bid Amount: Rs. {{ $proposal->price }}</small>
                                    @endif

                                    <p>Proposal Text: {{ $proposal->proposal_text }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No placed proposals yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
