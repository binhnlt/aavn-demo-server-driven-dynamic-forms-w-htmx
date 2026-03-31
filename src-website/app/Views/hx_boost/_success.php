<div class="card-body text-center py-5" id="boost-form-area">
    <i class="bi bi-check-circle-fill text-success fs-1 d-block mb-3"></i>
    <h5 class="text-success fw-bold">Message sent!</h5>
    <p class="text-muted mb-4">Thank you, <strong><?= esc($name) ?></strong>!</p>
    <button class="btn btn-outline-success"
        hx-get="<?= base_url('hx-boost') ?>"
        hx-target="#boost-form-area"
        hx-swap="outerHTML">
        <i class="bi bi-arrow-counterclockwise me-1"></i> Send again
    </button>
</div>
