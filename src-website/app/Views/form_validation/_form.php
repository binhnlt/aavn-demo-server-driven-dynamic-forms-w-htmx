<div id="form-container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Contact Us</h5>
        </div>
        <div class="card-body">
            <form
                hx-post="<?= base_url('form-validation') ?>"
                hx-target="#form-container"
                hx-swap="outerHTML"
                hx-indicator="#submit-spinner">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name"
                        class="form-control <?= isset($errors['name']) ? 'is-invalid' : (isset($old['name']) && $old['name'] ? 'is-valid' : '') ?>"
                        value="<?= esc($old['name'] ?? '') ?>"
                        placeholder="John Doe">
                    <?php if (isset($errors['name'])): ?>
                        <div class="invalid-feedback"><?= esc($errors['name']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email"
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : (isset($old['email']) && $old['email'] ? 'is-valid' : '') ?>"
                        value="<?= esc($old['email'] ?? '') ?>"
                        placeholder="you@example.com">
                    <?php if (isset($errors['email'])): ?>
                        <div class="invalid-feedback"><?= esc($errors['email']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone <span class="text-danger">*</span></label>
                    <input type="tel" name="phone"
                        class="form-control <?= isset($errors['phone']) ? 'is-invalid' : (isset($old['phone']) && $old['phone'] ? 'is-valid' : '') ?>"
                        value="<?= esc($old['phone'] ?? '') ?>"
                        placeholder="0901234567">
                    <?php if (isset($errors['phone'])): ?>
                        <div class="invalid-feedback"><?= esc($errors['phone']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                    <textarea name="message" rows="4"
                        class="form-control <?= isset($errors['message']) ? 'is-invalid' : (isset($old['message']) && $old['message'] ? 'is-valid' : '') ?>"
                        placeholder="Your message..."><?= esc($old['message'] ?? '') ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <div class="invalid-feedback"><?= esc($errors['message']) ?></div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger py-2 small">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        Please fix the errors above before submitting.
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary">
                    <span id="submit-spinner" class="htmx-indicator spinner-border spinner-border-sm me-2"></span>
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
