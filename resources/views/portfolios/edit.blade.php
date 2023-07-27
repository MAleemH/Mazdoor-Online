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
                    <h3>Edit Portfolio</h3>
                    <form method="POST" action="{{ route('portfolios.update', $portfolio->id) }}">
                        @csrf
                        @method('PUT') <!-- Use the PUT method for updating the record -->

                        <div class="mb-3">
                            <label for="specialization" class="form-label">Specialization</label>
                            <!-- Use a dropdown to select the specialization -->
                            <select class="form-select" id="specialization" name="specialization" required>
                                @foreach ($workCategories as $category)
                                    <option value="{{ $category->name }}" {{ $portfolio->specialization === $category->name ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $portfolio->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Portfolio</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
