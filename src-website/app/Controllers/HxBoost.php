<?php

namespace App\Controllers;

class HxBoost extends BaseController
{
    public function index(): string
    {
        return view('layouts/main', [
            'title'   => 'hx-boost',
            'content' => view('hx_boost/index'),
        ]);
    }

    public function submit(): string
    {
        $name    = trim($this->request->getPost('name') ?? '');
        $message = trim($this->request->getPost('message') ?? '');

        if ($name === '' || $message === '') {
            return view('hx_boost/_form', [
                'error' => 'Please fill in all required fields.',
                'old'   => $this->request->getPost(),
            ]);
        }

        if ($this->isHtmx()) {
            return view('hx_boost/_success', ['name' => $name]);
        }

        // Fallback when HTMX is not available (progressive enhancement)
        return view('layouts/main', [
            'title'   => 'Gửi thành công',
            'content' => view('hx_boost/_success', ['name' => $name]),
        ]);
    }
}
