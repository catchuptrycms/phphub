<?php

use App\Models\Reply;

return [
    'title'   => 'Replies',
    'heading' => 'Replies',
    'single'  => 'Replies',
    'model'   => Reply::class,

    'columns' => [

        'id' => [
            'title' => 'ID',
        ],
        'user' => [
            'title'    => 'user',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return admin_link(
                    $model->user->name,
                    'users',
                    $model->user_id
                );
            },
        ],
        'topic' => [
            'title'    => 'Topic',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return admin_link(
                    $model->topic->title,
                    'topics',
                    $model->topic_id
                );
            },
        ],
        'is_blocked' => [
            'title'    => 'is blocked',
        ],
        'vote_count' => [
            'title'    => 'Vote Count',
        ],
        'operation' => [
            'title'  => 'Operation',
            'output' => function ($value, $model) {

            },
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'user' => [
            'title'              => 'user',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'topic' => [
            'title'              => 'Topic',
            'type'               => 'relationship',
            'name_field'         => 'title',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', title)"),
            'options_sort_field' => 'id',
        ],
        'body_original' => [
            'title'    => 'Markdown Original Content',
            'hint'     => 'Please use Markdown format',
            'type'     => 'textarea',
        ],
        'is_blocked' => [
            'title'    => 'is blocked',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
            'value' => 'no',
        ],
        'vote_count' => [
            'title'    => 'Vote Count',
        ],
    ],
    'filters' => [
        'user' => [
            'title'              => 'user',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'topic' => [
            'title'              => 'Topic',
            'type'               => 'relationship',
            'name_field'         => 'title',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', title)"),
            'options_sort_field' => 'id',
        ],
        'is_blocked' => [
            'title'    => 'is blocked',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
        ],
        'body_original' => [
            'title'    => 'Original Body',
        ],
        'vote_count' => [
            'type'                => 'number',
            'title'               => 'Vote Count',
            'thousands_separator' => ',', //optional, defaults to ','
            'decimal_separator'   => '.',   //optional, defaults to '.'
        ],
    ],
    'rules'   => [
        'body_original' => 'required'
    ],
    'messages' => [
        'body_original.required' => 'Please fill in',
    ],
];
