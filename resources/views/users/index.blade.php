@extends('adminlte::page')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Index Users</title>
</head>
<body>

    <div class="container table-container">
        <h1>List of Users</h1>

        @if($users->isEmpty())
            <p class="empty-message">No users available</p>
        @else
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRolename() }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                <button type="button" class="btn btn-warning">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                            </a>

                            <!-- Button to trigger SweetAlert and delete action -->
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            <!-- Form for deleting user -->
                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${userId}`).submit();
                }
            });
        }
    </script>

</body>
</html>

@stop
