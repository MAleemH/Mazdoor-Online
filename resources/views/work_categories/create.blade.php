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
                    <h3>Add A New Category</h3>
                    <form action="{{ route('work_categories.store') }}" method="POST" class="d-flex gap-2">
                        @csrf
                        <label for="name">Work Category Name:</label>
                        <input class="form-control w-25" type="text" name="name" id="name" required>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
