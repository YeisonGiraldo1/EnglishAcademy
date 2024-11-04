@extends('adminlte::page')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Class</title>
</head>
<body>
    <h1 class="text-center">CREATE CLASS</h1>
    
<form action="{{route('classes.store')}}" method="POST"> 
    @csrf 
    <div class="row"> <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Enter the name of class">
      </div>
 


      <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Level</label>
        <select class="form-control" name="level" id="">
            <option value="" disabled>Select Level</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="C1">C1</option>
        </select>
    </div>
</div>

<div class="row">
   
<div class="col-md-6">
    <label for="exampleFormControlInput1" class="form-label">Teacher</label>
 <select class="form-control" name="teacher_id" id="">
    @foreach($teachers as $t)
    <option value="{{$t->id}}">{{$t->name}}</option>
    @endforeach
 </select>
</div>



<div class="col-md-6">
    <label for="exampleFormControlInput1" class="form-label">Date</label>
    <input type="date" class="form-control" id="exampleFormControlInput1" name="date">
</div>
</div>


<div class="row">
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Start time</label>
        <input type="time" class="form-control" id="exampleFormControlInput1" name="start_time" id="">
    </div>


    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">End time</label>
        <input type="time" class="form-control" id="exampleFormControlInput1" name="end_time" id=""> </div>
</div>


<div class="row">
    <div class="col-md-6">
    <label for="exampleFormControlInput1" class="form-label">headquarters(Place)</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="headquarters" placeholder="Enter the place ">
    </div>



    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Classroom</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="classroom" placeholder="Enter the Classroom ">
        </div>
</div>

   

<br>
    <button type="submit" class="btn btn-success">Create Class</button> </form>
</body>


</html>

@stop
