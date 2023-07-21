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
                    <h3>Pending Accounts</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Approve/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($pendingAccounts) > 0)
                                @foreach ($pendingAccounts as $account)
                                    <tr>
                                        <th scope="row">{{ $account->id }}</th>
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->email }}</td>
                                        <td>{{ $account->role }}</td>
                                        <td class="d-flex gap-2">
                                            <form action="{{ route('admin.approveReject', ['userId' => $account->id, 'action' => 'approve']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </form>
                                            <form action="{{ route('admin.approveReject', ['userId' => $account->id, 'action' => 'reject']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p>No pending accounts.</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
