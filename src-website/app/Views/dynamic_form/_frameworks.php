<!-- Level 3: Framework — replaces #framework-group via outerHTML swap -->
<div id="framework-group">
    <div class="mb-3">
        <label class="form-label fw-semibold">
            <span class="badge bg-danger rounded-circle me-1">3</span>Framework
            <span class="badge bg-success ms-1">Validation State: required</span>
        </label>
        <select name="framework_id" class="form-select" required
            hx-get="<?= base_url('dynamic-form/tools') ?>"
            hx-trigger="change"
            hx-target="#tools-card"
            hx-swap="outerHTML"
            hx-include="this"
            hx-indicator="#framework-spinner">
            <option value="">-- Select a framework --</option>
            <?php foreach ($frameworks as $fw): ?>
                <option value="<?= esc($fw['id']) ?>"><?= esc($fw['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <span id="framework-spinner" class="htmx-indicator text-muted small mt-1">
            <span class="spinner-border spinner-border-sm me-1"></span>Loading setup info...
        </span>
        <div class="form-text text-success small">
            <i class="bi bi-check-circle me-1"></i>
            Server rendered <code>required</code> — this field only exists once a language is chosen.
        </div>
    </div>

    <!-- Level 4: Setup card will be injected here -->
    <div id="tools-card"></div>
</div>
