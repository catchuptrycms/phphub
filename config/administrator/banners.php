<?php

use App\Models\Banner;

return [
    'title'   => 'Banner',
    'heading' => 'Banner',
    'single'  => 'Banner',
    'model'   => Banner::class,

    'query_filter' => function ($query) {
        if (!Input::get('sortOptions')) {
            $query->orderBy('order', 'ASC');
        }
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'position' => [
            'title' => 'Position',
        ],
        'title' => [
            'title'  => 'Title',
            'output' => function ($value, $model) {
                return $model->link ? "<a href='{$model->link}' target='_blank'>{$value}</a>" : $value;
            },
        ],
        'target' => [
            'title'  => 'Target',
            'output' => function ($value) {
                return $value == '_blank' ? '_new' : '_blank';
            },
        ],
        'image_url' => [
            'title'    => 'image url',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return $value ? "<img src='$value' width='200' height='100'>" : 'N/A';
            },
        ],
        'description' => [
            'title'    => 'Description',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return $value ? "<p style='width:250px'>$value</p>" : 'N/A';
            },
        ],
        'order' => [
            'title'    => 'sort order',
            'sortable' => false,
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
        'position' => [
            'title' => 'Position',
            'type'     => 'enum',
            'options'  => [
                'website_top' => 'WebsiteTop',
                'footer-sponsor'  => 'FooterSponsor',
                'sidebar-sponsor'  => 'sidebar-sponsor',
                'sidebar-resources'  => 'sidebar-resources',
            ],
        ],
        'title' => [
            'title' => 'Title',
        ],
        'target' => [
            'title'    => 'Target',
            'type'     => 'enum',
            'options'  => [
                '_blank' => 'Position',
                '_self'  => 'Self',
            ],
            'value' => '_blank',
        ],
        'link' => [
            'title' => 'Link',
        ],
        'image_url' => [
            'title'             => 'Cover',
            'type'              => 'image',
            'location'          => public_path() . '/uploads/banners/',
            'naming'            => 'random',
            'length'            => 20,
            'size_limit'        => 2,
            'display_raw_value' => false,
        ],
        'description' => [
            'title' => 'Description',
            'type'  => 'textarea',
        ],
        'order' => [
            'title' => 'sort order',
            'type'  => 'number',
            'value' => 0,
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'position' => [
            'title' => 'Position',
        ],
        'title' => [
            'title' => 'Title',
        ],
        'order' => [
            'title' => 'sort order',
            'type'  => 'number',
        ],
    ],
];
