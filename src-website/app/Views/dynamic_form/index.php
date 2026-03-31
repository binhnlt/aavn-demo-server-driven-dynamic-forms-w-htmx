<div class="row mb-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active">Dynamic Form</li>
            </ol>
        </nav>
        <h2 class="fw-bold">Demo 2 — Dynamic Form</h2>
        <p class="text-muted">The server controls all 3 logic layers: <strong>UI State</strong>, <strong>Validation State</strong>, and <strong>Interaction Mode</strong>. Three levels of field dependency — <strong>zero JavaScript</strong>.</p>
    </div>
</div>

<!-- 3 layer explanation -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-primary h-100">
            <div class="card-body">
                <h6 class="card-title text-primary"><i class="bi bi-eye me-1"></i>Layer 1 — UI State</h6>
                <p class="card-text small text-muted">
                    Select Platform → Language dropdown appears.<br>
                    Select Language → Framework dropdown appears.<br>
                    Select Framework → Setup card appears.<br>
                    <strong>Client has zero knowledge of this logic.</strong>
                </p>
                <code class="small">hx-trigger="change"</code>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success h-100">
            <div class="card-body">
                <h6 class="card-title text-success"><i class="bi bi-check-circle me-1"></i>Layer 2 — Validation State</h6>
                <p class="card-text small text-muted">
                    Each child field only receives <code>required</code> once its parent is chosen. The server renders the attribute dynamically — browser validation works automatically.
                </p>
                <code class="small">required — rendered by server</code>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-warning h-100">
            <div class="card-body">
                <h6 class="card-title text-warning"><i class="bi bi-lightning me-1"></i>Layer 3 — Interaction Mode</h6>
                <p class="card-text small text-muted">
                    Email validates immediately on <code>blur</code>. The full form validates on submit. Two modes, one server, no duplication.
                </p>
                <code class="small">hx-trigger="blur"</code>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Form -->
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Tech Stack Builder</h5>
                <small class="text-muted">Platform → Language → Framework → Setup Command</small>
            </div>
            <div class="card-body">
                <form id="stack-form">

                <!-- ── Level 1: Platform ────────────────────────────────── -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <span class="badge bg-primary rounded-circle me-1">1</span>Platform
                    </label>
                    <select name="platform_id" class="form-select"
                        hx-get="<?= base_url('dynamic-form/languages') ?>"
                        hx-trigger="change"
                        hx-target="#language-group"
                        hx-swap="outerHTML"
                        hx-include="this"
                        hx-indicator="#platform-spinner">
                        <option value="">-- Select a platform --</option>
                        <?php foreach ($platforms as $p): ?>
                            <option value="<?= esc($p['id']) ?>">
                                <i class="<?= esc($p['icon']) ?>"></i> <?= esc($p['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span id="platform-spinner" class="htmx-indicator text-muted small mt-1">
                        <span class="spinner-border spinner-border-sm me-1"></span>Loading languages...
                    </span>
                </div>

                <!-- ── Levels 2 & 3 will be injected here ──────────────── -->
                <div id="language-group"></div>

                <hr class="my-4">

                <!-- ── Email: Interaction Mode ──────────────────────────── -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-envelope me-1"></i>Work Email
                        <span class="badge bg-warning text-dark ms-1">Interaction Mode</span>
                    </label>
                    <input type="email" name="email" class="form-control"
                        placeholder="you@company.com"
                        hx-post="<?= base_url('dynamic-form/validate-email') ?>"
                        hx-trigger="blur"
                        hx-target="#email-feedback"
                        hx-swap="innerHTML">
                    <div id="email-feedback"></div>
                    <div class="form-text">Validates immediately when you leave the field — not on submit.</div>
                </div>

                <hr class="my-4">

                <!-- ── Submit ──────────────────────────────────────────────── -->
                <button type="button" class="btn btn-primary"
                    hx-post="<?= base_url('dynamic-form/submit') ?>"
                    hx-include="#stack-form"
                    hx-target="#form-result"
                    hx-swap="innerHTML"
                    hx-indicator="#submit-spinner">
                    <i class="bi bi-send me-1"></i>Submit Stack
                </button>
                <span id="submit-spinner" class="htmx-indicator text-muted small ms-2">
                    <span class="spinner-border spinner-border-sm me-1"></span>Processing...
                </span>

                </form><!-- /#stack-form -->

            </div>
        </div>

        <div id="form-result" class="mt-3"></div>
    </div>

    <!-- Code panel -->
    <div class="col-lg-5">
        <div class="card bg-dark text-white">
            <div class="card-header border-secondary d-flex justify-content-between align-items-center">
                <small class="text-muted">The chain — HTML only, zero JS</small>
                <span class="badge bg-success">Self-propagating</span>
            </div>
            <div class="card-body small">
                <pre class="text-success mb-2"><code>&lt;!-- Level 1: Platform --&gt;
&lt;select name="platform_id"
  hx-get="/languages"
  hx-trigger="change"
  hx-include="this"    ← sends ?platform_id=X
  hx-target="#language-group"
  hx-swap="outerHTML"&gt;
&lt;/select&gt;
&lt;div id="language-group"&gt;&lt;/div&gt;</code></pre>
                <pre class="text-warning mb-2"><code>&lt;!-- _languages.php (server) --&gt;
&lt;div id="language-group"&gt;
  &lt;select name="language_id"
    hx-get="/frameworks"
    hx-include="this"  ← ?language_id=X
    hx-target="#framework-group"
    required&gt;    ← Validation State
  &lt;/select&gt;
  &lt;div id="framework-group"&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>
                <pre class="text-info mb-0"><code>&lt;!-- _frameworks.php (server) --&gt;
&lt;div id="framework-group"&gt;
  &lt;select name="framework_id"
    hx-get="/tools"
    hx-include="this"  ← ?framework_id=X
    hx-target="#tools-card"
    required&gt;
  &lt;/select&gt;
  &lt;div id="tools-card"&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
        <div class="alert alert-info mt-3 small">
            <i class="bi bi-lightbulb me-1"></i>
            <strong>Key insight:</strong> <code>hx-include="this"</code> appends the select's <code>name=value</code> as a query param. Each server response includes the <em>next level's select</em> with its own <code>hx-get</code> already wired — the chain self-propagates with zero JavaScript.
        </div>
    </div>
</div>
