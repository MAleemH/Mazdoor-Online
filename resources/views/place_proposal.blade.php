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
                    <h3>Submit Proposal</h3>
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
                    <form method="POST" action="{{ route('proposals.store') }}">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <div class="mb-3">
                            <label for="proposal_text" class="form-label">Proposal Text</label>
                            <textarea class="form-control" id="proposal_text" name="proposal_text" rows="4" required></textarea>
                        </div>
                        <!-- Only show the price field for bidding rate -->
                        @if($job->rate === 'bidding')
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
