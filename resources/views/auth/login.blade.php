@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="d-flex align-items-center" style="height: 80vh;">
    <div class="container" style="max-width: 420px;">
        <div class="card shadow border-0 p-4 rounded-3">
            <h4 class="fw-bold text-center mb-4 text-dark" style="letter-spacing: 0.5px;">LOG IN ADMIN</h4>
            
            @if($errors->any())
                <div class="alert alert-danger py-2 px-3 small border-0 mb-3" style="background-color: #f8d7da; color: #842029;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label small fw-medium text-secondary">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="admin@lab.com" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label small fw-medium text-secondary">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="******" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">Masuk Sistem</button>
            </form>

            <hr class="text-muted opacity-25 my-4">

            <div class="text-center">
                <p class="text-muted small mb-0" style="font-size: 13px; letter-spacing: 0.3px;">
                    Demo Login : <span class="fw-semibold text-dark">admin@petcare.com</span> / <span class="fw-semibold text-dark">password</span>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection