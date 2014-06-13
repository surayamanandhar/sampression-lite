<?php

if (!defined('ABSPATH'))
    exit('restricted access');

/* ---------- Fonts Defaults ------------- */
/**
 * Fonts Defaults
 *
 * @return array
 */

global $sampression_option_defaults;
$sampression_option_defaults = array(
    'use_logo_title' => 'use_title',
    'logo_url' => SAM_FW_ADMIN_IMAGES_URL . '/logo-naya.png',
    'web_title_font' => 'Kreon',
    'web_title_size' => 20,
    'web_title_style' => 'bold',
    'web_title_color' => '#9BB0AB',
    'use_web_desc' => 'yes',
    'web_desc_font' => 'Kreon',
    'web_desc_size' => 16,
    'web_desc_style' => 'normal',
    'web_desc_color' => '#9BB0AB',
    'donot_use_favicon_16' => 'yes',
    'favicon_url_16' => SAM_FW_ADMIN_IMAGES_URL . '/16x16.png',
    'donot_use_apple_icon_57' => 'no',
    'apple_icon_url_57' => SAM_FW_ADMIN_IMAGES_URL . '/apple-touch-icon-57x57.png',
    'donot_use_apple_icon_72' => 'no',
    'apple_icon_url_72' => SAM_FW_ADMIN_IMAGES_URL . '/apple-touch-icon-72x72.png',
    'donot_use_apple_icon_114' => 'no',
    'apple_icon_url_114' => SAM_FW_ADMIN_IMAGES_URL . '/apple-touch-icon-114x114.png',
    'donot_use_apple_icon_144' => 'no',
    'apple_icon_url_144' => SAM_FW_ADMIN_IMAGES_URL . '/apple-touch-icon-144x144.png',
    'donot_use_apple_icon' => 'yes',
    'body_font_family' => 'Droid Serif',
    'body_font_size' => 18,
    'post_title_font_family' => 'Kreon',
    'post_title_font_size' => 36,
    'meta_font_family' => 'Droid Serif',
    'meta_font_size' => 14,
    'social_facebook_url' => '',
    'social_twitter_url' => '',
    'social_youtube_url' => '',
    'social_linkedin_url' => '',
    'custom_css_value' => '/* Some example CSS */
            /* Any changes made will appear in live site */

            /*@import url(\"something.css\");
            body {
              margin: 0;
              padding: 3em 6em;
              font-family: tahoma, arial, sans-serif;
              color: #000;
            }
     */'
);

global $sampression_options_settings;
$sampression_options_settings = sampression_options_set_defaults( $sampression_option_defaults );

function sampression_options_set_defaults( $sampression_option_defaults ) {
    $sampression_options_settings = array_merge( $sampression_option_defaults, (array) get_option( 'sampression_theme_options', array() ) );
    //print_r($idea_options_settings);
    return $sampression_options_settings;
}

function sampression_fonts_style() {
    $fonts = array(
        'fonts' => array(
            'google-fonts' => array(
                'Kreon' => 'Kreon',
                'Droid Serif' => 'Droid Serif'
            ),
            'normal-fonts' => array(
                'Arial' => 'Arial, sans-serif',
                'Verdana' => 'Verdana, Geneva, sans-serif',
                'Trebuchet' => 'Trebuchet MS, Tahoma, sans-serif',
                'Georgia' => 'Georgia, serif',
                'Times New Roman' => 'Times New Roman, serif',
                'Tahoma' => 'Tahoma, Geneva, Verdana, sans-serif',
                'Impact' => 'Impact, Charcoal, sans-serif',
                'Courier' => 'Courier, Courier New, monospace',
                'Century Gothic' => 'Century Gothic, sans-serif'
            )
        ),
        'size' => array(
            'min_value' => 8,
            'max_value' => 72
        ),
        'style' => array(
            'Thin' => '300',
            'Thin/Italic' => '300 italic',
            'Normal' => 'normal',
            'Italic' => 'italic',
            'Bold' => 'bold',
            'Bold/Italic' => 'bold italic'
        ),
        'transformation' => array(
            'Capitalize' => 'capitalize',
            'Uppercase' => 'uppercase',
            'Lowercase' => 'lowercase',
            'None' => 'none'
        )
    );
    return $fonts;
}

//Sidebar Options to chose for
//function sampression_sidebar_options() {
//    $sidebar_options = array( 'right', 'none' );
//    return $sidebar_options;
//}