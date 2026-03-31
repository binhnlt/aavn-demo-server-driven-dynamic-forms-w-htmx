<?php

namespace App\Controllers;

use App\Models\TodoModel;

class Todo extends BaseController
{
    private TodoModel $model;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger): void
    {
        parent::initController($request, $response, $logger);
        $this->model = new TodoModel();
    }

    public function index(): string
    {
        return view('layouts/main', [
            'title'   => 'Todo CRUD',
            'content' => view('todo/index', [
                'todos' => $this->model->getAllOrdered(),
            ]),
        ]);
    }

    public function store(): string
    {
        $title = trim($this->request->getPost('title') ?? '');

        if ($title === '') {
            return $this->response->setStatusCode(422)->setBody('');
        }

        $id   = $this->model->insert(['title' => $title, 'completed' => 0, 'created_at' => date('Y-m-d H:i:s')]);
        $todo = $this->model->find($id);

        return view('todo/_item', ['todo' => $todo]);
    }

    public function show(int $id): string
    {
        $todo = $this->model->find($id);

        if (! $todo) {
            return $this->response->setStatusCode(404)->setBody('');
        }

        return view('todo/_item', ['todo' => $todo]);
    }

    public function edit(int $id): string
    {
        $todo = $this->model->find($id);

        if (! $todo) {
            return $this->response->setStatusCode(404)->setBody('');
        }

        return view('todo/_item_edit', ['todo' => $todo]);
    }

    public function update(int $id): string
    {
        $title = trim($this->request->getPost('title') ?? '');

        if ($title !== '') {
            $this->model->update($id, ['title' => $title]);
        }

        $todo = $this->model->find($id);

        return view('todo/_item', ['todo' => $todo]);
    }

    public function delete(int $id): string
    {
        $this->model->delete($id);
        return '';
    }

    public function toggle(int $id): string
    {
        $todo = $this->model->find($id);

        if (! $todo) {
            return $this->response->setStatusCode(404)->setBody('');
        }

        $this->model->update($id, ['completed' => $todo['completed'] ? 0 : 1]);
        $todo = $this->model->find($id);

        return view('todo/_item', ['todo' => $todo]);
    }
}
