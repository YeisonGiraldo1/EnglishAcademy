@extends('adminlte::page')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IndeX Roles</title>
</head>
<body>
    <h1>LIST OF ROLES</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($roles as $r)
          <tr>
            <td>{{$r->name}}</td>
            @empty
            <p>no hay roles</p>
          </tr>
          @endforelse
        </tbody>
      </table>
</body>
</html>

@stop