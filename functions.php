<?php 
//First desactive comments
require_once ('dependencies/types/tutoriaux.php');
require_once ('dependencies/types/projets.php');
require_once ('dependencies/types/outils.php');
require_once ('dependencies/types/lexique.php');

require_once ('dependencies/class-tgm-plugin-activation.php');
require_once ('dependencies/register-acf-fields.php');
require_once ('dependencies/check_dependencies.php');

function example_disable_all_comments_and_pings() {

	// Turn off comments
	if( '' != get_option( 'default_ping_status' ) ) {
		update_option( 'default_ping_status', '' );
	} // end if

	// Turn off pings
	if( '' != get_option( 'default_comment_status' ) ) {
		update_option( 'default_comment_status', '' );
	} // end if

} // end example_disable_all_comments_and_pings
add_action( 'after_setup_theme', 'example_disable_all_comments_and_pings' );

/*
Creates menu navigation
*/
unregister_nav_menu('primary');

function register_my_menu() {
	$run_once = get_option('menu_check');
    $connexionpage = get_option(OPTION_LOGIN_PAGE_NAME);
    $howtocontribute_id = get_option(CDTOOLS_PLUGIN_OPTION_PAGE_NAME);

	if (!$run_once){
	    //give your menu a name
	    $name = 'Primary Menu';
	    //create the menu
	    $menu_id = wp_create_nav_menu($name);

	    //then get the menu object by its name
	    $menu = get_term_by( 'name', $name, 'nav_menu' );
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  __('Comment contribuer ?'),
	        'menu-item-classes' => 'how-to-contribute',
	        'menu-item-url' => get_the_permalink($howtocontribute_id), 
	        'menu-item-status' => 'publish'));
	    //then add the actuall link/ menu item and you do this for each item you want to add
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  __('Documenter !'),
	        'menu-item-classes' => 'connexion connexion-button',
	        'menu-item-url' => admin_url(), 
	        'menu-item-status' => 'publish'));

	    //then you set the wanted theme  location
	    $locations = get_theme_mod('nav_menu_locations');
	    $locations['main-menu'] = $menu->term_id;
	    set_theme_mod( 'nav_menu_locations', $locations );

	    // then update the menu_check option to make sure this code only runs once
	    update_option('menu_check', true);
	}
}
add_action( 'init', 'register_my_menu' );

function doculab_excerpt_more( $more ) {
	return '<a href="'. get_the_permalink() .'" class="read-more"> <span class="genericon-next"></span></a>';
}
add_filter( 'excerpt_more', 'doculab_excerpt_more');

remove_filter('excerpt_more', 'gridz_auto_excerpt_more');
if ( function_exists ('register_sidebar')) {
    register_sidebar (array(
    'name'    => __( 'Author sidebar' ),
    'id'      => 'sidebar-author',
    'description'  => __( 'Sidebar de la page auteur.' ),
    'before_title' => '<h1>',
    'after_title'  => '</h1>',
)); 
}

add_image_size( 'gridz-featured', '800', '400', true );
add_image_size( 'gridz-slider', '640', '640', true );
add_image_size( 'large-slider', '1400', '200', true );
add_image_size( 'widget-size', '500', '250', true );
add_image_size( 'guest-author-32', '32', '32', true );
add_image_size( 'guest-author-64', '64', '64', true );
add_image_size( 'guest-author-96', '96', '96', true );
add_image_size( 'guest-author-128', '128', '128', true );

function get_sentence($key)
{
	$sentences = array(
		'short' 		=> 'Projet court',
		'very_sort' 	=> 'Projet très court',
		'middle_time'	=> 'Projet moyen',
		'long'			=> 'Projet long',
		'very_long'		=> 'Projet très long',
		'easy'			=> 'Débutant',
		'normal'		=> 'Normale',
		'hard'			=> 'Expert',
		'on'			=> 'Projet en cours',
		'paused'		=> 'Projet en pause',
		'ended'			=> 'Projet terminé',
		);
	echo (isset($sentences[$key]))? $sentences[$key] : $key;
}



/**
 * Load javascripts used by the theme
 */
function custom_theme_css(){
	wp_dequeue_script( 'gridz_flexslider_css' );
	wp_dequeue_script( 'gridz_genericons_css' );
	wp_register_style('docu_genericons_css', get_theme_root_uri() . '/doculab/genericons/genericons.css',false,false);
	wp_register_style('docu_flexslider_css', get_theme_root_uri() . '/doculab/css/flexslider.css',false,false);
	wp_enqueue_style('docu_genericons_css');
	wp_enqueue_style('docu_flexslider_css');
}


function custom_theme_js(){
	wp_deregister_script( 'gridz_flexslider_js' );
 	wp_enqueue_script('docu_flexslider_js', get_theme_root_uri() . '/doculab/js/jquery.flexslider-min.js', array('jquery'), 1,true);
	wp_register_script( 'infinite_scroll',  get_theme_root_uri() . '/doculab/js/jquery.infinitescroll.min.js', array('jquery'), 1,true );
	wp_register_script('custom-doculab', get_theme_root_uri().'/doculab/js/custom.js', 'jquery', 1, true);
	wp_enqueue_script('custom-doculab');
	if( ! is_singular() ) 
	{
		wp_enqueue_script('infinite_scroll');
	}

}
add_action('wp_enqueue_scripts', 'custom_theme_js');
add_action('wp_enqueue_scripts', 'custom_theme_css');



function display_slider()
{
	if(function_exists('get_field')) {
		$display_options = get_field('afficher_le_slider', 'option');
		if(is_array($display_options)and ((in_array('home_page', $display_options) && is_home()) OR (in_array('page', $display_options) && is_page()) OR (in_array('post', $display_options) && is_single())))
		{
			$slides = get_field('slides', 'option');
			include ('slider.php');
		}
	}
}
/**
 * Custom header style
 */
function doc_style() {
    global $gridz_options;
    $text_color = trim(get_header_textcolor());
    $header_image = trim(get_header_image());
    if($text_color == "") $text_color = "ffffff";
    ?>
    <style type="text/css">
    #contribuer {background-color: <?php echo $gridz_options['color_scheme']; ?>;
	border-color:<?php echo $gridz_options['color_scheme']; ?>;}
	#primary.widget-area .author-card {
		background-color:<?php echo $gridz_options['color_scheme']; ?> 
	}
    .cleanlogin-form input[type="submit"] {background-color:<?php echo $gridz_options['color_scheme']; ?>;}
    .loginlink a {color:<?php echo $gridz_options['color_scheme']; ?>;}
     #forgotpassword,  #registration {border-color:<?php echo $gridz_options['color_scheme']; ?>;}
     #forgotpassword h2,  #registration h2, .cleanlogin-form h2 {color:<?php echo $gridz_options['color_scheme']; ?>;}
    #container.three-column header .entry-title {color:<?php echo $gridz_options['color_scheme']; ?>;}
    .avatar h2{color:<?php echo $gridz_options['color_scheme']; ?>;}
    a.buttonlink{background-color:<?php echo $gridz_options['color_scheme']; ?>;}
    #explorenav  li li:hover, .explore-cat li li:hover {background-color:<?php echo $gridz_options['color_scheme']; ?>;}
    .rssbutton{color:<?php echo $gridz_options['color_scheme']; ?>;}
    #contribuer:hover{background-color: <?php echo $gridz_options['header_color']; ?>;}
    #home-slider .slider-title{background-color: <?php echo $gridz_options['header_color']; ?>;}
    h1.entry-title a,   h1.entry-title {color:<?php echo $gridz_options['header_color']; ?>;}
    #contribuer .txt {<?php echo $gridz_options['site_title_font']; ?>}
    .slider-description a {background-color: <?php echo $gridz_options['header_color']; ?>;}
    #home-slider a:hover {background-color: $gridz_options['color_scheme']; ?>;}
    #primary.widget-area .author-card {background-color: <?php echo $gridz_options['header_color']; ?>}
    /style>
    <?php
}
add_action("wp_head","doc_style");


?>