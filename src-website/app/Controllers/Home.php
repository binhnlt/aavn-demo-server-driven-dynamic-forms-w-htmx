<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layouts/main', [
            'title'   => 'Home',
            'content' => view('home/index'),
        ]);
    }
}
