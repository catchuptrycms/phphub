<?php

use App\Models\Link;

return [
    'title'   => 'Links',
    'heading' => 'Links',
    'single'  => 'Links',
    'model'   => Link::class,

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'Name',
            'sortable' => false,
        ],
        'link' => [
            'title'    => 'Link',
            'sortable' => false,
        ],
        'cover' => [
            'title'    => 'image url',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return $value ? "<img src='$value' width='200' height='100'>" : 'N/A';
            },
        ],
        'is_enabled' => [
            'title'    => 'enabled',
            'output'   => function ($value) {
                return admin_enum_style_output($value);
            },
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
        'title' => [
            'title'    => 'Name',
        ],
        'link' => [
            'title'    => 'Link',
        ],
        'cover' => [
            'title'             => 'Cover',
            'type'              => 'image',
            'location'          => public_path() . '/uploads/banners/',
            'naming'            => 'random',
            'length'            => 20,
            'size_limit'        => 2,
            'display_raw_value' => false,
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'Tags ID',
        ],
        'title' => [
            'title' => 'Name',
        ],
    ],
    'actions' => [
        'disable_link' => [
            'title'    => 'Disabled',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return $model->is_enabled == 'yes';
            },
            'action' => function ($model) {
                $model->update(['is_enabled' => 'no']);
                return true;
            }
        ],
        'enable_link' => [
            'title'    => 'Enabled',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return $model->is_enabled == 'no';
            },
            'action' => function ($model) {
                $model->update(['is_enabled' => 'yes']);
                return true;
            }
        ],


    ],
];
