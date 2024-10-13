@extends('adminlte::page')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
    <h1 class="text-center">UPDATE USER</h1>
    
<form action="{{ route('users.update'   , $user->id)}}" method="POST">

    @csrf
    @method('PUT')

    <div class="row">
      
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Enter the name of user" value="{{$user->name}}">
      </div>
 


      <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Enter the email of user"  value="{{$user->email}}">
    </div>
</div>


    <div class="row">
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Enter the password of user"  value="{{$user->password    }}">
          </div>
       

          <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Role</label>
         <select class="form-control" name="role_id" id="">
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
         </select>
      </div>
    </div>

<br>
    <button type="submit" class="btn btn-success">Update User</button>
    </form>
</body>
</html>

@stop
