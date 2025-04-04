@extends('dashboard')

@section('content')
    <main class="user-table d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh; background-color: #f0f2f5;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg border-0 rounded-4 p-4">
                        <h3 class="text-center mb-4" style="background: linear-gradient(90deg, #007bff, #6610f2); color: white; padding: 10px 0; border-radius: 0.5rem;">User List</h3>
                        <table class="table table-hover table-bordered table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('user.readUser', ['id' => $user->id]) }}" class="btn btn-sm btn-info rounded-pill">View</a>
                                            <a href="{{ route('user.updateUser', ['id' => $user->id]) }}" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                                            <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}" class="btn btn-sm btn-danger rounded-pill">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
