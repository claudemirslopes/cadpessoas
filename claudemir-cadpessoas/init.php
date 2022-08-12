<?php
/*
Plugin Name: CadPessoas
Description: Plugin com um crud completo de adição, atualização e exclusão de cadastro de pessoas
Version: 1.0
Author: Claudemir Lopes
Author URI: http://openbeta.com.br
*/
// Função para criar o BD / Opções / Padrões
function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "cadpessoas";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
            `email` varchar(50) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// Execute os scripts de instalação na ativação do plugin
register_activation_hook(__FILE__, 'ss_options_install');

// Itens do Menu
add_action('admin_menu','cadpessoas_modifymenu');
function cadpessoas_modifymenu() {

	// Este é o item principal do menu
	add_menu_page('CadPessoas', //page title
	'CadastroPessoas', //menu title
	'manage_options', //capabilities
	'cadpessoas_list', //menu slug
	'cadpessoas_list' //function
	);

	// Este é o submenu
	add_submenu_page('cadpessoas_list', //parent slug
	'Add Nova Pessoa', //page title
	'Add Novo Registro', //menu title
	'manage_options', //capability
	'cadpessoas_create', //menu slug
	'cadpessoas_create'); //function

	// Este submenu está ESCONDIDO, no entanto, precisamos adicioná-lo de qualquer maneira
	add_submenu_page(null, //parent slug
	'Update CadPessoas', //page title
	'Update', //menu title
	'manage_options', //capability
	'cadpessoas_update', //menu slug
	'cadpessoas_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'cadpessoas-list.php');
require_once(ROOTDIR . 'cadpessoas-create.php');
require_once(ROOTDIR . 'cadpessoas-update.php');
