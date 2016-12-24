<?php

use App\Models\Topic;

return [
    'title'   => 'Topic',
    'heading' => 'Topic',
    'single'  => 'Topic',
    'model'   => Topic::class,

    'columns' => [

        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'Topic',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return '<div style="max-width:260px">' .model_link($value, 'topics', $model->id). '</div>';
            },
        ],
        'user' => [
            'title'    => 'user',
            'sortable' => false,
            'output'   => function ($value, $model) {

                $avatar = $model->user->present()->gravatar();
                $value = empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" style="height:44px;width:44px"> ' . $model->user->name;

                return model_link($value, 'users', $model->user->id);
            },
        ],
        'excerpt' => [
            'title'    => 'Excerpt',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return '<div style="max-width:320px">' .model_link($value, 'topics', $model->id). '</div>';
            },
        ],
        'order' => [
            'title'    => 'Sort',
        ],
        'category' => [
            'title'    => 'Categories',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return admin_link(
                    $model->category->name,
                    'categories',
                    $model->category_id
                );
            },
        ],
        'is_excellent' => [
            'title'    => 'Excellent？',
        ],
        'is_blocked' => [
            'title'    => 'Blocked？',
        ],
        'reply_count' => [
            'title'    => 'Comment',
        ],
        'view_count' => [
            'title'    => 'Views',
        ],
        'vote_count' => [
            'title'    => 'Votes',
        ],

        'operation' => [
            'title'  => 'Actions',
            'output' => function ($value, $model) {

            },
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'Title',
            'sortable' => false,
        ],
        'user' => [
            'title'              => 'user',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'category' => [
            'title'              => 'Categories',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'body_original' => [
            'title'    => 'Markdown Original Content',
            'hint'     => 'Please use Markdown format',
            'type'     => 'textarea',
        ],
        'order' => [
            'title'    => 'Sort',
        ],
        'is_excellent' => [
            'title'    => 'Recommended',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
            'value' => 'no',
        ],
        'is_blocked' => [
            'title'    => 'Blocked',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
            'value' => 'no',
        ],
        'reply_count' => [
            'title'    => 'Comment',
        ],
        'view_count' => [
            'title'    => 'Views',
        ],
        'vote_count' => [
            'title'    => 'Votes',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'Content ID',
        ],
        'user' => [
            'title'              => 'user',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'category' => [
            'title'              => 'Categories',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', screen_name)"),
            'options_sort_field' => 'id',
        ],
        'body_original' => [
            'title'    => 'Markdown Original Content',
        ],
        'order' => [
            'title'    => 'Sort',
        ],
        'is_excellent' => [
            'title'    => 'Recommended',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
        ],
        'is_blocked' => [
            'title'    => 'Blocked',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
        ],
        'view_count' => [
            'type'                => 'number',
            'title'               => 'ViewCount',
            'thousands_separator' => ',', //optional, defaults to ','
            'decimal_separator'   => '.',   //optional, defaults to '.'
        ],
    ],
    'rules'   => [
        'title' => 'required'
    ],
    'messages' => [
        'title.required' => 'Required',
    ],
];
