<?php

return [

    'menu-title' => 'Kiracılar',

    'breadcrumbs' => [
        'dashboard' => 'Panel',
        'tenants'   => 'Kiracılar',
        'create'    => 'Oluştur',
        'edit'      => 'Düzenle',
    ],

    'index' => [
        'title'      => 'Kiracıları Yönet',
        'create-btn' => 'Yeni Kiracı Oluştur',

        'table' => [
            'id'         => 'ID',
            'name'       => 'Ad',
            'subdomain'  => 'Alt Alan Adı',
            'database'   => 'Veritabanı',
            'status'     => 'Durum',
            'created-at' => 'Oluşturulma Tarihi',
            'actions'    => 'İşlemler',
        ],

        'status' => [
            'active'   => 'Aktif',
            'inactive' => 'Pasif',
        ],

        'soft-delete-confirm' => 'Yumuşak silme (devre dışı bırakma) işlemini yapmak istediğinizden emin misiniz?',

        'hard-delete-modal' => [
            'title'           => 'Kalıcı Olarak Sil',
            'confirm-text'    => 'Kiracıyı kalıcı olarak silmek istediğinizden emin misiniz',
            'irreversible'    => 'Bu işlem GERİ ALINAMAZ. Şunlar gerçekleşecek:',
            'delete-database' => 'Veritabanı kalıcı olarak silinecek.',
            'delete-data'     => 'Tüm veriler kalıcı olarak kaldırılacak.',
            'delete-record'   => 'Kiracı kaydı silinecek.',
            'password-label'  => 'Doğrulama: Yönetici Parolası',
            'confirm-btn'     => 'Kalıcı Silmeyi Onayla',
            'cancel-btn'      => 'İptal',
        ],
    ],

    'create' => [
        'title'                      => 'Kiracı Oluştur',
        'save-btn'                   => 'Kiracıyı Kaydet',
        'general-info'               => 'Genel Bilgiler',
        'admin-user'                 => 'Yönetici Kullanıcı',
        'name'                       => 'Şirket Adı',
        'name-placeholder'           => 'Şirket adını girin',
        'subdomain'                  => 'Alt Alan Adı',
        'subdomain-placeholder'      => 'Alt alan adını girin',
        'admin-name'                 => 'Ad',
        'admin-name-placeholder'     => 'Yönetici adını girin',
        'admin-email'                => 'E-posta',
        'admin-email-placeholder'    => 'E-posta adresini girin',
        'admin-password'             => 'Parola',
        'admin-password-placeholder' => 'Parola girin',
    ],

    'edit' => [
        'title'                      => 'Kiracıyı Düzenle',
        'update-btn'                 => 'Kiracıyı Güncelle',
        'general-info'               => 'Genel Bilgiler',
        'name'                       => 'Şirket Adı',
        'name-placeholder'           => 'Şirket adını girin',
        'subdomain'                  => 'Alt Alan Adı',
        'database-name'              => 'Veritabanı Adı',
        'database-warning'           => 'Uyarı: Bunu değiştirmek gerçek veritabanının adını DEĞİŞTİRMEZ. Yalnızca veritabanını manuel olarak taşıdıysanız değiştirin.',
        'is-active'                  => 'Aktif',
        'admin-section'              => 'Yönetici Kullanıcı (Güncelleme İsteğe Bağlı)',
        'admin-email'                => 'Yönetici E-postası',
        'admin-email-placeholder'    => 'Mevcut değeri korumak için boş bırakın',
        'admin-password'             => 'Yönetici Parolası',
        'admin-password-placeholder' => 'Mevcut değeri korumak için boş bırakın',
        'created-at'                 => 'Oluşturulma Tarihi',
    ],

];
