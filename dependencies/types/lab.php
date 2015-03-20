<?php
/*
Plugin Name: TODO - Vies du Lab
Version: 1.0-todo
Plugin URI: http://www.todo.com
Description: TODO - Custom post type Vies du Lab
Author: TODO - Simple Custom Post Types Generator
Author URI: http://www.todo.com

----

Copyright 2012 - TODO Author

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_action( 'init', 'register_my_cpt_lab', 10 );
function register_my_cpt_lab() {
register_post_type( "lab", array (
  'labels' => 
  array (
    'name' => 'Vies du Lab',
    'singular_name' => 'Vie du Lab',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une nouvelle entrée',
    'edit_item' => 'Modifier l\'entrée',
    'new_item' => 'Nouvelle entrée',
    'view_item' => 'Voir l\'entrée',
    'search_items' => 'Chercher une entrée',
    'not_found' => 'Aucune entrée trouvée',
    'not_found_in_trash' => 'Aucune entrée trouvée dans la corbeille',
    'parent_item_colon' => 'Entrée parente:',
  ),
  'description' => '',
  'publicly_queryable' => true,
  'exclude_from_search' => false,
  'map_meta_cap' => true,
  'capability_type' => 'post',
  'public' => true,
  'hierarchical' => false,
  'rewrite' => 
  array (
    'slug' => 'lab',
    'with_front' => true,
    'pages' => true,
    'feeds' => true,
  ),
  'has_archive' => true,
  'query_var' => 'lab',
  'supports' => 
  array (
    0 => 'title',
    1 => 'editor',
  ),
  'taxonomies' => 
  array (
  ),
  'show_ui' => true,
  'menu_position' => 10,
  'menu_icon' => 'dashicons-admin-settings',
  'can_export' => true,
  'show_in_nav_menus' => true,
  'show_in_menu' => true,
) );
}