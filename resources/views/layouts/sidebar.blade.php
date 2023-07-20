<div class="sidebar">
    <!-- Profile button -->
    <a href="{{ route('profile') }}">Profile</a>

    @if (auth()->user()->role === 'admin')
        <!-- Categories button (Admin only) -->
        <a href="{{ route('work_categories.index') }}">Categories</a>
    @endif

    @if (auth()->user()->role === 'labour')
        <!-- Available jobs (Labour only) -->
        <a href="{{ route('available_jobs') }}">Available Jobs</a>
    @endif

    @if (auth()->user()->role === 'employer')
        <!-- Post a job (Employer only) -->
        <a href="{{ route('post_job') }}">Post a Job</a>
    @endif
</div>
