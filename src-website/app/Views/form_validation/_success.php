<div id="form-container">
    <div class="card border-success shadow-sm">
        <div class="card-body text-center py-5">
            <i class="bi bi-check-circle-fill text-success fs-1 d-block mb-3"></i>
            <h4 class="text-success fw-bold">Message sent!</h4>
            <p class="text-muted mb-4">
                Thank you, <strong><?= esc($name) ?></strong>! We'll get back to you shortly.
            </p>
            <button class="btn btn-outline-success"
                hx-get="<?= base_url('form-validation/reset') ?>"
                hx-target="#form-container"
                hx-swap="outerHTML">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Send another message
            </button>
        </div>
    </div>
</div>
