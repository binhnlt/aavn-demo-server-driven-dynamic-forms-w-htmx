<div class="row mb-4">
    <div class="col">
        <h1 class="display-5 fw-bold">HTMX Demo</h1>
        <p class="lead text-muted">6 demos showcasing HTMX features with CodeIgniter 4 + Docker</p>
        <hr>
    </div>
</div>

<div class="row g-4">

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-primary">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Demo 1</span>
                <span class="badge bg-white text-primary">hx-get + hx-trigger</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Live Search</h5>
                <p class="card-text text-muted small">Search as you type — filter data from the server without reloading the page. Zero JavaScript.</p>
                <div class="mb-2">
                    <code class="small text-primary">hx-trigger="keyup changed delay:300ms"</code>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?= base_url('live-search') ?>" class="btn btn-primary w-100">View Demo →</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-success">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Demo 2</span>
                <span class="badge bg-white text-success">3-layer logic</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Dynamic Form</h5>
                <p class="card-text text-muted small">UI State · Validation State · Interaction Mode — three logic layers entirely controlled by the server.</p>
                <div class="mb-2">
                    <code class="small text-success">hx-trigger="change" + "blur"</code>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?= base_url('dynamic-form') ?>" class="btn btn-success w-100">View Demo →</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-warning">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Demo 3</span>
                <span class="badge bg-dark text-white">hx-put + hx-delete</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Todo CRUD</h5>
                <p class="card-text text-muted small">Add / edit / delete inline. Not a single line of JavaScript. The server returns an HTML fragment.</p>
                <div class="mb-2">
                    <code class="small text-warning">hx-swap="outerHTML"</code>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?= base_url('todo') ?>" class="btn btn-warning w-100">View Demo →</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-danger">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Demo 4</span>
                <span class="badge bg-white text-danger">hx-trigger="revealed"</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Infinite Scroll</h5>
                <p class="card-text text-muted small">Load more content as you scroll to the bottom — sentinel pattern with HTMX.</p>
                <div class="mb-2">
                    <code class="small text-danger">hx-swap="afterend"</code>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?= base_url('infinite-scroll') ?>" class="btn btn-danger w-100">View Demo →</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-info">
            <div class="card-header bg-info text-dark d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Demo 5</span>
                <span class="badge bg-dark text-white">hx-post + swap</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Form Validation</h5>
                <p class="card-text text-muted small">Server-side validation with inline error display. No client-side validation library needed.</p>
                <div class="mb-2">
                    <code class="small text-info">hx-target="#form-container"</code>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?= base_url('form-validation') ?>" class="btn btn-info w-100">View Demo →</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-secondary">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Demo 6</span>
                <span class="badge bg-white text-secondary">1 attribute</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">hx-boost</h5>
                <p class="card-text text-muted small">Add <code>hx-boost="true"</code> to any element and the entire navigation becomes SPA-like. Live-remove to see the difference.</p>
                <div class="mb-2">
                    <code class="small text-secondary">hx-boost="true"</code>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="<?= base_url('hx-boost') ?>" class="btn btn-secondary w-100">View Demo →</a>
            </div>
        </div>
    </div>

</div>

<div class="row mt-5">
    <div class="col">
        <div class="alert alert-dark d-flex align-items-start gap-3">
            <i class="bi bi-info-circle-fill fs-5 mt-1 flex-shrink-0"></i>
            <div>
                <strong>Presenter tip:</strong> Open DevTools → Network tab before each demo so the audience can see the HTMX requests and the HTML fragments returned by the server.
            </div>
        </div>
    </div>
</div>
