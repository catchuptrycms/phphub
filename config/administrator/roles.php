<?php

use App\Models\Role;

return [
    'title'   => 'Roles',
    'heading' => 'Roles',
    'single'  => 'Roles',
    'model'   => Role::class,

    'permission'=> function()
    {
        return Auth::user()->may('manage_users');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'display_name' => [
            'title' => '显示名称',
            'sortable' => false
        ],
        'name' => [
            'title' => '标识'
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
        'display_name' => [
            'title' => '显示名称',
        ],
        'name' => [
            'title' => '标识',
        ],
        'description' => [
            'type' => 'textarea',
            'title' => 'Description',
        ],
        'perms' => array(
            'type' => 'relationship',
            'title' => '权限',
            'name_field' => 'display_name',
        ),
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'display_name' => [
            'title' => '显示名称'
        ],
        'name' => [
            'title' => '标识',
        ]
    ],

    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
        'display_name' => 'required|unique:roles,display_name'
    ],

    'messages' => [
        'name.required' => '标识不能为空',
        'name.unique' => '标识已存在',
        'display_name.required' => '显示名称不能为空',
        'display_name.unique' => '显示名称已存在'
    ]
];
