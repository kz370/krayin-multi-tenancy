<?php

return [

    'menu-title' => 'المستأجرون',

    'breadcrumbs' => [
        'dashboard' => 'لوحة التحكم',
        'tenants'   => 'المستأجرون',
        'create'    => 'إنشاء',
        'edit'      => 'تعديل',
    ],

    'index' => [
        'title'      => 'إدارة المستأجرين',
        'create-btn' => 'إنشاء مستأجر جديد',

        'table' => [
            'id'         => 'المعرف',
            'name'       => 'الاسم',
            'subdomain'  => 'النطاق الفرعي',
            'database'   => 'قاعدة البيانات',
            'status'     => 'الحالة',
            'created-at' => 'تاريخ الإنشاء',
            'actions'    => 'الإجراءات',
        ],

        'status' => [
            'active'   => 'نشط',
            'inactive' => 'غير نشط',
        ],

        'soft-delete-confirm' => 'هل أنت متأكد من رغبتك في الحذف الناعم (تعطيل)؟',

        'hard-delete-modal' => [
            'title'           => 'الحذف النهائي الدائم',
            'confirm-text'    => 'هل أنت متأكد من رغبتك في الحذف الدائم للمستأجر',
            'irreversible'    => 'هذا الإجراء لا يمكن التراجع عنه. سيتم:',
            'delete-database' => 'حذف قاعدة البيانات نهائياً.',
            'delete-data'     => 'إزالة جميع البيانات نهائياً.',
            'delete-record'   => 'إزالة سجل المستأجر.',
            'password-label'  => 'تأكيد: كلمة مرور المسؤول',
            'confirm-btn'     => 'تأكيد الحذف الدائم',
            'cancel-btn'      => 'إلغاء',
        ],
    ],

    'create' => [
        'title'                      => 'إنشاء مستأجر',
        'save-btn'                   => 'حفظ المستأجر',
        'general-info'               => 'المعلومات العامة',
        'admin-user'                 => 'مستخدم المسؤول',
        'name'                       => 'اسم الشركة',
        'name-placeholder'           => 'أدخل اسم الشركة',
        'subdomain'                  => 'النطاق الفرعي',
        'subdomain-placeholder'      => 'أدخل النطاق الفرعي',
        'admin-name'                 => 'الاسم',
        'admin-name-placeholder'     => 'أدخل اسم المسؤول',
        'admin-email'                => 'البريد الإلكتروني',
        'admin-email-placeholder'    => 'أدخل عنوان البريد الإلكتروني',
        'admin-password'             => 'كلمة المرور',
        'admin-password-placeholder' => 'أدخل كلمة المرور',
    ],

    'edit' => [
        'title'                      => 'تعديل المستأجر',
        'update-btn'                 => 'تحديث المستأجر',
        'general-info'               => 'المعلومات العامة',
        'name'                       => 'اسم الشركة',
        'name-placeholder'           => 'أدخل اسم الشركة',
        'subdomain'                  => 'النطاق الفرعي',
        'database-name'              => 'اسم قاعدة البيانات',
        'database-warning'           => 'تحذير: تغيير هذا لا يؤدي إلى إعادة تسمية قاعدة البيانات الفعلية. قم بالتغيير فقط إذا قمت بنقل قاعدة البيانات يدوياً.',
        'is-active'                  => 'نشط',
        'admin-section'              => 'مستخدم المسؤول (التحديث اختياري)',
        'admin-email'                => 'البريد الإلكتروني للمسؤول',
        'admin-email-placeholder'    => 'اتركه فارغاً للإبقاء على الحالي',
        'admin-password'             => 'كلمة مرور المسؤول',
        'admin-password-placeholder' => 'اتركها فارغة للإبقاء على الحالية',
        'created-at'                 => 'تاريخ الإنشاء',
    ],

];
