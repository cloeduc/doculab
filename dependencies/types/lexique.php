<?php
/*
Plugin Name: TODO - Lexique
Version: 1.0-todo
Plugin URI: http://www.todo.com
Description: TODO - Custom post type Lexique
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

add_action( 'init', 'register_my_cpt_lexique', 10 );
function register_my_cpt_lexique() {
register_post_type( "lexique", array (
  'labels' => 
  array (
    'name' => 'Lexique',
    'singular_name' => 'Mot',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter un nouveau mot',
    'edit_item' => 'Modifier le mot',
    'new_item' => 'Nouveau mot',
    'view_item' => 'Voir le mot',
    'search_items' => 'Chercher un mot',
    'not_found' => 'Aucune mot trouvé',
    'not_found_in_trash' => 'Aucune mot trouvé dans la corbeille',
    'parent_item_colon' => 'Mot parent:',
  ),
  'description' => '',
  'publicly_queryable' => true,
  'exclude_from_search' => false,
  'map_meta_cap' => true,
  'capability_type' => 
  array (
    0 => 'lexique',
    1 => 'lexique',
  ),
  'public' => true,
  'hierarchical' => false,
  'rewrite' => 
  array (
    'slug' => 'true',
    'with_front' => true,
    'pages' => true,
    'feeds' => 'true',
  ),
  'has_archive' => 'true',
  'query_var' => 'true',
  'supports' => 
  array (
    0 => 'title',
    1 => 'editor',
    2 => 'revisions',
  ),
  'taxonomies' => 
  array (
  ),
  'show_ui' => true,
  'menu_position' => 30,
  'menu_icon' => 'dashicons-format-quote',
  'can_export' => true,
  'show_in_nav_menus' => true,
  'show_in_menu' => true,
) );
}