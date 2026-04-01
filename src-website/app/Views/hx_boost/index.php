<div class="row mb-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active">hx-boost</li>
            </ol>
        </nav>
        <h2 class="fw-bold">Demo 6 — hx-boost</h2>
        <p class="text-muted">
            <strong>One single attribute</strong> turns navigation and forms into SPA-like interactions.
            Live demo: remove <code>hx-boost="true"</code> from the form to see the difference.
        </p>
    </div>
</div>

<!-- Visual explanation -->
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <i class="bi bi-x-circle me-1"></i> Without hx-boost (Full reload)
            </div>
            <div class="card-body small ">
                <ul class="mb-0">
                    <li>Browser reloads the entire page</li>
                    <li>White flash on screen</li>
                    <li>CSS/JS is re-parsed</li>
                    <li>Scroll position resets</li>
                    <li>Worse user experience</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <i class="bi bi-check-circle me-1"></i> With hx-boost (Smooth swap)
            </div>
            <div class="card-body small ">
                <ul class="mb-0">
                    <li>HTMX fetches content via AJAX</li>
                    <li>Only the <code>&lt;body&gt;</code> is swapped</li>
                    <li>CSS/JS is not reloaded</li>
                    <li>Browser history still works</li>
                    <li>Back button works normally</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Demo form</h5>
                <span class="badge bg-success">hx-boost="true" is ON</span>
            </div>
            <div id="boost-form-area">
                <?= view('hx_boost/_form', ['error' => null, 'old' => []]) ?>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card bg-dark text-white">
            <div class="card-header border-secondary">
                <small class="">Just add 1 attribute</small>
            </div>
            <div class="card-body">
                <pre class="text-success small mb-3"><code>&lt;!-- Before hx-boost --&gt;
&lt;form action="/hx-boost"
      method="POST"&gt;
  ...
&lt;/form&gt;</code></pre>

                <pre class="text-warning small mb-3"><code>&lt;!-- After adding hx-boost --&gt;
&lt;form action="/hx-boost"
      method="POST"
      hx-boost="true"&gt;  ← add this
  ...
&lt;/form&gt;</code></pre>
                <hr class="border-secondary">
                <div class="alert alert-warning py-2 mb-0">
                    <strong class="small">Live demo tip:</strong>
                    <span class="small"> Remove <code>hx-boost="true"</code> → submit the form → see the full page reload. Add it back → smooth.</span>
                </div>
            </div>
        </div>

        <div class="card bg-dark text-white mt-3">
            <div class="card-header border-secondary">
                <small class="">hx-boost on the nav (whole app)</small>
            </div>
            <div class="card-body">
                <pre class="text-info small"><code>&lt;nav hx-boost="true"&gt;
  &lt;a href="/live-search"&gt;
    Live Search
  &lt;/a&gt;
  &lt;a href="/todo"&gt;
    Todo
  &lt;/a&gt;
  &lt;!-- All links in nav
    become SPA-like --&gt;
&lt;/nav&gt;</code></pre>
                <p class="small  mb-0 mt-2">This demo's navbar uses <code>hx-boost="true"</code>. Notice the URL changes but there's no full reload.</p>
            </div>
        </div>
    </div>
</div>
