<?php

return [

    'menu-title' => 'Mandanten',

    'breadcrumbs' => [
        'dashboard' => 'Dashboard',
        'tenants'   => 'Mandanten',
        'create'    => 'Erstellen',
        'edit'      => 'Bearbeiten',
    ],

    'index' => [
        'title'      => 'Mandanten verwalten',
        'create-btn' => 'Neuen Mandanten erstellen',

        'table' => [
            'id'         => 'ID',
            'name'       => 'Name',
            'subdomain'  => 'Subdomain',
            'database'   => 'Datenbank',
            'status'     => 'Status',
            'created-at' => 'Erstellt am',
            'actions'    => 'Aktionen',
        ],

        'status' => [
            'active'   => 'Aktiv',
            'inactive' => 'Inaktiv',
        ],

        'soft-delete-confirm' => 'Sind Sie sicher, dass Sie diesen Mandanten soft-löschen (deaktivieren) möchten?',

        'hard-delete-modal' => [
            'title'           => 'Permanentes endgültiges Löschen',
            'confirm-text'    => 'Sind Sie sicher, dass Sie den Mandanten dauerhaft löschen möchten',
            'irreversible'    => 'Diese Aktion ist UNWIDERRUFLICH. Sie wird:',
            'delete-database' => 'Die Datenbank dauerhaft löschen.',
            'delete-data'     => 'Alle Daten dauerhaft entfernen.',
            'delete-record'   => 'Den Mandanteneintrag entfernen.',
            'password-label'  => 'Bestätigung: Admin-Passwort',
            'confirm-btn'     => 'Endgültiges Löschen bestätigen',
            'cancel-btn'      => 'Abbrechen',
        ],
    ],

    'create' => [
        'title'                      => 'Mandanten erstellen',
        'save-btn'                   => 'Mandanten speichern',
        'general-info'               => 'Allgemeine Informationen',
        'admin-user'                 => 'Admin-Benutzer',
        'name'                       => 'Firmenname',
        'name-placeholder'           => 'Firmenname eingeben',
        'subdomain'                  => 'Subdomain',
        'subdomain-placeholder'      => 'Subdomain eingeben',
        'admin-name'                 => 'Name',
        'admin-name-placeholder'     => 'Admin-Name eingeben',
        'admin-email'                => 'E-Mail',
        'admin-email-placeholder'    => 'E-Mail-Adresse eingeben',
        'admin-password'             => 'Passwort',
        'admin-password-placeholder' => 'Passwort eingeben',
    ],

    'edit' => [
        'title'                      => 'Mandanten bearbeiten',
        'update-btn'                 => 'Mandanten aktualisieren',
        'general-info'               => 'Allgemeine Informationen',
        'name'                       => 'Firmenname',
        'name-placeholder'           => 'Firmenname eingeben',
        'subdomain'                  => 'Subdomain',
        'database-name'              => 'Datenbankname',
        'database-warning'           => 'Warnung: Diese Änderung benennt die eigentliche Datenbank NICHT um. Nur ändern, wenn Sie die Datenbank manuell migriert haben.',
        'is-active'                  => 'Aktiv',
        'admin-section'              => 'Admin-Benutzer (Aktualisierung optional)',
        'admin-email'                => 'Admin-E-Mail',
        'admin-email-placeholder'    => 'Leer lassen, um den aktuellen Wert beizubehalten',
        'admin-password'             => 'Admin-Passwort',
        'admin-password-placeholder' => 'Leer lassen, um den aktuellen Wert beizubehalten',
        'created-at'                 => 'Erstellt am',
    ],

];
