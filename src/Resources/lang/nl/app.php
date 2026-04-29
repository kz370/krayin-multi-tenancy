<?php

return [

    'menu-title' => 'Huurders',

    'breadcrumbs' => [
        'dashboard' => 'Dashboard',
        'tenants'   => 'Huurders',
        'create'    => 'Aanmaken',
        'edit'      => 'Bewerken',
    ],

    'index' => [
        'title'      => 'Huurders beheren',
        'create-btn' => 'Nieuwe huurder aanmaken',

        'table' => [
            'id'         => 'ID',
            'name'       => 'Naam',
            'subdomain'  => 'Subdomein',
            'database'   => 'Database',
            'status'     => 'Status',
            'created-at' => 'Aangemaakt op',
            'actions'    => 'Acties',
        ],

        'status' => [
            'active'   => 'Actief',
            'inactive' => 'Inactief',
        ],

        'soft-delete-confirm' => 'Weet u zeker dat u deze huurder zacht wilt verwijderen (deactiveren)?',

        'hard-delete-modal' => [
            'title'           => 'Permanent definitief verwijderen',
            'confirm-text'    => 'Weet u zeker dat u huurder permanent wilt verwijderen',
            'irreversible'    => 'Deze actie is ONOMKEERBAAR. Het zal:',
            'delete-database' => 'De database permanent verwijderen.',
            'delete-data'     => 'Alle gegevens permanent verwijderen.',
            'delete-record'   => 'Het huurdersrecord verwijderen.',
            'password-label'  => 'Bevestiging: Beheerderswachtwoord',
            'confirm-btn'     => 'Permanent verwijderen bevestigen',
            'cancel-btn'      => 'Annuleren',
        ],
    ],

    'create' => [
        'title'                      => 'Huurder aanmaken',
        'save-btn'                   => 'Huurder opslaan',
        'general-info'               => 'Algemene informatie',
        'admin-user'                 => 'Beheerdergebruiker',
        'name'                       => 'Bedrijfsnaam',
        'name-placeholder'           => 'Voer bedrijfsnaam in',
        'subdomain'                  => 'Subdomein',
        'subdomain-placeholder'      => 'Voer subdomein in',
        'admin-name'                 => 'Naam',
        'admin-name-placeholder'     => 'Voer beheerdersnaam in',
        'admin-email'                => 'E-mail',
        'admin-email-placeholder'    => 'Voer e-mailadres in',
        'admin-password'             => 'Wachtwoord',
        'admin-password-placeholder' => 'Voer wachtwoord in',
    ],

    'edit' => [
        'title'                      => 'Huurder bewerken',
        'update-btn'                 => 'Huurder bijwerken',
        'general-info'               => 'Algemene informatie',
        'name'                       => 'Bedrijfsnaam',
        'name-placeholder'           => 'Voer bedrijfsnaam in',
        'subdomain'                  => 'Subdomein',
        'database-name'              => 'Databasenaam',
        'database-warning'           => 'Waarschuwing: Dit wijzigen hernoemt de feitelijke database NIET. Wijzig alleen als u de database handmatig heeft gemigreerd.',
        'is-active'                  => 'Actief',
        'admin-section'              => 'Beheerdergebruiker (bijwerken optioneel)',
        'admin-email'                => 'Beheerders-e-mail',
        'admin-email-placeholder'    => 'Leeg laten om huidig te behouden',
        'admin-password'             => 'Beheerderswachtwoord',
        'admin-password-placeholder' => 'Leeg laten om huidig te behouden',
        'created-at'                 => 'Aangemaakt op',
    ],

];
