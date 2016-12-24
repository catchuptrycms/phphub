<?php

use App\Models\Category;

return [
    'title'   => 'Categories',
    'heading' => 'Categories',
    'single'  => 'Categories',
    'model'   => Category::class,

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'Name',
            'sortable' => false,
        ],
        'slug' => [
            'title'    => 'Slug',
            'sortable' => false,
        ],
        'description' => [
            'title'    => 'Description',
            'sortable' => false,
        ],
        'depth' => [
            'title'    => 'Depth',
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
        'name' => [
            'title' => 'Name',
        ],
        'slug' => [
            'title' => 'Slug',
        ],
        'description' => [
            'title' => 'Description',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'Tags ID',
        ],
        'name' => [
            'title' => 'Name',
        ],
        'slug' => [
            'title' => 'Slug',
        ],
        'description' => [
            'title' => 'Description',
        ],
    ],
    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique'   => '分类名在数据库里有重复，请选用其他名称。',
        'name.required' => '请确保名字至少一个字符以上',
    ],
];
