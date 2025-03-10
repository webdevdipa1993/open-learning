@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body text-center">
            
            <!-- show success -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif    
            <!-- the display message ends here -->  

            <h3 class="card-title">Welcome, <strong>AS STUDENT</strong> {{ auth()->guard('admin')->user()->name }}</h3>
            <p class="card-text text-muted">{{ auth()->guard('admin')->user()->email }}</p>
            <form action="{{ route('auth.admin.logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            <a href="{{ route('auth.admin.logout') }}"  class="btn btn-danger">  GET-Logout</a>
        </div>
    </div>
</div>
@endsection