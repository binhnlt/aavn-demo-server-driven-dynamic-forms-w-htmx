<li class="list-group-item py-2" id="todo-<?= esc($todo['id']) ?>">
    <form class="d-flex gap-2 align-items-center"
        hx-post="<?= base_url('todo/' . $todo['id']) ?>"
        hx-target="#todo-<?= esc($todo['id']) ?>"
        hx-swap="outerHTML">
        <input type="text" name="title" class="form-control form-control-sm"
            value="<?= esc($todo['title']) ?>" autofocus required>
        <button type="submit" class="btn btn-sm btn-success flex-shrink-0">
            <i class="bi bi-check-lg"></i>
        </button>
        <!-- Cancel: reload original item via GET -->
        <button type="button" class="btn btn-sm btn-outline-secondary flex-shrink-0"
            hx-get="<?= base_url('todo/' . $todo['id'] . '/show') ?>"
            hx-target="#todo-<?= esc($todo['id']) ?>"
            hx-swap="outerHTML">
            <i class="bi bi-x-lg"></i>
        </button>
    </form>
</li>
