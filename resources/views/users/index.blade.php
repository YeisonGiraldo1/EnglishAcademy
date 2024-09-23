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
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                      <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{$u->getRolename()}}</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="fa-solid  fa-trash"></i></button>
                            <button type="button" class="btn btn-warning"><i class="fa-solid  fa-edit"></i></button>
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

