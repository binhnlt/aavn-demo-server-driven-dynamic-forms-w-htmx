<?php

namespace App\Controllers;

use App\Models\ProductModel;

class LiveSearch extends BaseController
{
    public function index(): string
    {
        return view('layouts/main', [
            'title'   => 'Live Search',
            'content' => view('live_search/index'),
        ]);
    }

    public function results(): string
    {
        $q       = trim($this->request->getGet('q') ?? '');
        $model   = new ProductModel();
        $results = $model->search($q);

        return view('live_search/_results', [
            'results' => $results,
            'q'       => $q,
        ]);
    }
}
