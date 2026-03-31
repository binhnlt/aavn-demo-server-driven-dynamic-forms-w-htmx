<?php foreach ($articles as $index => $article):
    $isLast   = $index === array_key_last($articles);
    $nextPage = $page + 1;
?>
    <div class="col-md-6"
        <?php if ($isLast && $hasMore): ?>
            hx-get="<?= base_url('infinite-scroll/page?page=' . $nextPage) ?>"
            hx-trigger="revealed"
            hx-swap="afterend"
            hx-target="this"
            hx-indicator="#scroll-loading"
        <?php endif; ?>>
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-title fw-semibold"><?= esc($article['title']) ?></h6>
                <p class="card-text text-muted small"><?= esc($article['excerpt']) ?></p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center bg-transparent">
                <small class="text-muted">
                    <i class="bi bi-person me-1"></i><?= esc($article['author']) ?>
                </small>
                <small class="text-muted">
                    <?= date('M d, Y', strtotime($article['created_at'])) ?>
                </small>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php if (! $hasMore): ?>
    <div class="col-12">
        <div class="text-center text-muted py-3">
            <i class="bi bi-check2-all me-1"></i>All <?= $page * 10 ?> articles loaded
        </div>
    </div>
<?php else: ?>
    <div class="col-12 text-center py-2" id="scroll-loading">
        <span class="spinner-border spinner-border-sm text-primary me-2 htmx-indicator"></span>
        <span class="text-muted small htmx-indicator">Loading more...</span>
    </div>
<?php endif; ?>
