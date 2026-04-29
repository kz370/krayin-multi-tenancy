<?php

return [

    'menu-title' => 'Tenants',

    'breadcrumbs' => [
        'dashboard' => 'Dashboard',
        'tenants'   => 'Tenants',
        'create'    => 'Create',
        'edit'      => 'Edit',
    ],

    'index' => [
        'title'      => 'Manage Tenants',
        'create-btn' => 'Create New Tenant',

        'table' => [
            'id'         => 'ID',
            'name'       => 'Name',
            'subdomain'  => 'Subdomain',
            'database'   => 'Database',
            'status'     => 'Status',
            'created-at' => 'Created At',
            'actions'    => 'Actions',
        ],

        'status' => [
            'active'   => 'Active',
            'inactive' => 'Inactive',
        ],

        'soft-delete-confirm' => 'Are you sure you want to soft delete (deactivate)?',

        'hard-delete-modal' => [
            'title'           => 'Permanent Hard Delete',
            'confirm-text'    => 'Are you sure you want to permanently delete tenant',
            'irreversible'    => 'This action is IRREVERSIBLE. It will:',
            'delete-database' => 'Permanently delete the database.',
            'delete-data'     => 'Permanently remove all data.',
            'delete-record'   => 'Remove the tenant record.',
            'password-label'  => 'Confirmation: Admin Password',
            'confirm-btn'     => 'Confirm Permanent Delete',
            'cancel-btn'      => 'Cancel',
        ],
    ],

    'create' => [
        'title'                      => 'Create Tenant',
        'save-btn'                   => 'Save Tenant',
        'general-info'               => 'General Information',
        'admin-user'                 => 'Admin User',
        'name'                       => 'Company Name',
        'name-placeholder'           => 'Enter Company Name',
        'subdomain'                  => 'Subdomain',
        'subdomain-placeholder'      => 'Enter subdomain',
        'admin-name'                 => 'Name',
        'admin-name-placeholder'     => 'Enter Admin Name',
        'admin-email'                => 'Email',
        'admin-email-placeholder'    => 'Enter Email Address',
        'admin-password'             => 'Password',
        'admin-password-placeholder' => 'Enter Password',
    ],

    'edit' => [
        'title'                      => 'Edit Tenant',
        'update-btn'                 => 'Update Tenant',
        'general-info'               => 'General Information',
        'name'                       => 'Company Name',
        'name-placeholder'           => 'Enter Company Name',
        'subdomain'                  => 'Subdomain',
        'database-name'              => 'Database Name',
        'database-warning'           => 'Warning: Changing this does NOT rename the actual database. Only change if you migrated the DB manually.',
        'is-active'                  => 'Is Active',
        'admin-section'              => 'Admin User (Update Optional)',
        'admin-email'                => 'Admin Email',
        'admin-email-placeholder'    => 'Leave blank to keep current',
        'admin-password'             => 'Admin Password',
        'admin-password-placeholder' => 'Leave blank to keep current',
        'created-at'                 => 'Created At',
    ],

];
