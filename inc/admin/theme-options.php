<?php
/**
 * @package gridz
 */
/**
 * Initializing theme options
 */
function gridz_init_options() {
    if(false === gridz_get_options()) add_option('gridz_options', gridz_default_options());
    $default_options = gridz_default_options();
    $current_options = gridz_get_options();
    if(count($current_options) != count($default_options)) {
        $default_keys = array_keys($default_options);
        foreach($default_keys as $entry) {
            if(array_key_exists($entry,$current_options)) {
                $default_options[$entry] = $current_options[$entry];
            }
        }
        update_option('gridz_options',$default_options);
    }
    register_setting('gridz_options', 'gridz_options', 'gridz_validate_options');
}
add_action('admin_init', 'gridz_init_options');

/**
 * Adding theme options menu item
 */
function gridz_activate_options() {
    $gridz_theme_page = add_theme_page(__('Theme Options','gridz'), __('Theme Options','gridz'), 'edit_theme_options', 'gridz_options', 'gridz_options_page');
    if(!$gridz_theme_page) return;
    add_action('admin_print_styles-' . $gridz_theme_page, 'gridz_enqueue_admin_scripts');
}
add_action('admin_menu', 'gridz_activate_options');

/**
 * Return page capability
 */
function gridz_page_capability($capability) {
    return 'edit_theme_options';
}
add_filter('option_page_capability_gridz_options', 'gridz_page_capability');

/**
 * Enqeueing the javascripts & stylesheets
 */
function gridz_enqueue_admin_scripts($hook_suffix) {
    wp_enqueue_script('jquery');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('gridz_admin_js', get_template_directory_uri().'/inc/admin/js/theme-options.js', array('jquery','wp-color-picker'), false, true);
    wp_enqueue_script('gridz_media_uploader_js', get_template_directory_uri().'/inc/admin/js/media-uploader.js', 'jquery', false);
    wp_enqueue_style('gridz_admin_css', get_template_directory_uri().'/inc/admin/theme-options.css', false, false, 'all');
    wp_enqueue_style('gridz_jquery_ui', 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css', false, false, 'all');
}

/**
 * Applying color scheme
 */
function gridz_color_scheme() {
    global $_wp_admin_css_colors;
    $current_color = get_user_option('admin_color');
    $color_scheme = $_wp_admin_css_colors[$current_color]->colors;
    $icon_color = $_wp_admin_css_colors[$current_color]->icon_colors;
    $hover_bg_color = $color_scheme[2];
    $hover_font_color = $icon_color['current'];
    ?>
    <style type="text/css">
        .tab:hover, .current-tab { background-color: <?php echo $hover_bg_color; ?>; color: <?php echo $hover_font_color; ?> !important; }
    </style>
    <?php
}
add_action("admin_head","gridz_color_scheme");

/**
 * Initialize Slider
 */
function gridz_slider_bar_init() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(".font-slider").each(function() {
            var slider_id = jQuery(this).attr("id");
            var text_id = slider_id.replace("-slider","");
            jQuery(this).slider({
                min: 10,
                max: 40,
                value: jQuery("#" + text_id).val(),
                slide: function(event, ui) {
                    jQuery("#" + text_id).val(ui.value);
                } 
            });
        });        
    });    
    </script>
    <?php
}
add_action("admin_footer","gridz_slider_bar_init");

/**
 * Retreive theme options
 */
function gridz_get_options() {
    return get_option('gridz_options', gridz_default_options());
}

/**
 * Default theme options
 */
function gridz_default_options() {
    $options = array(
        "favicon" => "",
        "logo" => "",
        "color_scheme" => "#59a0d6",
        "header_color" => "#e58c59",
        "content_font" => "font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;",        
        "site_title_font" => "font-family:'pacificoregular';font-weight:normal;",        
        "site_title_font_size" => "26",
        "post_title_font" => "font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:700;",
        "post_title_font_size" => "16",
        "widget_title_font" => "font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:700;",
        "widget_title_font_size" => "16",
        "grid_columns" => "3",
        "show_home_sidebar" => false,
        "sidebar_layout" => "right",
        "show_categories" => true,
        "show_tags" => true,
        "show_post_nav" => true
    );
    return apply_filters("gridz_default_options", $options);
}

function gridz_column_list() {
    $list = array(
        "2" => array("value" => "2", "label" => __("2","gridz")),
        "3" => array("value" => "3", "label" => __("3","gridz")),
        "4" => array("value" => "4", "label" => __("4","gridz")),
    );
    return apply_filters("gridz_options_tabs", $list);
}

function gridz_sidebar_layout() {
    $list = array(
        "left" => array("value" => "left", "label" => __("left","gridz")),
        "right" => array("value" => "right", "label" => __("right","gridz")),
    );
    return apply_filters("gridz_sidebar_layout", $list);
}

function gridz_custom_fonts() {
    $list = array(
        "font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:300;" => array("value" => "font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:300;", "label" => __("Helvetica, Arial Regular","gridz")),
        "font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:700;" => array("value" => "font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:700;", "label" => __("Helvetica, Arial Bold","gridz")),
        "font-family:'pacificoregular';font-weight:normal;" => array("value" => "font-family:'pacificoregular';font-weight:normal;", "label" => __("Pacifico","gridz")),
        "font-family:'comfortaabold';font-weight:normal;" => array("value" => "font-family:'comfortaabold';font-weight:normal;", "label" => __("Comfortaa Bold","gridz")),
        "font-family:'chivoblack';font-weight:normal;text-transform:uppercase;" => array("value" => "font-family:'chivoblack';font-weight:normal;text-transform:uppercase;", "label" => __("Chivo Black","gridz")),        
        "font-family:'source_sans_proextralight';font-weight:normal;" => array("value" => "font-family:'source_sans_proextralight';font-weight:normal;", "label" => __("Source Sans Pro Extra Light","gridz")),
        "font-family:'source_sans_prolight';font-weight:normal;" => array("value" => "font-family:'source_sans_prolight';font-weight:normal;", "label" => __("Source Sans Pro Light","gridz")),
        "font-family:'source_sans_proregular';font-weight:normal;" => array("value" => "font-family:'source_sans_proregular';font-weight:normal;", "label" => __("Source Sans Pro Regular","gridz")),
        "font-family:'source_sans_probold';font-weight:normal;" => array("value" => "font-family:'source_sans_probold';font-weight:normal;", "label" => __("Source Sans Pro Bold","gridz")),
    );
    return apply_filters("gridz_custom_fonts", $list);
}

/**
 * List of theme options tabs
 */
function gridz_options_tabs() {
    $tabs = array(
        "1" => array("value" => "1", "label" => __("Fonts & Colors","gridz")),
        "2" => array("value" => "2", "label" => __("Logo & Favicon","gridz")),
        "3" => array("value" => "3", "label" => __("Homepage","gridz")),
        "4" => array("value" => "4", "label" => __("Post Settings","gridz"))
    );
    return apply_filters("gridz_options_tabs", $tabs);
}

/**
 * Display the options page
 */
function gridz_options_page() {
    if(isset($_POST['settings-reset'])) {
        delete_option('gridz_options');
        add_settings_error('gridz_options','reset',__('Default settings restored','gridz'),'updated');
    }
    ?>
    <div id="settings-wrap">
        <?php $theme_name = wp_get_theme(); ?>
        <h2 class="settings-title"><?php printf(__('%s Theme Options', 'gridz'), $theme_name); ?></h2>
        <table class="settings-table"><tr>
            <td class="settings-tabs">            
                <?php
                $first = true;
                    foreach(gridz_options_tabs() as $entry) {
                        if($first) $current_class = " current-tab"; else $current_class = "";
                        echo '<a class="tab wp-has-current-submenu'.$current_class.'" id="tab-'.$entry['value'].'" href="javascript:void(0)">'.$entry['label'].'</a>';
                        $first = false;
                    }
                ?>
            </td>
            <td class="settings-body">
                <span id="error-container"><?php settings_errors(); ?></span>
                <form method="post" id="settings-form" action="options.php">
                    <?php
                        settings_fields('gridz_options');
                        $gridz_options = gridz_get_options();
                        $gridz_default_options = gridz_default_options();
                    ?>
                    <div class="section" id="section-1"> <!-- Section 1 -->
                        <table>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Color Scheme','gridz'); ?></label></td>
                                <td>
                                    <input type="text" name="gridz_options[color_scheme]" class="color" value="<?php echo esc_attr($gridz_options['color_scheme']); ?>" data-default-color="<?php echo esc_attr($gridz_default_options['color_scheme']); ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Header Color','gridz'); ?></label></td>
                                <td>
                                    <input type="text" name="gridz_options[header_color]" class="color" value="<?php echo esc_attr($gridz_options['header_color']); ?>" data-default-color="<?php echo esc_attr($gridz_default_options['header_color']); ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Content Font','gridz'); ?></label></td>
                                <td>
                                    <select class="font-select" name="gridz_options[content_font]">
                                        <?php foreach (gridz_custom_fonts() as $entry) { ?>
                                            <option value="<?php echo $entry['value']; ?>" <?php selected($gridz_options['content_font'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Site Title Font','gridz'); ?></label></td>
                                <td>
                                    <select class="font-select" name="gridz_options[site_title_font]">
                                        <?php foreach (gridz_custom_fonts() as $entry) { ?>
                                            <option value="<?php echo $entry['value']; ?>" <?php selected($gridz_options['site_title_font'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Site Title Font Size (in px)','gridz'); ?></label></td>
                                <td>
                                    <div id="site-title-font-size-slider" class="font-slider ui-slider"></div>
                                    <input type="text" readonly="readonly" class="readonly" id="site-title-font-size" name="gridz_options[site_title_font_size]" value="<?php echo esc_attr($gridz_options['site_title_font_size']); ?>"/><span>px</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Post Title Font','gridz'); ?></label></td>
                                <td>
                                    <select class="font-select" name="gridz_options[post_title_font]">
                                        <?php foreach (gridz_custom_fonts() as $entry) { ?>
                                            <option value="<?php echo $entry['value']; ?>" <?php selected($gridz_options['post_title_font'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Post Title Font Size (in px)','gridz'); ?></label></td>
                                <td>
                                    <div id="post-title-font-size-slider" class="font-slider ui-slider"></div>
                                    <input type="text" readonly="readonly" class="readonly" id="post-title-font-size" name="gridz_options[post_title_font_size]" value="<?php echo esc_attr($gridz_options['post_title_font_size']); ?>"/><span>px</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Widget Title Font','gridz'); ?></label></td>
                                <td>
                                    <select class="font-select" name="gridz_options[widget_title_font]">
                                        <?php foreach (gridz_custom_fonts() as $entry) { ?>
                                            <option value="<?php echo $entry['value']; ?>" <?php selected($gridz_options['widget_title_font'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Widget Title Font Size (in px)','gridz'); ?></label></td>
                                <td>
                                    <div id="widget-title-font-size-slider" class="font-slider ui-slider"></div>
                                    <input type="text" readonly="readonly" class="readonly" id="widget-title-font-size" name="gridz_options[widget_title_font_size]" value="<?php echo esc_attr($gridz_options['widget_title_font_size']); ?>"/><span>px</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="section" id="section-2"> <!-- Section 2 -->
                        <table>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Custom Logo','gridz'); ?></label></td>
                                <td>
                                    <input type="text" name="gridz_options[logo]" id="logo" value="<?php echo esc_url($gridz_options['logo']); ?>"/>
                                    <input id="logo_upload" type="button" class="button-secondary image_upload" value="<?php _e('Upload Logo','gridz'); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Custom Favicon','gridz'); ?></label></td>
                                <td>
                                    <input type="text" name="gridz_options[favicon]" id="favicon" value="<?php echo esc_url($gridz_options['favicon']); ?>"/>
                                    <input id="favicon_upload" type="button" class="button-secondary image_upload" value="<?php _e('Upload Favicon','gridz'); ?>" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="section" id="section-3"> <!-- Section 3 -->
                        <table>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Number of grid columns','gridz'); ?></label></td>
                                <td>
                                    <select name="gridz_options[grid_columns]">
                                        <?php foreach (gridz_column_list() as $entry) { ?>
                                            <option value="<?php echo $entry['value']; ?>" <?php selected($gridz_options['grid_columns'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Show sidebar along with masonry','gridz'); ?></label></td>
                                <td>
                                    <input type="checkbox" name="gridz_options[show_home_sidebar]" value="false" <?php checked(true,$gridz_options['show_home_sidebar']); ?> />
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="section" id="section-4"> <!-- Section 4 -->
                        <table>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Sidebar Layout','gridz'); ?></label></td>
                                <td>
                                    <?php foreach(gridz_sidebar_layout() as $entry) { ?>
                                        <?php if($gridz_options['sidebar_layout'] == $entry['value']) $selected = " selected"; else $selected = ""; ?>
                                        <img class="image-select <?php echo $selected; ?>" rel="sidebar-layout" id="image-select-<?php echo $entry['value']; ?>" src="<?php echo get_template_directory_uri(); ?>/inc/admin/images/<?php echo $entry['value']; ?>-sidebar.png" />
                                    <?php } ?>
                                    <input type="hidden" name="gridz_options[sidebar_layout]" id="sidebar-layout" value="<?php echo esc_attr($gridz_options['sidebar_layout']); ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Show Categories','gridz'); ?></label></td>
                                <td>
                                    <input type="checkbox" name="gridz_options[show_categories]" value="false" <?php checked(true,$gridz_options['show_categories']); ?> />
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Show Tags','gridz'); ?></label></td>
                                <td>
                                    <input type="checkbox" name="gridz_options[show_tags]" value="false" <?php checked(true,$gridz_options['show_tags']); ?> />
                                </td>
                            </tr>
                            <tr>
                                <td class="tdlabel"><label><?php _e('Show Post Navigation','gridz'); ?></label></td>
                                <td>
                                    <input type="checkbox" name="gridz_options[show_post_nav]" value="false" <?php checked(true,$gridz_options['show_post_nav']); ?> />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php submit_button(__('Save Changes','gridz')); ?>                    
                </form>
                <form method="post" id="settings-reset-form">
                    <input type="submit" class="button-secondary" name="settings-reset" id="settings-reset" value="<?php _e('Reset Settings','gridz'); ?>" />
                </form>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="settings-paypal-form">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="NR5ENJ5DRLHJN">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="<?php _e('PayPal - The safer, easier way to pay online!','gridz'); ?>" title="<?php _e('Donate via PayPal','gridz'); ?>">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
            </td>
        </tr></table>
    </div>
    <?php
}

/**
 * Validate theme options
 */
function gridz_validate_options($input) {
    $output = $defaults = gridz_default_options();
    if(isset($input['grid_columns']) && array_key_exists($input['grid_columns'], gridz_column_list()))
	$output['grid_columns'] = $input['grid_columns'];
    if(isset($input['content_font']) && array_key_exists($input['post_title_font'], gridz_custom_fonts()))
	$output['content_font'] = $input['content_font'];
    if(isset($input['site_title_font']) && array_key_exists($input['site_title_font'], gridz_custom_fonts()))
	$output['site_title_font'] = $input['site_title_font'];
    if(isset($input['post_title_font']) && array_key_exists($input['post_title_font'], gridz_custom_fonts()))
	$output['post_title_font'] = $input['post_title_font'];
    if(isset($input['widget_title_font']) && array_key_exists($input['widget_title_font'], gridz_custom_fonts()))
	$output['widget_title_font'] = $input['widget_title_font'];
        
    if(!gridz_validate_hex_color($input['color_scheme']))
        add_settings_error('gridz_options', 'invalid-hex-color', __('Invalid Color for Color Scheme','gridz'), 'error');
    else
        $output['color_scheme'] = esc_attr($input['color_scheme']);
        
    if(!gridz_validate_hex_color($input['header_color']))
        add_settings_error('gridz_options', 'invalid-hex-color', __('Invalid Color for Header Color','gridz'), 'error');
    else
        $output['header_color'] = esc_attr($input['header_color']);
    
    $output['site_title_font_size'] = esc_attr($input['site_title_font_size']);
    $output['post_title_font_size'] = esc_attr($input['post_title_font_size']);
    $output['widget_title_font_size'] = esc_attr($input['widget_title_font_size']);
    $output['sidebar_layout'] = esc_attr($input['sidebar_layout']);
    
    if(trim($input['favicon']) == "") {
        $output['favicon'] = esc_url_raw($input['favicon']);
    } else {
        if(gridz_validate_image_url($input['favicon'])) {
            if(gridz_validate_image_size($input['favicon'],16,16)) $output['favicon'] = esc_url_raw($input['favicon']);
            else add_settings_error('gridz_options', 'invalid-favicon-size', __('Favicon image cannot exceed 16 x 16 pixels','gridz'), 'error');
        } else add_settings_error('gridz_options', 'invalid-favicon-image', __('Invalid favicon image URL','gridz'), 'error');
    }
    if(trim($input['logo']) == "") {
        $output['logo'] = esc_url_raw($input['logo']);
    } else {
        if(gridz_validate_image_url($input['logo'])) {
            $output['logo'] = esc_url_raw($input['logo']);
        } else add_settings_error('gridz_options', 'invalid-logo-image', __('Invalid logo image URL','gridz'), 'error');
    }
    
    $chkboxinputs = array('show_home_sidebar','show_categories','show_tags','show_post_nav');
    foreach($chkboxinputs as $chkbox) {
        if (!isset($input[$chkbox]))
            $input[$chkbox] = null;
        $output[$chkbox] = ($input[$chkbox] == true ? true : false);
    }

    return apply_filters('gridz_validate_options', $output, $input, $defaults);
}

/**
 * Validation helper functions
 */
function gridz_validate_image_url($url) {
    $exp = "/^https?:\/\/(.)*\.(jpg|png|gif|ico)$/i";
    if(!preg_match($exp,$url))
        return false;
    else
        return true;
}

function gridz_validate_image_size($url,$width,$height) {
    $size = getimagesize($url);
    if($size[0] > $width or $size[1] > $height)
        return false;
    else
        return true;
}

function gridz_validate_number($value) {
    if(is_numeric($value) and $value > 0) {
        return true;
    } else return false;
}

function gridz_validate_hex_color($color) {
    if(preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color))
        return true;
    else return false;
}
?>