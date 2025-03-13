@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body text-center">
            

            <h3 class="card-title">Welcome to <strong>{{ env('APP_TITLE') }}</strong> </h3>
            
            <a href="{{ route('auth.student.login') }}"  class="btn btn-danger">  Student-Login</a>
            <a href="{{ route('auth.teacher.login') }}"  class="btn btn-danger">  Teacher-Login</a>
            <a href="{{ route('auth.admin.login') }}"  class="btn btn-danger">  Admin-Login</a>
        </div>
    </div>
</div>
@endsection