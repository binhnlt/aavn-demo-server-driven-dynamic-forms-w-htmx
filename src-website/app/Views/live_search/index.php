<div class="row mb-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active">Live Search</li>
            </ol>
        </nav>
        <h2 class="fw-bold">Demo 1 — Live Search</h2>
        <p class="text-muted">Type in the search box — the server returns results instantly. <strong>Zero JavaScript</strong>.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3 position-relative">
                    <label class="form-label fw-semibold">Search products</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input
                            type="search"
                            name="q"
                            class="form-control form-control-lg"
                            placeholder="Search by name, brand, or category..."
                            autocomplete="off"
                            hx-get="<?= base_url('live-search/results') ?>"
                            hx-trigger="keyup changed delay:300ms, search"
                            hx-target="#results"
                            hx-indicator="#search-spinner">
                        <span id="search-spinner" class="input-group-text htmx-indicator">
                            <span class="spinner-border spinner-border-sm"></span>
                        </span>
                    </div>
                    <div class="form-text">Type at least 1 character. Results appear after a 300ms debounce.</div>
                </div>

                <div id="results">
                    <div class="text-center text-muted py-4">
                        <i class="bi bi-search fs-2 d-block mb-2 opacity-25"></i>
                        Start typing to search...
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4">
        <div class="card bg-dark text-white">
            <div class="card-header border-secondary">
                <small class="text-muted">HTML — that's all it takes</small>
            </div>
            <div class="card-body">
                <pre class="text-success small"><code>&lt;input
  type="search"
  name="q"
  hx-get="/live-search/results"
  hx-trigger="keyup changed
               delay:300ms"
  hx-target="#results"
  hx-indicator="#spinner"
&gt;</code></pre>
                <hr class="border-secondary">
                <p class="small text-muted mb-1"><strong class="text-white">hx-trigger breakdown:</strong></p>
                <ul class="small text-muted">
                    <li><code class="text-warning">keyup changed</code> — only fires when value actually changes</li>
                    <li><code class="text-warning">delay:300ms</code> — debounce, avoids request spam</li>
                    <li><code class="text-info">hx-indicator</code> — auto-shows spinner during request</li>
                </ul>
            </div>
        </div>
    </div>
</div>
