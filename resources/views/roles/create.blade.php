@extends('adminlte::page')


@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Roles</title>
</head>
<body>
    <form action="{{route('roles.store')}}" method="POST">
    <H1 class="text-center">CREATE ROLES</H1>
    @csrf

    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Role</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter the role to create" name="name">
      </div>
   
      <button type="submit" class="btn btn-success">Created</button>
    </form>
</body>
</html>
@stop