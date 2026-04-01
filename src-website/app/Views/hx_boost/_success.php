<div class="card-body text-center py-5" id="boost-form-area">
    <i class="bi bi-check-circle-fill text-success fs-1 d-block mb-3"></i>
    <h5 class="text-success fw-bold">Message sent!</h5>
    <p class="text-muted mb-4">Thank you, <strong><?= esc($name) ?></strong>!</p>
    <a class="btn btn-outline-success"
        href="<?= site_url('hx-boost') ?>"
        hx-boost="true">
        <i class="bi bi-arrow-counterclockwise me-1"></i> Send again
    </a>
</div>