<div class="card border-success">
    <div class="card-header bg-success text-white d-flex align-items-center gap-2">
        <i class="bi bi-check-circle-fill"></i>
        <strong>Stack Submitted</strong>
        <span class="ms-auto small opacity-75"><?= date('H:i:s') ?></span>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm mb-0">
            <tbody>
                <tr>
                    <th class="ps-3 text-muted" style="width:140px">Platform</th>
                    <td class="pe-3">
                        <?php if ($platform): ?>
                            <span class="fw-semibold"><?= esc($platform['name']) ?></span>
                        <?php else: ?>
                            <span class="badge bg-secondary">not selected</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th class="ps-3 text-muted">Language</th>
                    <td class="pe-3">
                        <?php if ($language): ?>
                            <span class="fw-semibold"><?= esc($language['name']) ?></span>
                        <?php else: ?>
                            <span class="badge bg-secondary">not selected</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th class="ps-3 text-muted">Framework</th>
                    <td class="pe-3">
                        <?php if ($framework): ?>
                            <span class="fw-semibold"><?= esc($framework['name']) ?></span>
                        <?php else: ?>
                            <span class="badge bg-secondary">not selected</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th class="ps-3 text-muted">Setup Command</th>
                    <td class="pe-3">
                        <?php if ($framework && !empty($framework['setup_command'])): ?>
                            <code class="small"><?= esc($framework['setup_command']) ?></code>
                        <?php else: ?>
                            <span class="badge bg-secondary">n/a</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th class="ps-3 text-muted">Email</th>
                    <td class="pe-3">
                        <?php if (!empty($email)): ?>
                            <?= esc($email) ?>
                        <?php else: ?>
                            <span class="badge bg-secondary">not provided</span>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted small">
        <i class="bi bi-lightning-charge me-1 text-warning"></i>
        All values collected via <code>hx-include="#stack-form"</code> — including
        <code>language_id</code> and <code>framework_id</code> which were dynamically
        injected into the DOM after page load.
    </div>
</div>
