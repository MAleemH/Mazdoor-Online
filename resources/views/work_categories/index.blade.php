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

                    <div class="d-flex justify-content-between">
                        <h3>Categories</h3>
                        <a href="{{ route('work_categories.create') }}" class="btn btn-outline-success">Add New Category</a>
                    </div>

                    <ul class="mt-3">
                        @foreach($categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection









