<?php
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
        array('name'    => 'Private Messages For WordPress', 'slug' => 'private-messages-for-wordpress', 'required'  => true),
        array('name'    => 'WP User Avatar', 'slug' => 'wp-user-avatar', 'required'  => true),
        array('name'    => 'Minimum Password Strength','slug' => 'minimum-password-strength','required'  => true),
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
            'name' => 'Simple Image Sizes',
            'slug' => 'simple-image-sizes',
            'required'  => true,
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