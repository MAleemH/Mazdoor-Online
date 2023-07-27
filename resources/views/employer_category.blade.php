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
                    <h3>Employer Category</h3>
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
                    <p>Category: {{ $category ?? 'N/A' }}</p>

                    <form action="{{ route('updateCategory') }}" method="POST">
                        @csrf
                        <label for="category">Update Category:</label>
                        <select name="category" id="category">
                            <option value="individual" @if ($category === 'individual') selected @endif>Individual</option>
                            <option value="corporate" @if ($category === 'corporate') selected @endif>Corporate</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
