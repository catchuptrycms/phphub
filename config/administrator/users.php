<?php

use App\Models\User;

return [
    'title'   => 'user',
    'heading' => 'user',
    'single'  => 'user',
    'model'   => User::class,

    'permission'=> function()
    {
        return Auth::user()->may('manage_users');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'image_url' => [
            'title'  => 'Image',
            'output' => function ($value, $model) {
                $value = $model->present()->gravatar();
                return empty($value) ? 'N/A' : '<img src="'.$value.'" width="80">';
            },
            'sortable' => false,
        ],
        'name' => [
            'title'    => 'Name',
            'sortable' => false,
            'output' => function ($value, $model) {
                return '<a href="/users/'.$model->id.'" target=_blank>'.$value.'</a>';
            },
        ],
        'real_name' => [
            'title'    => 'RealName',
            'sortable' => false,
        ],
        'github_name' => [
            'title' => 'GitHub Name'
        ],
        'topic_count' => [
            'title' => 'Topics'
        ],
        'reply_count' => [
            'title' => 'Replies'
        ],
        'register_source' => [
            'title'  => 'Source',
        ],
        'email' => [
            'title' => 'Email',
        ],
        'is_banned' => [
            'title'  => 'is blocked',
            'output' => function ($value) {
                return admin_enum_style_output($value, true);
            },
        ],
        'verified' => [
            'title'  => 'Verified',
            'output' => function ($value) {
                $value = $value ? 'yes' : 'no';
                return admin_enum_style_output($value);
            },
        ],
        'email_notify_enabled' => [
            'title'  => 'Notify Enabled',
            'output' => function ($value) {
                return admin_enum_style_output($value);
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
        'name' => [
            'title' => 'Name',
        ],
        'email' => [
            'title' => 'Mailbox',
        ],
        'github_id' => [
            'title' => 'GitHub ID'
        ],
        'github_url' => [
            'title' => 'GitHub URL'
        ],
        'wechat_openid' => [
            'title' => 'WeChat openid',
        ],
        'wechat_unionid' => [
            'title' => 'WeChat unionid',
        ],
        'register_source' => [
            'title'  => 'Registration Source',
        ],
        'is_banned' => [
            'title'    => 'is blocked',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
        ],
        'city' => [
            'title' => 'City'
        ],
        'company' => [
            'title' => 'Company'
        ],
        'twitter_account' => [
            'title' => 'Twitter Account'
        ],
        'personal_website' => [
            'title' => '个人网站'
        ],
        'introduction' => [
            'title' => 'Intro'
        ],
        'certification' => [
            'title' => 'Cert',
            'type' => 'textarea',
        ],
        'github_name' => [
            'title' => 'GitHub Name'
        ],
        'real_name' => [
            'title' => 'RealName'
        ],
        'avatar' => [
            'title' => 'Avatar',
            'type' => 'image',
            'location' => public_path() . '/uploads/avatars/',
        ],
        'roles' => array(
            'type'       => 'relationship',
            'title'      => 'Roles',
            'name_field' => 'display_name',
        ),
        'register_source' => [
            'title'  => 'Registration Source',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'user ID',
        ],
        'name' => [
            'title' => 'Name',
        ],
        'github_name' => [
            'title' => 'GitHub Name'
        ],
        'real_name' => [
            'title' => 'RealName'
        ],
        'email' => [
            'title' => 'Mailbox',
        ],
        'roles' => [
            'type'       => 'relationship',
            'title'      => 'Roles',
            'name_field' => 'display_name',
        ],
        'is_banned' => [
            'title'    => 'is blocked',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
        ],
        'email_notify_enabled' => [
            'title'    => 'EmailNotify',
            'type'     => 'enum',
            'options'  => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
        ],
        'city' => [
            'title' => 'City'
        ],
        'company' => [
            'title' => 'Company'
        ],
        'twitter_account' => [
            'title' => 'Twitter Account'
        ],
        'personal_website' => [
            'title' => 'Pers Webst'
        ],
        'introduction' => [
            'title' => 'Intro'
        ],
        'register_source' => [
            'title'  => 'Registration Source',
        ],
    ],
    'actions' => [
        'banned_user' => [
            'title'    => 'Disabled',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return $model->is_banned == 'no';
            },
            'action' => function ($model) {
                $model->is_banned = 'yes';
                $model->save();
                return true;
            }
        ],
        'unbanned_user' => [
            'title'    => 'Enabled',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return $model->is_banned == 'yes';
            },
            'action' => function ($model) {
                $model->is_banned = 'no';
                $model->save();
                return true;
            }
        ],
        'verified_email' => [
            'title'    => '设置邮箱为已激活',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return !$model->verified;
            },
            'action' => function ($model) {
                $model->verified = true;
                $model->save();
                return true;
            }
        ],
        'unverified_email' => [
            'title'    => '设置邮箱为未激活',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return $model->verified;
            },
            'action' => function ($model) {
                $model->verified = false;
                $model->save();
                return true;
            }
        ],
        'email_notify_enabled' => [
            'title'    => ' 开启邮件提醒',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return $model->email_notify_enabled == 'no';
            },
            'action' => function ($model) {
                $model->email_notify_enabled = 'yes';
                $model->save();
                return true;
            }
        ],
        'email_notify_disenabled' => [
            'title'    => '关闭邮件提醒',
            'messages' => array(
                'active'  => 'Processing...',
                'success' => 'Success',
                'error'   => 'Whoops!',
            ),
            'permission' => function ($model) {
                return $model->email_notify_enabled == 'yes';
            },
            'action' => function ($model) {
                $model->email_notify_enabled = 'no';
                $model->save();
                return true;
            }
        ],
    ],
];
