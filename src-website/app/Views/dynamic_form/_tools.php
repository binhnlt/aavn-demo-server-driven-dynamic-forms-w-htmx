<!-- Level 4: Setup card — replaces #tools-card via outerHTML swap -->
<div id="tools-card">
    <div class="card border-success mt-3">
        <div class="card-header bg-success text-white d-flex align-items-center gap-2">
            <i class="bi bi-terminal-fill"></i>
            <strong><?= esc($framework['name']) ?></strong>
            <span class="badge bg-light text-success ms-auto">
                <i class="bi bi-server me-1"></i>Server-rendered setup card
            </span>
        </div>
        <div class="card-body">

            <?php if (!empty($framework['description'])): ?>
                <p class="text-muted small mb-3"><?= esc($framework['description']) ?></p>
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">
                    <i class="bi bi-play-circle me-1"></i>Setup Command
                </label>
                <pre class="bg-dark text-success rounded p-3 mb-0 small"><code><?= esc($framework['setup_command']) ?></code></pre>
            </div>

            <?php if (!empty($framework['libraries'])): ?>
                <div>
                    <label class="form-label fw-semibold small text-uppercase text-muted">
                        <i class="bi bi-boxes me-1"></i>Popular Libraries
                    </label>
                    <div class="d-flex flex-wrap gap-2">
                        <?php foreach (explode(',', $framework['libraries']) as $lib): ?>
                            <span class="badge bg-secondary"><?= esc(trim($lib)) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <div class="card-footer text-muted small">
            <i class="bi bi-lightning-charge me-1 text-warning"></i>
            This entire card was rendered server-side — zero JavaScript, just <code>hx-include="this"</code>.
        </div>
    </div>
</div>
