<div class="row mb-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active">Todo CRUD</li>
            </ol>
        </nav>
        <h2 class="fw-bold">Demo 3 — Todo CRUD</h2>
        <p class="text-muted">Add / edit / delete / toggle inline. The server returns an HTML fragment for each action. <strong>Zero JavaScript</strong>.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Task List</h5>
                <span class="badge bg-secondary"><?= count($todos) ?> tasks</span>
            </div>

            <!-- Add new todo form -->
            <div class="card-body border-bottom">
                <form
                    hx-post="<?= base_url('todo') ?>"
                    hx-target="#todo-list"
                    hx-swap="afterbegin"
                    hx-on::after-request="this.reset()">
                    <div class="input-group">
                        <input type="text" name="title" class="form-control"
                            placeholder="Add a new task..." required>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Add
                        </button>
                    </div>
                </form>
            </div>

            <!-- Todo list -->
            <ul class="list-group list-group-flush" id="todo-list">
                <?php foreach ($todos as $todo): ?>
                    <?= view('todo/_item', ['todo' => $todo]) ?>
                <?php endforeach; ?>
            </ul>

            <?php if (empty($todos)): ?>
                <div class="card-body text-center text-muted py-4" id="empty-state">
                    <i class="bi bi-check2-all fs-2 d-block mb-2 opacity-25"></i>
                    No tasks yet.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card bg-dark text-white">
            <div class="card-header border-secondary">
                <small class="text-muted">HTTP verbs in HTMX</small>
            </div>
            <div class="card-body">
                <table class="table table-dark table-sm small">
                    <thead>
                        <tr><th>Action</th><th>HTMX</th><th>Swap</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Add</td>
                            <td><code class="text-success">hx-post</code></td>
                            <td><code class="text-muted">afterbegin</code></td>
                        </tr>
                        <tr>
                            <td>Edit</td>
                            <td><code class="text-warning">hx-get</code> → <code class="text-success">hx-post</code></td>
                            <td><code class="text-muted">outerHTML</code></td>
                        </tr>
                        <tr>
                            <td>Delete</td>
                            <td><code class="text-danger">hx-post /delete</code></td>
                            <td><code class="text-muted">outerHTML ""</code></td>
                        </tr>
                        <tr>
                            <td>Toggle</td>
                            <td><code class="text-info">hx-post /toggle</code></td>
                            <td><code class="text-muted">outerHTML</code></td>
                        </tr>
                    </tbody>
                </table>
                <hr class="border-secondary">
                <pre class="text-success small"><code>&lt;!-- Delete: swap with "" --&gt;
&lt;button
  hx-post="/todo/1/delete"
  hx-target="closest li"
  hx-swap="outerHTML"&gt;
  Delete
&lt;/button&gt;</code></pre>
            </div>
        </div>
    </div>
</div>
