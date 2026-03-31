<!-- Level 2: Language — replaces #language-group via outerHTML swap -->
<div id="language-group">
    <div class="mb-3">
        <label class="form-label fw-semibold">
            <span class="badge bg-warning text-dark rounded-circle me-1">2</span>Language
            <span class="badge bg-success ms-1">Validation State: required</span>
        </label>
        <select name="language_id" class="form-select" required
            hx-get="<?= base_url('dynamic-form/frameworks') ?>"
            hx-trigger="change"
            hx-target="#framework-group"
            hx-swap="outerHTML"
            hx-include="this"
            hx-indicator="#language-spinner">
            <option value="">-- Select a language --</option>
            <?php foreach ($languages as $lang): ?>
                <option value="<?= esc($lang['id']) ?>"><?= esc($lang['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <span id="language-spinner" class="htmx-indicator text-muted small mt-1">
            <span class="spinner-border spinner-border-sm me-1"></span>Loading frameworks...
        </span>
        <div class="form-text text-success small">
            <i class="bi bi-check-circle me-1"></i>
            Server rendered <code>required</code> — this field only exists once a platform is chosen.
        </div>
    </div>

    <!-- Level 3 will be injected here -->
    <div id="framework-group"></div>
</div>
