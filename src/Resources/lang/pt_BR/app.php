<?php

return [

    'menu-title' => 'Inquilinos',

    'breadcrumbs' => [
        'dashboard' => 'Painel',
        'tenants'   => 'Inquilinos',
        'create'    => 'Criar',
        'edit'      => 'Editar',
    ],

    'index' => [
        'title'      => 'Gerenciar Inquilinos',
        'create-btn' => 'Criar Novo Inquilino',

        'table' => [
            'id'         => 'ID',
            'name'       => 'Nome',
            'subdomain'  => 'Subdomínio',
            'database'   => 'Banco de Dados',
            'status'     => 'Status',
            'created-at' => 'Criado em',
            'actions'    => 'Ações',
        ],

        'status' => [
            'active'   => 'Ativo',
            'inactive' => 'Inativo',
        ],

        'soft-delete-confirm' => 'Tem certeza que deseja fazer uma exclusão suave (desativar)?',

        'hard-delete-modal' => [
            'title'           => 'Exclusão Permanente Definitiva',
            'confirm-text'    => 'Tem certeza que deseja excluir permanentemente o inquilino',
            'irreversible'    => 'Esta ação é IRREVERSÍVEL. Ela irá:',
            'delete-database' => 'Excluir permanentemente o banco de dados.',
            'delete-data'     => 'Remover permanentemente todos os dados.',
            'delete-record'   => 'Remover o registro do inquilino.',
            'password-label'  => 'Confirmação: Senha do Administrador',
            'confirm-btn'     => 'Confirmar Exclusão Permanente',
            'cancel-btn'      => 'Cancelar',
        ],
    ],

    'create' => [
        'title'                      => 'Criar Inquilino',
        'save-btn'                   => 'Salvar Inquilino',
        'general-info'               => 'Informações Gerais',
        'admin-user'                 => 'Usuário Administrador',
        'name'                       => 'Nome da Empresa',
        'name-placeholder'           => 'Insira o nome da empresa',
        'subdomain'                  => 'Subdomínio',
        'subdomain-placeholder'      => 'Insira o subdomínio',
        'admin-name'                 => 'Nome',
        'admin-name-placeholder'     => 'Insira o nome do administrador',
        'admin-email'                => 'E-mail',
        'admin-email-placeholder'    => 'Insira o endereço de e-mail',
        'admin-password'             => 'Senha',
        'admin-password-placeholder' => 'Insira a senha',
    ],

    'edit' => [
        'title'                      => 'Editar Inquilino',
        'update-btn'                 => 'Atualizar Inquilino',
        'general-info'               => 'Informações Gerais',
        'name'                       => 'Nome da Empresa',
        'name-placeholder'           => 'Insira o nome da empresa',
        'subdomain'                  => 'Subdomínio',
        'database-name'              => 'Nome do Banco de Dados',
        'database-warning'           => 'Aviso: Alterar isso NÃO renomeia o banco de dados real. Altere apenas se você migrou o banco manualmente.',
        'is-active'                  => 'Ativo',
        'admin-section'              => 'Usuário Administrador (atualização opcional)',
        'admin-email'                => 'E-mail do Administrador',
        'admin-email-placeholder'    => 'Deixe em branco para manter o atual',
        'admin-password'             => 'Senha do Administrador',
        'admin-password-placeholder' => 'Deixe em branco para manter a atual',
        'created-at'                 => 'Criado em',
    ],

];
