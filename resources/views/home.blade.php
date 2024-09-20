{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        @if(auth()->user()->hasRole('teacher'))
        <h1>PRUEBA</h1>
        @endif
</div>
@endsection --}}


@extends('adminlte::page')

@section('title', 'English Academy Dashboard')

@section('content_header')
@if(auth()->user()->hasRole('teacher'))
<h1>Hi Teacher, {{ Auth::user()->name }} </h1>
@endif

@if(auth()->user()->hasRole('student'))
<h1>Hi Student, {{ Auth::user()->name }} </h1>
@endif
@stop

@section('content')
    <p>Welcome to the English Academy</p>
    
@stop





{{-- Section Footer --}}
@section('footer')
    <p>© 2024 English Academy. All rights reserved. | Privacy Policy | Terms & Conditions
    </p>
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop