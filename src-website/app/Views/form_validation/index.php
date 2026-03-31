<div class="row mb-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active">Form Validation</li>
            </ol>
        </nav>
        <h2 class="fw-bold">Demo 5 — Form Validation</h2>
        <p class="text-muted">Server-side validation with inline error display. No client-side validation library needed.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div id="form-container">
            <?= view('form_validation/_form', ['errors' => [], 'old' => []]) ?>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card bg-dark text-white">
            <div class="card-header border-secondary">
                <small class="text-muted">HTML — form with HTMX</small>
            </div>
            <div class="card-body">
                <pre class="text-success small mb-3"><code>&lt;form
  hx-post="/form-validation"
  hx-target="#form-container"
  hx-swap="outerHTML"&gt;
  ...
&lt;/form&gt;</code></pre>
                <hr class="border-secondary">
                <p class="small text-muted mb-2"><strong class="text-white">On submit:</strong></p>
                <ul class="small text-muted">
                    <li>HTMX POSTs form data to server</li>
                    <li>Server validates — if invalid, returns <code class="text-warning">_form.php</code> with errors</li>
                    <li>If valid, returns <code class="text-info">_success.php</code></li>
                    <li><code class="text-warning">hx-swap="outerHTML"</code> replaces the entire <code>#form-container</code></li>
                </ul>
                <hr class="border-secondary">
                <p class="small text-muted mb-1"><strong class="text-white">Server PHP:</strong></p>
                <pre class="text-info small"><code>if (!$this->validate($rules)) {
    return view('_form', [
        'errors' => $this->validator
                         ->getErrors(),
        'old'    => $request->getPost(),
    ]);
}
return view('_success');</code></pre>
            </div>
        </div>
    </div>
</div>
