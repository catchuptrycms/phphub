<?php
use App\Models\Permission;

return [
    'title'   => 'Permissions',
    'heading' => 'Permissions',
    'single'  => 'Permissions',
    'model'   => Permission::class,

    'permission' => function () {
        return Auth::user()->may('manage_users');
    },

    'action_permissions' => [
        'create' => function ($model) {
            return true;
        },
        'update' => function ($model) {
            return true;
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
        'name' => [
            'title'    => '标示',
            'sortable' => false,
        ],
        'display_name' => [
            'title'    => '权限名称',
            'sortable' => false,
        ],
        'description' => [
            'title'    => 'Description',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return empty($value) ? 'N/A' : $value;
            },
        ],
        'roles' => [
            'title'  => 'Roles',
            'output' => function ($value, $model) {
                $model->load('roles');
                $result = [];
                foreach ($model->roles as $role) {
                    $result[] = $role->display_name;
                }

                return empty($result) ? 'N/A' : implode($result, ' | ');
            },
            'sortable' => false,
        ],
        'operation' => [
            'title'    => 'Operation',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Name',
        ],
        'display_name' => [
            'title' => 'Display Name',
        ],
        'description' => [
            'title' => 'Description',
        ],
    ],
    'filters' => [
        'name' => [
            'title' => 'Name',
        ],
        'display_name' => [
            'title' => 'Display Name',
        ],
        'description' => [
            'title' => 'Description',
        ],
    ],

    'actions' => [],
];
