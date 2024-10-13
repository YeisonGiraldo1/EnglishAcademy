@extends('adminlte::page')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Index Users</title>

    <!-- Add some CSS or Bootstrap classes if needed -->
        {{-- <style>
            .table-container {
                margin: 50px auto;
                max-width: 00px;
            }

            h1 {
                text-align: center;
                margin-bottom: 30px;
                font-weight: bold;
            }

            .table {
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .table thead {
                background-color: #007bff;
                color: white;
            }
            
            .empty-message {
                text-align: center;
                color: red;
                font-style: italic;
            }
        </style> --}}
</head>
<body>

    <div class="container table-container">
        <h1>List of Roles</h1>

        @if($roles->isEmpty())
            <p class="empty-message">No roles available</p>
        @else
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="d-inline">
                            <a href="/roles/{{$role->id}}/edit">
                              <button type="button" class="btn btn-warning"><i class="fa-solid  fa-edit"></i></button>
                            </a> 
                          
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $role->id }})">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          
                            <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                             </div>
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
</body>
</html>


@stop
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(roleId) {
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
            // Submit the form to delete the role
            document.getElementById(`delete-form-${roleId}`).submit();

            // Mostrar mensaje de éxito después de la eliminación
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
        }
    });
}
</script>