<li class="list-group-item d-flex align-items-center gap-2 py-2" id="todo-<?= esc($todo['id']) ?>">

    <!-- Toggle completed -->
    <button class="btn btn-sm p-0 border-0 flex-shrink-0"
        hx-post="<?= base_url('todo/' . $todo['id'] . '/toggle') ?>"
        hx-target="#todo-<?= esc($todo['id']) ?>"
        hx-swap="outerHTML"
        title="Toggle complete">
        <?php if ($todo['completed']): ?>
            <i class="bi bi-check-circle-fill text-success fs-5"></i>
        <?php else: ?>
            <i class="bi bi-circle text-muted fs-5"></i>
        <?php endif; ?>
    </button>

    <!-- Title -->
    <span class="flex-grow-1 <?= $todo['completed'] ? 'text-decoration-line-through text-muted' : '' ?>">
        <?= esc($todo['title']) ?>
    </span>

    <!-- Actions -->
    <div class="d-flex gap-1 flex-shrink-0">
        <button class="btn btn-sm btn-outline-secondary"
            hx-get="<?= base_url('todo/' . $todo['id'] . '/edit') ?>"
            hx-target="#todo-<?= esc($todo['id']) ?>"
            hx-swap="outerHTML"
            title="Edit">
            <i class="bi bi-pencil"></i>
        </button>
        <button class="btn btn-sm btn-outline-danger"
            hx-post="<?= base_url('todo/' . $todo['id'] . '/delete') ?>"
            hx-target="#todo-<?= esc($todo['id']) ?>"
            hx-swap="outerHTML"
            hx-confirm="Delete this task?"
            title="Delete">
            <i class="bi bi-trash"></i>
        </button>
    </div>

</li>
