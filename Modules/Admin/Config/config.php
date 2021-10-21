<?php

return [
    'name' => 'Admin',
    'menu_type' => [
        'main' => 'main_menu',
        'footer' => 'footer_menu',
        'footerOur' => 'footer_our_menu',
    ],
    'partial_type' => [
        'page'  => 'page_link',
        'post'  => 'post_link',
        'news'  => 'news_link',
        'category'  => 'category_link',
        'external'  => 'external_link'
    ],
    'partial_table' => [
        'page' => \Modules\Admin\Repositories\PagesRepository::class,
        'post' => \Modules\Admin\Repositories\PostsRepository::class,
        'news' => \Modules\Admin\Repositories\NewsRepository::class,
        'category' => \Modules\Admin\Repositories\CategoriesRepository::class,
    ]
];
