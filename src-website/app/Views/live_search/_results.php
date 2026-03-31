<?php if (empty($q)): ?>
    <div class="text-center text-muted py-4">
        <i class="bi bi-search fs-2 d-block mb-2 opacity-25"></i>
        Start typing to search...
    </div>
<?php elseif (empty($results)): ?>
    <div class="text-center text-muted py-4">
        <i class="bi bi-emoji-frown fs-2 d-block mb-2 opacity-25"></i>
        No results found for "<strong><?= esc($q) ?></strong>"
    </div>
<?php else: ?>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <small class="text-muted">
            Found <strong><?= count($results) ?></strong> result(s) for "<strong><?= esc($q) ?></strong>"
        </small>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th class="text-end">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $product): ?>
                    <tr>
                        <td class="fw-semibold"><?= esc($product['name']) ?></td>
                        <td>
                            <span class="badge bg-secondary"><?= esc($product['brand']) ?></span>
                        </td>
                        <td><?= esc($product['category']) ?></td>
                        <td class="text-end text-primary fw-semibold">
                            $<?= number_format($product['price'], 2) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
