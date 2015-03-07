<?php 
CONST CONF_PAGE = 128;
require_once ('dependencies/types/tutoriaux.php');
require_once ('dependencies/types/projets.php');
require_once ('dependencies/types/outils.php');
require_once ('dependencies/types/lexique.php');

require_once ('dependencies/register-acf-fields.php');


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


function check_dependencies() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'          => 'CDTools Clean Login', 
            'slug'          => 'cdtools-clean-login',
            'source'        => get_stylesheet_directory() . '/dependencies/plugins/cdtools-clean-login.zip', 
            'required'      => true, 
            'version'       => '',
            'force_activation'   => false, 
            'force_deactivation' => false, 
            'external_url'  => '', 
        ),
        array(
            'name'          => 'CDTools Custom Admin',
            'slug'          => 'cdtools-custom-admin',
            'source'        => get_stylesheet_directory() . '/dependencies/plugins/cdtools-custom-admin.zip',
            'required'      => true, 
            'version'       => '', 
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'  => 'https://github.com/cloeduc/wpcdtools-custom_admin', 
        ),
        array(
            'name'          => 'CDTools How To Contribute',
            'slug'          => 'cdtools-how-to-contribute',
            'source'        => get_stylesheet_directory() . '/dependencies/plugins/cdtools-how-to-contribute.zip', 
            'required'      => true,
            'version'       => '', 
            'force_activation'   => false, 
            'force_deactivation' => false,
            'external_url'  => 'https://github.com/cloeduc/wpcdtools-how_to_contribute', 
        ),
        array(
            'name'          => 'CDTools Main Query Post',
            'slug'          => 'cdtools-main-query-posts',
            'source'        => get_stylesheet_directory() . '/dependencies/plugins/cdtools-main-query-posts.zip', 
            'required'      => true,
            'version'       => '', 
            'force_activation'   => false, 
            'force_deactivation' => false,
            'external_url'  => 'https://github.com/cloeduc/wpcdtools-main_query_posts', 
        ),
        array(
            'name'          => 'CDTools Manager Supported File Type', 
            'slug'          => 'cdtools-manage-suported-file-type', 
            'source'        => get_stylesheet_directory() . '/dependencies/plugins/cdtools-manage-suported-file-type.zip',
            'required'      => true, 
            'version'       => '', 
            'force_activation'   => false, 
            'force_deactivation' => false, 
            'external_url'  => 'https://github.com/cloeduc/wpcdtools-manage_suported_file_type', 
        ),
        array(
            'name'          => 'Sweet Custom Dashboard', 
            'slug'          => 'sweet-custom-dashboard', 
            'source'        => get_stylesheet_directory() . '/dependencies/plugins/sweet-custom-dashboard.zip', 
            'required'      => true, 
            'version'       => '',
            'force_activation'   => false, 
            'force_deactivation' => false, 
            'external_url'  => 'http://remicorson.com/sweet-custom-dashboard', 
        ),
        array(
            'name'          => 'Advanced Custom Fields Pro', 
            'slug'          => 'advanced-custom-fields-pro', 
            'source'        => get_stylesheet_directory() . '/dependencies/plugins/advanced-custom-fields-pro.zip', 
            'required'      => true, 
            'version'       => '',
            'force_activation'   => false, 
            'force_deactivation' => false, 
            'external_url'  => 'http://www.advancedcustomfields.com/', 
        ),
        //requis
        array('name'	=> 'Private Messages For WordPress', 'slug'	=> 'private-messages-for-wordpress', 'required'  => true),
        array('name' 	=> 'WP User Avatar', 'slug' => 'wp-user-avatar', 'required'  => true),
        array('name' 	=> 'Minimum Password Strength','slug' => 'minimum-password-strength','required'  => true),
        array('name'    => 'Co-Authors Plus', 'slug' => 'co-authors-plus', 'required'  => true),
        array('name'    => 'iThemes Security', 'slug' => 'better-wp-security', 'required'  => true),
        array('name'    => 'Auto Upload Images', 'slug' => 'auto-upload-images', 'required'  => true),
        array('name'    => 'Advanced Custom Fields - Taxonomy Field add-on', 'slug' => 'advanced-custom-fields-taxonomy-field-add-on', 'required'  => true),
        array('name' => 'Admin Menu Editor','slug' => 'admin-menu-editor', 'required'  => true),
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
         array('name' => 'Advanced Custom Fields: Date and Time Picker', 'slug' => 'acf-field-date-time-picker','required'  => false),
        array('name' => 'Confirm User Registration', 'slug' => 'confirm-user-registration','required'  => false,
        ),
        array('name' => 'WP Password Generator','slug' => 'wp-password-generator','required'  => false,
        ),
        array(
            'name' => 'Wp Lightbox Bank Standard Edition',
            'slug' => 'wp-lightbox-bank',
            'required'  => false,
        ),
        array(
            'name' => 'WP-DBManager',
            'slug' => 'wp-dbmanager',
            'required'  => false,
        ),
        array(
            'name' => 'User Role Editor',
            'slug' => 'user-role-editor',
            'required'  => false,
        ),
        array(
            'name' => 'TinyMCE Advanced',
            'slug' => 'tinymce-advanced',
            'required'  => false,
        ),
        array(
            'name' => 'Simple Image Sizes',
            'slug' => 'simple-image-sizes',
            'required'  => false,
        ),
        array(
            'name' => 'Simple Custom Post Types',
            'slug' => 'simple-custom-types',
            'required'  => false,
        ),
        array(
            'name' => 'Random Post Widget',
            'slug' => 'random-post-widget',
            'required'  => false,
        ),
);

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'    => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.
        'strings' => array(
	            'page_title'                 => __( 'Installer les plugins requis', 'tgmpa' ),
	            'menu_title'                 => __( 'Installer les Plugins', 'tgmpa' ),
	            'installing'                 => __( 'Installation du Plugin: %s', 'tgmpa' ), // %s = plugin name.
	            'oops'                       => __( 'Quelque chose ne fonctionne pas avec l\'API.', 'tgmpa' ),
	            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
	            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
	            'notice_cannot_install'      => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
	            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
	            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
	            'notice_cannot_activate'     => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
	            'notice_ask_to_update'       => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
	            'notice_cannot_update'       => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
	            'install_link'               => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
	            'activate_link'              => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
	            'return'                     => __( 'Return to Required Plugins Installer', 'tgmpa' ),
	            'plugin_activated'           => __( 'Plugin activated successfully.', 'tgmpa' ),
	            'complete'                   => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
	            'nag_type'                   => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
add_action('tgmpa_register', 'check_dependencies');
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