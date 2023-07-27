<div class="sidebar">
    <!-- Profile button -->
    <a href="{{ route('profile.profile') }}">Profile</a>

    @if (auth()->user()->role === 'admin')
        <!-- (Admin only) -->
        <a href="{{ route('work_categories.index') }}">Categories</a>
        <a href="{{ route('pending_accounts') }}">Approve Accounts</a>
    @endif

    @if (auth()->user()->role === 'labour')
        <!-- (Labour only) -->
        <a href="{{ route('portfolios.index') }}">Portfolio</a>
        <a href="{{ route('jobs.index') }}">Available Jobs</a>
        <a href="{{ route('proposals.placed') }}">Placed Proposals</a>
    @endif

    @if (auth()->user()->role === 'employer')
        <!-- (Employer only) -->
        <a href="{{ route('viewCategory') }}">View/Update Category</a>
        <a href="{{ route('jobs.index') }}">Jobs</a>
    @endif
</div>
