<?php
/*
Plugin Name: TODO - Outils
Version: 1.0-todo
Plugin URI: http://www.todo.com
Description: TODO - Custom post type Outils
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

add_action( 'init', 'register_my_cpt_outils', 10 );
function register_my_cpt_outils() {
register_post_type( "outils", array (
  'labels' => 
  array (
    'name' => 'Outils',
    'singular_name' => 'Outil',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter un nouvel outil',
    'edit_item' => 'Modifier l\'outil',
    'new_item' => 'Nouvel outil',
    'view_item' => 'Voir l\'outil',
    'search_items' => 'Chercher un outil',
    'not_found' => 'Aucune outil trouvé',
    'not_found_in_trash' => 'Aucune outil trouvé dans la corbeille',
    'parent_item_colon' => 'Outil parent:',
  ),
  'description' => '',
  'publicly_queryable' => true,
  'exclude_from_search' => false,
  'map_meta_cap' => true,
  'capability_type' => 
  array (
    0 => 'tools',
    1 => 'tools',
  ),
  'public' => true,
  'hierarchical' => false,
  'rewrite' => 
  array (
    'slug' => 'outils',
    'with_front' => true,
    'pages' => true,
    'feeds' => true,
  ),
  'has_archive' => true,
  'query_var' => 'outils',
  'supports' => 
  array (
    0 => 'title',
    1 => 'editor',
    2 => 'author',
    3 => 'thumbnail',
    4 => 'revisions',
  ),
  'taxonomies' => 
  array (
    0 => 'category',
  ),
  'show_ui' => true,
  'menu_position' => 30,
  'menu_icon' => 'dashicons-hammer',
  'can_export' => true,
  'show_in_nav_menus' => true,
  'show_in_menu' => true,
) );
}