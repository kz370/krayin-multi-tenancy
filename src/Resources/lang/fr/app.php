<?php

return [

    'menu-title' => 'Locataires',

    'breadcrumbs' => [
        'dashboard' => 'Tableau de bord',
        'tenants'   => 'Locataires',
        'create'    => 'Créer',
        'edit'      => 'Modifier',
    ],

    'index' => [
        'title'      => 'Gérer les locataires',
        'create-btn' => 'Créer un nouveau locataire',

        'table' => [
            'id'         => 'ID',
            'name'       => 'Nom',
            'subdomain'  => 'Sous-domaine',
            'database'   => 'Base de données',
            'status'     => 'Statut',
            'created-at' => 'Créé le',
            'actions'    => 'Actions',
        ],

        'status' => [
            'active'   => 'Actif',
            'inactive' => 'Inactif',
        ],

        'soft-delete-confirm' => 'Voulez-vous vraiment effectuer une suppression douce (désactiver) ?',

        'hard-delete-modal' => [
            'title'           => 'Suppression définitive permanente',
            'confirm-text'    => 'Voulez-vous vraiment supprimer définitivement le locataire',
            'irreversible'    => 'Cette action est IRRÉVERSIBLE. Elle va :',
            'delete-database' => 'Supprimer définitivement la base de données.',
            'delete-data'     => 'Supprimer définitivement toutes les données.',
            'delete-record'   => 'Supprimer l\'enregistrement du locataire.',
            'password-label'  => 'Confirmation : Mot de passe administrateur',
            'confirm-btn'     => 'Confirmer la suppression définitive',
            'cancel-btn'      => 'Annuler',
        ],
    ],

    'create' => [
        'title'                      => 'Créer un locataire',
        'save-btn'                   => 'Enregistrer le locataire',
        'general-info'               => 'Informations générales',
        'admin-user'                 => 'Utilisateur administrateur',
        'name'                       => 'Nom de l\'entreprise',
        'name-placeholder'           => 'Entrez le nom de l\'entreprise',
        'subdomain'                  => 'Sous-domaine',
        'subdomain-placeholder'      => 'Entrez le sous-domaine',
        'admin-name'                 => 'Nom',
        'admin-name-placeholder'     => 'Entrez le nom de l\'administrateur',
        'admin-email'                => 'E-mail',
        'admin-email-placeholder'    => 'Entrez l\'adresse e-mail',
        'admin-password'             => 'Mot de passe',
        'admin-password-placeholder' => 'Entrez le mot de passe',
    ],

    'edit' => [
        'title'                      => 'Modifier le locataire',
        'update-btn'                 => 'Mettre à jour le locataire',
        'general-info'               => 'Informations générales',
        'name'                       => 'Nom de l\'entreprise',
        'name-placeholder'           => 'Entrez le nom de l\'entreprise',
        'subdomain'                  => 'Sous-domaine',
        'database-name'              => 'Nom de la base de données',
        'database-warning'           => 'Avertissement : Modifier ceci ne renomme PAS la base de données réelle. Ne modifiez que si vous avez migré la base manuellement.',
        'is-active'                  => 'Actif',
        'admin-section'              => 'Utilisateur administrateur (mise à jour optionnelle)',
        'admin-email'                => 'E-mail de l\'administrateur',
        'admin-email-placeholder'    => 'Laisser vide pour conserver l\'actuel',
        'admin-password'             => 'Mot de passe administrateur',
        'admin-password-placeholder' => 'Laisser vide pour conserver l\'actuel',
        'created-at'                 => 'Créé le',
    ],

];
