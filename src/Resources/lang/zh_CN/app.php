<?php

return [

    'menu-title' => '租户',

    'breadcrumbs' => [
        'dashboard' => '仪表盘',
        'tenants'   => '租户',
        'create'    => '创建',
        'edit'      => '编辑',
    ],

    'index' => [
        'title'      => '管理租户',
        'create-btn' => '创建新租户',

        'table' => [
            'id'         => 'ID',
            'name'       => '名称',
            'subdomain'  => '子域名',
            'database'   => '数据库',
            'status'     => '状态',
            'created-at' => '创建时间',
            'actions'    => '操作',
        ],

        'status' => [
            'active'   => '启用',
            'inactive' => '禁用',
        ],

        'soft-delete-confirm' => '确定要软删除（停用）吗？',

        'hard-delete-modal' => [
            'title'           => '永久彻底删除',
            'confirm-text'    => '确定要永久删除租户',
            'irreversible'    => '此操作不可撤销，将会：',
            'delete-database' => '永久删除数据库。',
            'delete-data'     => '永久删除所有数据。',
            'delete-record'   => '删除租户记录。',
            'password-label'  => '确认：管理员密码',
            'confirm-btn'     => '确认永久删除',
            'cancel-btn'      => '取消',
        ],
    ],

    'create' => [
        'title'                      => '创建租户',
        'save-btn'                   => '保存租户',
        'general-info'               => '基本信息',
        'admin-user'                 => '管理员用户',
        'name'                       => '公司名称',
        'name-placeholder'           => '请输入公司名称',
        'subdomain'                  => '子域名',
        'subdomain-placeholder'      => '请输入子域名',
        'admin-name'                 => '姓名',
        'admin-name-placeholder'     => '请输入管理员姓名',
        'admin-email'                => '电子邮件',
        'admin-email-placeholder'    => '请输入电子邮件地址',
        'admin-password'             => '密码',
        'admin-password-placeholder' => '请输入密码',
    ],

    'edit' => [
        'title'                      => '编辑租户',
        'update-btn'                 => '更新租户',
        'general-info'               => '基本信息',
        'name'                       => '公司名称',
        'name-placeholder'           => '请输入公司名称',
        'subdomain'                  => '子域名',
        'database-name'              => '数据库名称',
        'database-warning'           => '警告：更改此项不会重命名实际数据库。仅在手动迁移数据库后才更改。',
        'is-active'                  => '启用',
        'admin-section'              => '管理员用户（更新可选）',
        'admin-email'                => '管理员邮箱',
        'admin-email-placeholder'    => '留空以保持当前值',
        'admin-password'             => '管理员密码',
        'admin-password-placeholder' => '留空以保持当前值',
        'created-at'                 => '创建时间',
    ],

];
