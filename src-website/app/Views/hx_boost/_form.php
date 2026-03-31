<div class="card-body" id="boost-form-area">
    <?php if ($error): ?>
        <div class="alert alert-danger py-2 small">
            <i class="bi bi-exclamation-triangle me-1"></i><?= esc($error) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('hx-boost') ?>" method="POST"
        hx-boost="true"
        hx-target="#boost-form-area"
        hx-swap="outerHTML">

        <div class="mb-3">
            <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control"
                value="<?= esc($old['name'] ?? '') ?>"
                placeholder="John Doe" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
            <textarea name="message" rows="3" class="form-control"
                placeholder="Your message..."><?= esc($old['message'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-send me-1"></i> Send
        </button>
    </form>
</div>
