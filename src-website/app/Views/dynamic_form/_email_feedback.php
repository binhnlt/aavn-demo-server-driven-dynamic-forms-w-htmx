<?php if (empty($email)): ?>
<?php elseif ($valid): ?>
    <div class="text-success small mt-1">
        <i class="bi bi-check-circle-fill me-1"></i>Valid email address
    </div>
<?php else: ?>
    <div class="text-danger small mt-1">
        <i class="bi bi-x-circle-fill me-1"></i>Invalid email format
    </div>
<?php endif; ?>
