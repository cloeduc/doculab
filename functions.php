<?php 
CONST CONF_PAGE = 128;
require_once ('dependencies/types/tutoriaux.php');
require_once ('dependencies/types/projets.php');
require_once ('dependencies/types/outils.php');
require_once ('dependencies/types/lexique.php');

require_once ('dependencies/register-acf-fields.php');
require_once ('dependencies/check_dependencies.php');
/**
 * Register sidebars and widgetized areas
 */

function doculab_excerpt_more( $more ) {
	return '<a href="'. get_the_permalink() .'" class="read-more"> <span class="genericon-next"></span></a>';
}
add_filter( 'excerpt_more', 'doculab_excerpt_more');

remove_filter('excerpt_more', 'gridz_auto_excerpt_more');

if ( function_exists ('register_sidebar')) { 
    register_sidebar (array(
    'name'    => __( 'Author sidebar' ),
    'id'      => 'sidebar-author',
    'description'  => __( 'Sidebar de la parge auteur.' ),
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
	$display_options = get_field('afficher_le_slider', 'option');
	if((in_array('home_page', $display_options) && is_home()) OR (in_array('page', $display_options) && is_page()) OR (in_array('post', $display_options) && is_single()))
	{
		$slides = get_field('slides', 'option');
		include ('slider.php');
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