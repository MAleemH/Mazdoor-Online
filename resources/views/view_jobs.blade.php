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
                    <div class="d-flex justify-content-between mb-3">
                        <h3>All Jobs</h3>
                        <!-- Display a button to add a new job for employers -->
                        @if (auth()->user()->role === 'employer')
                        <a href="{{ route('jobs.create') }}" class="btn btn-primary">Add New Job</a>
                        @endif
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Rate</th>
                                <th scope="col">If Flat Rate</th>
                                <th scope="col">Status</th>
                                <th scope="col">Posted By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($jobs) > 0)
                                @foreach ($jobs as $job)
                                    <tr>
                                        <th scope="row">{{ $job->id }}</th>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->description }}</td>
                                        <td>{{ $job->rate }}</td>
                                        @if($job->flat_rate)
                                            <td>Rs. {{ $job->flat_rate }}</td>
                                        @else
                                            <td>Nil</td>
                                        @endif
                                        <td>{{ $job->status }}</td>
                                        <td>{{ $job->user->name }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <p>No available jobs at the moment.</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection