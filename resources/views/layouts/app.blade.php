<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Lab') - NIM 241011750090</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        html, body { height: 100%; m-0; }
        body { display: flex; flex-direction: column; min-height: 100vh; }
        .main-content { flex: 1; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/"><i class="bi bi-cpu-fill me-2"></i>LAB-TECH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2 align-items-center">
                    <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/data-lab">Data Lab</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-primary btn-sm px-3 ms-lg-2">Login Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        @yield('content')
    </div>

    <footer class="bg-dark text-white-50 py-4 border-top border-secondary">
        <div class="container text-center">
            <h5 class="fw-bold text-white mb-1">UAS-241011750090-QAIDAL.LAB</h5>
            <p class="small mb-0 text-secondary">Sistem Informasi Inventaris Alat Laboratorium &copy; 2026</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>