<div class="row mb-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active">Infinite Scroll</li>
            </ol>
        </nav>
        <h2 class="fw-bold">Demo 4 — Infinite Scroll</h2>
        <p class="text-muted">Scroll to the bottom to load more articles. <strong>Sentinel pattern</strong> — HTMX detects when the last element enters the viewport.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="row g-3" id="article-list">
            <?= view('infinite_scroll/_page', ['articles' => $articles, 'page' => $page, 'hasMore' => $hasMore]) ?>
        </div>
    </div>

    <div class="col-lg-4 d-none d-lg-block">
        <div class="card bg-dark text-white sticky-top" style="top: 70px;">
            <div class="card-header border-secondary">
                <small class="text-muted">Sentinel Pattern</small>
            </div>
            <div class="card-body">
                <p class="small text-muted mb-3">The last card carries <code class="text-warning">hx-trigger="revealed"</code>. When it enters the viewport, HTMX automatically loads the next page.</p>
                <pre class="text-success small mb-0"><code>&lt;!-- Last card on page N --&gt;
&lt;div
  hx-get="/infinite-scroll
          /page?page=<?= $page + 1 ?>"
  hx-trigger="revealed"
  hx-swap="afterend"
  hx-target="this"&gt;
  ...content...
&lt;/div&gt;

&lt;!-- When revealed:
  - Load page N+1
  - Swap "afterend" (append)
  - New last card carries
    the next sentinel --&gt;</code></pre>
            </div>
        </div>
    </div>
</div>
