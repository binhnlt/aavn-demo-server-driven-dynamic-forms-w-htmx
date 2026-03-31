<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'HTMX Demo') ?> — HTMX + CI4</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- HTMX 2 -->
    <script src="https://unpkg.com/htmx.org@2.0.4" defer></script>

    <style>
        body { padding-top: 56px; }
        .navbar-brand { font-weight: 700; letter-spacing: -0.5px; }
        .htmx-indicator { opacity: 0; transition: opacity 200ms ease-in; }
        .htmx-request .htmx-indicator { opacity: 1; }
        .htmx-request.htmx-indicator { opacity: 1; }
        .demo-badge {
            font-size: 0.65rem;
            vertical-align: middle;
            padding: 2px 6px;
        }
    </style>
</head>
<body hx-headers='{"<?= csrf_token() ?>": "<?= csrf_hash() ?>"}'>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <span class="text-primary">htmx</span><span class="text-white opacity-75">.demo</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto" hx-boost="true">
                <li class="nav-item">
                    <a class="nav-link <?= (current_url() === base_url('/')) ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= str_contains(current_url(), 'live-search') ? 'active' : '' ?>" href="<?= base_url('live-search') ?>">
                        Live Search <span class="badge bg-primary demo-badge">Demo 1</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= str_contains(current_url(), 'dynamic-form') ? 'active' : '' ?>" href="<?= base_url('dynamic-form') ?>">
                        Dynamic Form <span class="badge bg-success demo-badge">Demo 2</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= str_contains(current_url(), 'todo') ? 'active' : '' ?>" href="<?= base_url('todo') ?>">
                        Todo CRUD <span class="badge bg-warning text-dark demo-badge">Demo 3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= str_contains(current_url(), 'infinite-scroll') ? 'active' : '' ?>" href="<?= base_url('infinite-scroll') ?>">
                        Infinite Scroll <span class="badge bg-danger demo-badge">Demo 4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= str_contains(current_url(), 'form-validation') ? 'active' : '' ?>" href="<?= base_url('form-validation') ?>">
                        Form Validation <span class="badge bg-info text-dark demo-badge">Demo 5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= str_contains(current_url(), 'hx-boost') ? 'active' : '' ?>" href="<?= base_url('hx-boost') ?>">
                        hx-boost <span class="badge bg-secondary demo-badge">Demo 6</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">
    <?= $content ?>
</main>

<footer class="border-top mt-5 py-3 text-center text-muted small">
    HTMX + CodeIgniter 4 Demo &mdash; <a href="https://htmx.org" target="_blank" class="text-muted">htmx.org</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
