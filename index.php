<?php
/*
Plugin Name: SEO Custom Fields
Description: SEO Custom Fields plugin allows you to add custom meta tags for category and tag pages. You can override the title and set meta description and meta keywords for category and tag pages.
Plugin URI: http://product.soandso.biz/veb-zastosunki/plagini-wordpress/plagin-seo-custom-fields.html
Author: Dmytriyenko Vyacheslav, Denis Pishniak
Author URI: https://soandso.biz/
Version: 1.0.2
License: GPL2
*/

/*

    Copyright (C) 2017 Dmytriyenko Vyacheslav  (email: info@soandso.biz)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


    define('SEO_Custom_Fields', true);
    define('SCF_PLAGIN_PATH', plugin_dir_path( __FILE__ ));
    include_once ('init.php');
    include_once ('general.php');
    include_once ('view/view.php');
    $taxname1 = 'category';
	$taxname2 = 'post_tag';

    add_action( 'admin_menu', array('scfClassInitialization', 'scf_add_menu_seo'));
    add_action('admin_init', array('scfClassInitialization', 'scf_metaseo_admin_settings'));
    add_action("{$taxname1}_add_form_fields", array('scfClassGeneral', 'scf_add_new_custom_fields'));
    add_action("{$taxname1}_edit_form_fields", array('scfClassGeneral', 'scf_edit_new_custom_fields'));
    add_action("create_{$taxname1}", array('scfClassGeneral', 'scf_save_custom_taxonomy_meta'));
    add_action("edited_{$taxname1}", array('scfClassGeneral', 'scf_save_custom_taxonomy_meta'));
    add_action('add_tag_form_fields', array('scfClassGeneral', 'scf_action_function_addtag'));
    add_action('edit_tag_form_fields', array('scfClassGeneral', 'scf_action_function_edittag'));
    add_action("create_{$taxname2}", array('scfClassGeneral', 'scf_save_custom_taxonomy_meta'));
    add_action("edited_{$taxname2}", array('scfClassGeneral', 'scf_save_custom_taxonomy_meta'));
    add_filter('pre_get_document_title', array('scfClassView', 'scf_filter_function_tagtitle'));
    add_action('wp_head', array('scfClassView', 'scf_add_taxseo_head_meta_fields'));
    register_activation_hook( __FILE__, array('scfClassInitialization', 'scf_seo_activation') );
    register_deactivation_hook( __FILE__, array('scfClassInitialization', 'scf_seo_deactivation'));
 ?>