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
    <title>Index Classes</title>

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
        <h1>List of Classes</h1>

        @if($classes->isEmpty())
            <p class="empty-message">No Classes available</p>
        @else
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th>Level</th>
                        <th>Teacher</th>
                        <th>Date</th>
                        <th>Start_Time</th>
                        <th>End_Time</th>
                        <th>Headquarters</th>
                        <th>Classroom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                    <tr>
                        <td>{{$class->name }}</td>
                         <td>{{$class->level}}</td>
                        <td>{{$class->teacher_id}}</td>
                        <td>{{$class->date}}</td>
                        <td>{{$class->start_time}}</td>
                        <td>{{$class->end_time}}</td>
                        <td>{{$class->headquarters}}</td>
                        <td>{{$class->classroom}}</td>
                        <td>
                            <div class="d-inline">
                            <a href="/classes/{{$class->id}}/edit">
                              <button type="button" class="btn btn-warning"><i class="fa-solid  fa-edit"></i></button>
                            </a> 
                          
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $class->id }})">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          
                            {{-- <form id="delete-form-{{ $class->id }}" action="{{ route('class.destroy', $class->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form> --}}
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