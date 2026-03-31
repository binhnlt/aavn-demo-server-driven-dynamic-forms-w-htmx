<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            ['HTMX', 'Hypermedia'],
            ['Docker', 'Containerization'],
            ['CodeIgniter', 'PHP Framework'],
            ['WebAssembly', 'Performance'],
            ['TypeScript', 'Static Typing'],
            ['Rust', 'Systems Programming'],
            ['GraphQL', 'API Design'],
            ['Redis', 'Caching'],
            ['Kubernetes', 'Orchestration'],
            ['Tailwind CSS', 'Utility-First Styling'],
        ];

        $authors = ['Alice Johnson', 'Bob Smith', 'Carol Williams', 'David Brown', 'Eve Davis'];

        $excerpts = [
            'A practical look at how this approach simplifies modern web development, reduces boilerplate, and improves team productivity.',
            'A hands-on guide from initial setup to production deployment, covering best practices and common pitfalls to avoid.',
            'An in-depth comparison of different methodologies to help you make the right technical decision for your project.',
            'Deep-diving into the underlying architecture and why it matters for application performance in production environments.',
            'From zero to hero: a journey of learning and applying this technology in real-world projects with concrete examples.',
            'Common patterns and anti-patterns when working with this technology, drawn from real-world team experience.',
        ];

        $articles = [];
        $date     = strtotime('-60 days');

        for ($i = 1; $i <= 60; $i++) {
            $topic      = $topics[($i - 1) % count($topics)];
            $articles[] = [
                'title'      => $topic[0] . ': ' . $topic[1] . ' — Part ' . ceil($i / count($topics)),
                'excerpt'    => $excerpts[($i - 1) % count($excerpts)],
                'author'     => $authors[($i - 1) % count($authors)],
                'created_at' => date('Y-m-d H:i:s', $date + ($i * 86400)),
            ];
        }

        $this->db->table('articles')->insertBatch($articles);
    }
}
