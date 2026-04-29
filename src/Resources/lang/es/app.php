<?php

return [

    'menu-title' => 'Inquilinos',

    'breadcrumbs' => [
        'dashboard' => 'Panel de control',
        'tenants'   => 'Inquilinos',
        'create'    => 'Crear',
        'edit'      => 'Editar',
    ],

    'index' => [
        'title'      => 'Gestionar inquilinos',
        'create-btn' => 'Crear nuevo inquilino',

        'table' => [
            'id'         => 'ID',
            'name'       => 'Nombre',
            'subdomain'  => 'Subdominio',
            'database'   => 'Base de datos',
            'status'     => 'Estado',
            'created-at' => 'Creado el',
            'actions'    => 'Acciones',
        ],

        'status' => [
            'active'   => 'Activo',
            'inactive' => 'Inactivo',
        ],

        'soft-delete-confirm' => '¿Está seguro de que desea eliminar suavemente (desactivar)?',

        'hard-delete-modal' => [
            'title'           => 'Eliminación permanente definitiva',
            'confirm-text'    => '¿Está seguro de que desea eliminar permanentemente al inquilino',
            'irreversible'    => 'Esta acción es IRREVERSIBLE. Realizará:',
            'delete-database' => 'Eliminar permanentemente la base de datos.',
            'delete-data'     => 'Eliminar permanentemente todos los datos.',
            'delete-record'   => 'Eliminar el registro del inquilino.',
            'password-label'  => 'Confirmación: Contraseña de administrador',
            'confirm-btn'     => 'Confirmar eliminación permanente',
            'cancel-btn'      => 'Cancelar',
        ],
    ],

    'create' => [
        'title'                      => 'Crear inquilino',
        'save-btn'                   => 'Guardar inquilino',
        'general-info'               => 'Información general',
        'admin-user'                 => 'Usuario administrador',
        'name'                       => 'Nombre de la empresa',
        'name-placeholder'           => 'Ingrese el nombre de la empresa',
        'subdomain'                  => 'Subdominio',
        'subdomain-placeholder'      => 'Ingrese el subdominio',
        'admin-name'                 => 'Nombre',
        'admin-name-placeholder'     => 'Ingrese el nombre del administrador',
        'admin-email'                => 'Correo electrónico',
        'admin-email-placeholder'    => 'Ingrese la dirección de correo electrónico',
        'admin-password'             => 'Contraseña',
        'admin-password-placeholder' => 'Ingrese la contraseña',
    ],

    'edit' => [
        'title'                      => 'Editar inquilino',
        'update-btn'                 => 'Actualizar inquilino',
        'general-info'               => 'Información general',
        'name'                       => 'Nombre de la empresa',
        'name-placeholder'           => 'Ingrese el nombre de la empresa',
        'subdomain'                  => 'Subdominio',
        'database-name'              => 'Nombre de la base de datos',
        'database-warning'           => 'Advertencia: Cambiar esto NO cambia el nombre de la base de datos real. Solo cambie si migró la BD manualmente.',
        'is-active'                  => 'Activo',
        'admin-section'              => 'Usuario administrador (actualización opcional)',
        'admin-email'                => 'Correo del administrador',
        'admin-email-placeholder'    => 'Dejar en blanco para mantener el actual',
        'admin-password'             => 'Contraseña del administrador',
        'admin-password-placeholder' => 'Dejar en blanco para mantener la actual',
        'created-at'                 => 'Creado el',
    ],

];
