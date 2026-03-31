<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class InfiniteScroll extends BaseController
{
    private const PER_PAGE = 10;

    public function index(): string
    {
        $model    = new ArticleModel();
        $articles = $model->getPage(1, self::PER_PAGE);
        $hasMore  = $model->hasMore(1, self::PER_PAGE);

        return view('layouts/main', [
            'title'   => 'Infinite Scroll',
            'content' => view('infinite_scroll/index', [
                'articles' => $articles,
                'page'     => 1,
                'hasMore'  => $hasMore,
            ]),
        ]);
    }

    public function page(): string
    {
        $page     = max(1, (int) ($this->request->getGet('page') ?? 1));
        $model    = new ArticleModel();
        $articles = $model->getPage($page, self::PER_PAGE);
        $hasMore  = $model->hasMore($page, self::PER_PAGE);

        if (empty($articles)) {
            return '';
        }

        return view('infinite_scroll/_page', [
            'articles' => $articles,
            'page'     => $page,
            'hasMore'  => $hasMore,
        ]);
    }
}
