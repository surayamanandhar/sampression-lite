<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'restricted access' );
    function sampression_theme_settings(){
        if (!isset($_REQUEST['settings-updated']))
        $_REQUEST['settings-updated'] = false;
        ?>  
        <!-- header -->
        <div id="sam-wrapper">
            <div id="header" class=" clearfix">
                <div id="logo">
                    <h2><?php _e( 'Sampression Lite', 'sampression' );?></h2>
                    <span class="tagline"><?php _e( 'Just another responsive theme', 'sampression' );?></span>
                </div>
                <div class="sam-version">
                    <span><?php _e( 'version 1.5.2', 'sampression' );?></span>
                </div>
            </div><!--end of #header-->
            <nav id="top-nav" class="clearfix">
                <ul class="external-links">
                    <li><a href="<?php echo esc_url(__('http://sampression.com/themes/sampression-lite','sampression')); ?>" target="_blank"><i class="icon-view-changes-log"></i><?php _e( 'VIEW CHANGE LOG', 'sampression' );?></a></li>
                    <li><a href="<?php echo esc_url(__('http://docs.sampression.com/category/sampression-lite','sampression')); ?>" target="_blank"><i class="icon-theme-documentation"></i><?php _e( 'THEME DOCUMENTATION', 'sampression' );?></a></li>
                    <li><a href="<?php echo esc_url(__('http://wordpress.org/support/theme/sampression-lite','sampression')); ?>" target="_blank"><i class="icon-support-desk"></i><?php _e( 'VISIT SUPPORT DESK', 'sampression' );?></a></li>
                </ul>
            </nav>
            <!-- #top-nav-->
            <div id="sam-main-content" class="clearfix">
                <?php sampression_message_info() ?>
                <!-- sidebar -->
                <div id="sidebar-nav">
                    <ul class="clearfix tabs" id="admin-menu">
                        <?php sampression_option_menu() ?>
                    </ul>
                </div>
                <div class="sam-saving-info"><?php echo _e( 'Please save your changes by clicking save button at the bottom', 'sampression' ); ?></div>
                <!-- content -->
                <form method="post" action="options.php">
                <div id="content">
                    
                         <?php
                            settings_fields( 'sampression_options' );
                            //print_r($options);
                         ?>
                        <div style="display: none;" id="logos-icons" class="tab_content">
                            <?php get_template_part( SAM_FW_ADMIN_TPL_PART_DIR . 'sam-logos-icons' ); ?>
                        </div>
                        <div style="display: none;" id="typography" class="tab_content">
                            <?php get_template_part( SAM_FW_ADMIN_TPL_PART_DIR . 'sam-typography' ); ?>
                        </div>
                        <div style="display: none;" id="social-media" class="tab_content">
                            <?php get_template_part( SAM_FW_ADMIN_TPL_PART_DIR . 'sam-social-media' ); ?>
                        </div>
                        <div style="display: none;" id="custom-css" class="tab_content">
                            <?php get_template_part( SAM_FW_ADMIN_TPL_PART_DIR . 'sam-custom-css' ); ?>
                        </div>    
                    
                </div> <!-- content -->
                <input name="reset" class="button4 sampression-restore" type="submit" value="Reset to theme default settings" >
                </form>
                </div>
                <!-- #sam-main-content-->
                </div>
                <!-- #sam-wrapper -->    
                <?php
    }
    
    
    
function get_sampression_option($option_name) {
    
    global $sampression_options_settings;// print_r($idea_options_settings);
    return $sampression_options_settings[$option_name];
    
}
    
    function sampression_theme_validate( $options ) {
    global $sampression_options_settings, $sampression_option_defaults;
    
    $validated = $sampression_options_settings;
    $defaults = $sampression_option_defaults;
    
    $input = array();
    $input = $options;
    
//print_r($options);
    // Data Validation for Radio Button for chosing website logo or website name		
    if ( isset( $input[ 'use_logo_title' ] ) ) {
        $validated[ 'use_logo_title' ] = $input[ 'use_logo_title' ];
    }
    
    // Data Validation for Logo	Url	
    if ( isset( $input[ 'logo_url' ] ) ) {
        $validated[ 'logo_url' ] = esc_url_raw( $input[ 'logo_url' ] );
    }
    
    // Data Validation for Website Name Font Family
    if ( isset( $input[ 'web_title_font' ] ) ) {
        $validated[ 'web_title_font' ] = sanitize_text_field( $input[ 'web_title_font' ] );
    }
    
    // Data Validation for Website Name Font Size
    if ( isset( $input[ 'web_title_size' ] ) ) {
        $validated[ 'web_title_size' ] = absint( $input[ 'web_title_size' ] );
    }
    
     // Data Validation for Website Name Font Style
    if ( isset( $input[ 'web_title_style' ] ) ) {
        $validated[ 'web_title_style' ] = sanitize_text_field( $input[ 'web_title_style' ] );
    }
    
     // Data Validation for Website Name Font Color
    if ( isset( $input[ 'web_title_color' ] ) ) {
        $validated[ 'web_title_color' ] = sanitize_text_field( $input[ 'web_title_color' ] );
    }
    
     // Data Validation for checkbox for chosing website description
    if ( isset( $input[ 'use_web_desc' ] ) ) {
        $validated[ 'use_web_desc' ] = $input[ 'use_web_desc' ];
    }
    
     // Data Validation for Website description Font Family
    if ( isset( $input[ 'web_desc_font' ] ) ) {
        $validated[ 'web_desc_font' ] = sanitize_text_field( $input[ 'web_desc_font' ] );
    }
    
    // Data Validation for Website description Font Size
    if ( isset( $input[ 'web_desc_size' ] ) ) {
        $validated[ 'web_desc_size' ] = absint( $input[ 'web_desc_size' ] );
    }
    
     // Data Validation for Website description Font Style
    if ( isset( $input[ 'web_desc_style' ] ) ) {
        $validated[ 'web_desc_style' ] = sanitize_text_field( $input[ 'web_desc_style' ] );
    }
    
     // Data Validation for Website description Font Color
    if ( isset( $input[ 'web_desc_color' ] ) ) {
        $validated[ 'web_desc_color' ] = sanitize_text_field( $input[ 'web_desc_color' ] );
    }
    
     // Data Validation for checkbox for not using favicon icon
    if ( isset( $input[ 'donot_use_favicon_16' ] ) ) {
        $validated[ 'donot_use_favicon_16' ] = $input[ 'donot_use_favicon_16' ];
    }
    
     // Data Validation for favicon icon url
    if ( isset( $input[ 'favicon_url_16' ] ) ) {
        $validated[ 'favicon_url_16' ] = esc_url_raw( $input[ 'favicon_url_16' ] );
    }
    
    // Data Validation for checkbox for not using any apple touch icons
    if ( isset( $input[ 'donot_use_apple_icon' ] ) ) {
        $validated[ 'donot_use_apple_icon' ] = $input[ 'donot_use_apple_icon' ];
    }
    
    // Data Validation for checkbox for not using apple touch icons of size 57*57px
    if ( isset( $input[ 'donot_use_apple_icon_57' ] ) ) {
        $validated[ 'donot_use_apple_icon_57' ] = $input[ 'donot_use_apple_icon_57' ];
    }
    
     // Data Validation for apple touch icon url of size 57*57px
    if ( isset( $input[ 'apple_icon_url_57' ] ) ) {
        $validated[ 'apple_icon_url_57' ] = esc_url_raw( $input[ 'apple_icon_url_57' ] );
    }
    
    // Data Validation for checkbox for not using apple touch icons of size 72*72px
    if ( isset( $input[ 'donot_use_apple_icon_72' ] ) ) {
        $validated[ 'donot_use_apple_icon_72' ] = $input[ 'donot_use_apple_icon_72' ];
    }
    
     // Data Validation for apple touch icon url of size 72*72px
    if ( isset( $input[ 'apple_icon_url_72' ] ) ) {
        $validated[ 'apple_icon_url_72' ] = esc_url_raw( $input[ 'apple_icon_url_72' ] );
    }
    
    // Data Validation for checkbox for not using apple touch icons of size 114*114px
    if ( isset( $input[ 'donot_use_apple_icon_114' ] ) ) {
        $validated[ 'donot_use_apple_icon_114' ] = $input[ 'donot_use_apple_icon_114' ];
    }
    
     // Data Validation for apple touch icon url of size 114*114px
    if ( isset( $input[ 'apple_icon_url_114' ] ) ) {
        $validated[ 'apple_icon_url_114' ] = esc_url_raw( $input[ 'apple_icon_url_114' ] );
    }
    
    // Data Validation for checkbox for not using apple touch icons of size 144*144px
    if ( isset( $input[ 'donot_use_apple_icon_144' ] ) ) {
        $validated[ 'donot_use_apple_icon_144' ] = $input[ 'donot_use_apple_icon_144' ];
    }
    
     // Data Validation for apple touch icon url of size 144*144px
    if ( isset( $input[ 'apple_icon_url_144' ] ) ) {
        $validated[ 'apple_icon_url_144' ] = esc_url_raw( $input[ 'apple_icon_url_144' ] );
    }
    
     // Data Validation for General body font family
    if ( isset( $input[ 'body_font_family' ] ) ) {
        $validated[ 'body_font_family' ] = sanitize_text_field( $input[ 'body_font_family' ] );
    }
    
     // Data Validation for General body font size
    if ( isset( $input[ 'body_font_size' ] ) ) {
        $validated[ 'body_font_size' ] = absint( $input[ 'body_font_size' ] );
    }
    
     // Data Validation for post/page title font family
    if ( isset( $input[ 'post_title_font_family' ] ) ) {
        $validated[ 'post_title_font_family' ] = sanitize_text_field( $input[ 'post_title_font_family' ] );
    }
    
     // Data Validation for post/page title font size
    if ( isset( $input[ 'post_title_font_size' ] ) ) {
        $validated[ 'post_title_font_size' ] = absint( $input[ 'post_title_font_size' ] );
    }
    
     // Data Validation for meta text font family
    if ( isset( $input[ 'meta_font_family' ] ) ) {
        $validated[ 'meta_font_family' ] = sanitize_text_field( $input[ 'meta_font_family' ] );
    }
    
     // Data Validation for meta text font size
    if ( isset( $input[ 'meta_font_size' ] ) ) {
        $validated[ 'meta_font_size' ] = absint( $input[ 'meta_font_size' ] );
    }
    
    // Data Validation for meta text font size
    if ( isset( $input[ 'custom_css_value' ] ) ) {
        $validated[ 'custom_css_value' ] = wp_kses_stripslashes( $input[ 'custom_css_value' ] );
    }
    
    // Data Validation for facebook url
    if ( isset( $input[ 'social_facebook_url' ] ) ) {
        $validated[ 'social_facebook_url' ] = esc_url_raw( $input[ 'social_facebook_url' ] );
    }
    
    // Data Validation for twitter url
    if ( isset( $input[ 'social_twitter_url' ] ) ) {
        $validated[ 'social_twitter_url' ] = esc_url_raw( $input[ 'social_twitter_url' ] );
    }
    
    // Data Validation for linkedin url
    if ( isset( $input[ 'social_linkedin_url' ] ) ) {
        $validated[ 'social_linkedin_url' ] = esc_url_raw( $input[ 'social_linkedin_url' ] );
    }
    
    // Data Validation for youtube url
    if ( isset( $input[ 'social_youtube_url' ] ) ) {
        $validated[ 'social_youtube_url' ] = esc_url_raw( $input[ 'social_youtube_url' ] );
    }
    
    return $validated;

    }
    