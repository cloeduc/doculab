<?php 
// Création de la page de configuration
// le plugin option page est configuré
if(function_exists('acf_add_options_page')):
	//la page d'option n'existe pas
	acf_add_options_page('Slider options');
endif;

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/dependencies/groups_fields/';
    return $path;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/dependencies/groups_fields/';
    return $paths;
}