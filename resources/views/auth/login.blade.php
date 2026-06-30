@extends('layouts.app')
@section('title', 'Login Admin')
@section('content')
<div class="d-flex align-items-center" style="height: 80vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card shadow border-0 p-4">
            <h4 class="fw-bold text-center mb-4">LOG IN ADMIN</h4>
            @if($errors->any())
                <div class="alert alert-danger py-2 small">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" required placeholder="admin@lab.com"></div>
                <div class="mb-4"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required placeholder="******"></div>
                <button type="submit" class="btn btn-primary w-100 fw-bold">Masuk Sistem</button>
            </form>
        </div>
    </div>
</div>
@endsection