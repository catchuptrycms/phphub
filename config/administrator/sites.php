<?php

use App\Models\Site;

return [
    'title'   => 'Cool Station',
    'heading' => 'Cool Station',
    'single'  => 'Cool Station',
    'model'   => Site::class,

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'favicon' => [
            'title'    => 'image url',
            'output'   => function ($value, $model) {
                $value = $model->present()->icon();
                return empty($value) ? 'N/A' : <<<EOD
    <img src="$value" width="16">
EOD;
            },
            'sortable' => false,
        ],
        'title' => [
            'title'    => 'Name',
            'sortable' => false,
        ],
        'description' => [
            'title'    => 'Description',
            'sortable' => false,
            'output'   => function ($value) {
                return '<p style="width:200px">'.$value.'</p>';
            },
        ],
        'link' => [
            'title'    => 'Link',
            'sortable' => false,
            'output'   => function ($value) {
                return '<p style="width:280px">'.$value.'</p>';
            },
        ],
        'operation' => [
            'title'  => 'Operation',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'Name',
        ],
        'description' => [
            'title'    => 'Description',
            'type'     => 'textarea',
        ],
        'link' => [
            'title'    => 'Link',
        ],
        'favicon' => [
            'title'    => 'image url',
            'type' => 'file',
            'location' => public_path() . '/uploads/sites/',
            'mimes' => 'jpeg,bmp,png,gif,ico',
        ],
        'order' => [
            'title'    => 'Sort',
            'hint'    => 'Sort 0',
            'value'    => 0,
        ],
        'type' => [
            'title'    => 'Type',
            'type'     => 'enum',
            'options'  => [
                'site' => 'Site',
                'blog' => 'Blog',
                'weibo' => 'Weibo',
                'dev_service'  => 'Dev Service',
                'site_foreign'  => 'Foreign Site',
            ],
            'value' => 'site',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title' => 'Name',
        ],
        'link' => [
            'title' => 'Link',
        ],
        'type' => [
            'title'    => 'Type',
            'type'     => 'enum',
            'options'  => [
                'site' => 'Site',
                'blog' => 'Blog',
                'site_foreign' => 'Foreign Laravel Site',
                'dev_service'  => 'Dev Service',
            ],
        ],
    ],
];
