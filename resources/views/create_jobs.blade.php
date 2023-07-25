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
                    <h3>Create a New Job</h3>
                    <form method="POST" action="{{ route('jobs.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label">Job Rate</label>
                            <select class="form-select" id="rate" name="rate" required>
                                <option value="bidding">Bidding</option>
                                <option value="flat">Flat</option>
                            </select>
                        </div>
                        <!-- Additional input for flat rate, displayed only if job rate is "flat" -->
                        <div class="mb-3" id="flat_rate_input" style="display: none;">
                            <label for="flat_rate" class="form-label">Flat Rate</label>
                            <input type="number" class="form-control" id="flat_rate" name="flat_rate" value="{{ old('flat_rate') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show/hide the additional input for flat rate based on the selected job rate
        document.getElementById('rate').addEventListener('change', function() {
            const flatRateInput = document.getElementById('flat_rate_input');
            if (this.value === 'flat') {
                flatRateInput.style.display = 'block';
            } else {
                flatRateInput.style.display = 'none';
            }
        });
    </script>

@endsection
