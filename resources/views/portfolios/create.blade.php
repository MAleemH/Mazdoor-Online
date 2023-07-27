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
                    <h3>Create a New Portfolio</h3>
                    <form method="POST" action="{{ route('portfolios.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="specialization" class="form-label">Specialization</label>
                            <select class="form-select" id="specialization" name="specialization" required>
                                <option value="">Select Specialization</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection









