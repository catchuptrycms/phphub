<?php
use App\Models\SiteStatus;

return [
    'title'   => 'Site Statuses',
    'heading' => 'Site Statuses',
    'single'  => 'Site Statuses',
    'model'   => SiteStatus::class,

    'permission' => function () {
        // return Auth::user()->hasRole('Developer');
        return true;
    },

    'action_permissions' => [
        'create' => function ($model) {
            return false;
        },
        'update' => function ($model) {
            return false;
        },
        'delete' => function ($model) {
            return false;
        },
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'day' => [
            'title'    => 'day',
            'sortable' => false,
        ],
        'register_count' => [
            'title'    => 'register count',
        ],
        'github_regitster_count' => [
            'title'    => 'Github Count',
        ],
        'wechat_registered_count' => [
            'title'    => 'WeChat count',
        ],
        'topic_count' => [
            'title'    => 'topic count',
        ],
        'reply_count' => [
            'title'    => 'reply count',
        ],
        'image_count' => [
            'title'    => 'image count',
        ],
        'operation' => [
            'title'    => 'Operation',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'day' => [
            'title' => 'day',
        ],
    ],
    'filters' => [
        'day' => [
            'title' => 'filters',
        ],
    ],
];
