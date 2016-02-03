<?php
/**
 * Sampression Theme Customizer
 *
 * @package sampresion-lite
 * @since version 2.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sampression_customize_register( $wp_customize ) {

    class Sampression_Theme_Support extends WP_Customize_Control {

        protected function render_content() {
            switch( $this->type ) {
                case 'pro-version':
                    echo __('The <a href="http://www.demo.sampression.com/sampression-pro/" target="_blank">PRO version</a> offers various additional features including:<ul class="layouts-features"><li>Multiple layouts</li><li>Google fonts support</li><li>Icons Mind icon set</li><li>Unlimited color</li><li>Premium customer support</li></ul>', 'sampression');
                    echo "<style>ul.layouts-features{ list-style: initial; padding-top: 10px; }ul.layouts-features li{ margin-left: 30px; }</style>";
                    break;
                case 'description' :
                    echo '<p class="description">' . $this->description . '</p>';
                    break;
            }
        }
    }


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    /**
     * Default Sections
     * ------------------------------------
     * title_tagline - Site Title & Tagline
     * colors - Colors
     * header_image - Header Image
     * background_image - Background Image
     * nav - Navigation
     * static_front_page - Static Front Page
     */
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');

    /*********************************************************************
     * General Setting - Panel
     *********************************************************************/

    $wp_customize->add_panel( 'sampression_general_setting_panel', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'General Setting', 'textdomain' ),
        'description' => __( 'Description of what this panel does.', 'textdomain' ),
    ) );

    /**
     * Site Title, Tagline, Site Icon - Section
     */
    $wp_customize->add_section(
        'title_tagline',
        array(
            'title' => __( 'Site Identity', 'sampression' ),
            'priority' => 1,
            'panel' => 'sampression_general_setting_panel',
        )
    );

    /**
     * Logo - Setting
     */
        $wp_customize->add_setting(
            'sampression_logo', array('sanitize_callback' => 'esc_url_raw', 'default' => get_option('opt_sam_logo')));
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'sam_theme_logo',
                array(
                    'label'    => __( 'Logo', 'sampression' ),
                    'section'  => 'title_tagline',
                    'settings' => 'sampression_logo',
                    'priority'    => 60,
                    'description' => 'We recommend logo sizes within 220px x 120px.'
                )
            )
        );

    /**
     * Remove Logo - Setting
     */
        $wp_customize->add_setting( 'sampression_remove_logo', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
                'sampression_remove_logo',
                array(
                    'type' => 'checkbox',
                    'label' => __('Remove Logo?', 'sampression'),
                    'section' => 'title_tagline',
                    'priority'    => 61,
                )
        );

    /**
     * Remove Tagline - Setting
     */
        $wp_customize->add_setting( 'sampression_remove_tagline', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
                'sampression_remove_tagline',
                array(
                    'type' => 'checkbox',
                    'label' => __('Remove Tagline?', 'sampression'),
                    'section' => 'title_tagline',
                    'priority'    => 62,
                )
        );

    /**
     * Background - Section
     **************************/
    $wp_customize->add_section( 'background_image', array(
        'title'          => __( 'Background Image', 'sampression' ),
        'priority'       => 2,
        'panel' => 'sampression_general_setting_panel'
    ) );

    /**
     * Background Image Cover
     */
        $wp_customize->add_setting( 'sampression_background_cover', array('transport' => 'postMessage') );
        $wp_customize->add_control(
            'sampression_background_cover',
            array(
                'type' => 'checkbox',
                'label'    => __( 'Use Background as Cover', 'sampression' ),
                'section'  => 'background_image',
                'settings' => 'sampression_background_cover',
                'priority'       => 10
            )
        );

    /**
     * Google Fonts Choices
     */
    $google_fonts = array(
        'Roboto=sans-serif' => 'Roboto',
        'Roboto+Slab:400,700=serif' => 'Roboto Slab',
        'Droid+Sans=sans-serif' => 'Droid Sans',
        'Droid+Serif:400,700=serif' => 'Open Serif',
        'Open+Sans=sans-serif' => 'Open Sans',
    );
    /**
     * Typography - Section
     */
    $wp_customize->add_section(
        'sampression_typography_section',
        array(
            'title' => __( 'Typography', 'sampression' ),
            'priority' => 11,
            'panel' => 'sampression_general_setting_panel',
        )
    );

    /**
     * Header Text Font - Setting
     */
    $wp_customize->add_setting(
        'title_font',
        array(
            'sanitize_callback' => 'sampression_sanitize_fonts',
            'default' => 'Roboto+Slab:400,700=serif',
            'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control(
        'title_font',
        array(
            'type' => 'select',
            'priority' => '1', 
            'description' => __('Select your desired font for the Title.', 'sampression'),
            'section' => 'sampression_typography_section',
            'choices' => $google_fonts,
            'settings' => 'title_font',
            'label' => 'Header Text Font'
    ));

    /**
     * Header text color setting
     **************************/
        $wp_customize->add_setting( 'title_textcolor',
            array(
                'default' => '#FE6E41',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport' => 'postMessage'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'title_textcolor',
                array(
                    'label' => 'Header Text Color',
                    'priority' => '2', 
                    'section' => 'sampression_typography_section',
                    'settings' => 'title_textcolor'
                )
            )
        );

    /**
     * Body Text Font - Setting
     */
    $wp_customize->add_setting(
        'body_font',
        array(
            'sanitize_callback' => 'sampression_sanitize_fonts',
            'default' => 'Roboto=sans-serif',
            'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control(
        'body_font',
        array(
            'type' => 'select',
            'priority' => '3', 
            'description' => __('Select your desired font for the body text.', 'sampression'),
            'section' => 'sampression_typography_section',
            'choices' => $google_fonts,
            'settings' => 'body_font',
            'label' => 'Body Text Font'
    ));

    /**
     * Body text color setting
     **************************/
        $wp_customize->add_setting( 'body_textcolor',
            array(
                'default' => '#333333',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport' => 'postMessage'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'body_textcolor',
                array(
                    'label' => 'Body Text Color',
                    'priority' => '4', 
                    'section' => 'sampression_typography_section',
                    'settings' => 'body_textcolor'
                )
            )
        );

    /**
     * Link color setting
     **************************/
        $wp_customize->add_setting( 'link_color',
            array(
                'default' => '#8AB7AD',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport' => 'postMessage'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'link_color',
                array(
                    'label' => 'Link Color',
                    'priority' => '5', 
                    'section' => 'sampression_typography_section',
                    'settings' => 'link_color'
                )
            )
        );

    /**
     * Colors - Section
     **************************/
    $wp_customize->add_section( 'colors', array(
        'title'          => __( 'Background Color', 'sampression' ),
        'theme_supports' => 'custom-background',
        'panel'  => 'sampression_general_setting_panel',
        'priority'       => 3,
    ) );

    

    /*********************************************************************
     * Custom CSS - Panel
     *********************************************************************/

    $wp_customize->add_section(
        'sampression_customcss_panel',
        array(
            'title' => __( 'Custom CSS', 'sampression' ),
            'priority' => 20,
            'theme_supports' => '',
            'capability' => 'edit_theme_options',
        )
    );

    /**
     * Custom CSS textarea
     */
    $wp_customize->add_setting(
        'sampression_custom_css',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'transport' => 'postMessage',
            'sanitize_callback'    => 'wp_filter_nohtml_kses',
            'sanitize_js_callback' => 'wp_filter_nohtml_kses',
        )
    );
    $wp_customize->add_control(
        'sampression_custom_css',
        array(
            'label'      => __( 'Custom CSS', 'sampression' ),
            'section'    => 'sampression_customcss_panel',
            'settings'   => 'sampression_custom_css',
            'type'       => 'textarea',
        )
    );

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sampression_customize_preview_js() {
    wp_enqueue_script( 'sampression_customizer', get_template_directory_uri() . '/lib/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

function sampression_customize_controls_js() {

    wp_enqueue_script( 'sampression_customizer_script', get_template_directory_uri() . '/lib/js/sampression.customizer.js', array( 'jquery' ), '1.0', true  );

    wp_localize_script( 'sampression_customizer_script', 'objectL10n', array(
        
        'documentation' => __( 'Documentation', 'sampression' ),
        'pro' => __('Upgrade to PRO', 'sampression'),
        'knowledge_base' => __('Knowledge Base', 'sampression'),
        'community' => __('Community', 'sampression')

    ) );

}

function sampression_sanitize_html( $input ) {

    $allowed_html = array(
        'style' => array(
            'id' => array(),
            'type' => array()
        ),
        'script' => array(
            'src' => array(),
            'type' => array()
        ),
        'link' => array(
            'rel' => array(),
            'id' => array(),
            'href' => array(),
            'media' => array(),
            'type' => array()
        ),
    );
    return wp_kses($input, $allowed_html);

}

//Sanitizes Fonts 
function sampression_sanitize_fonts( $input ) {  
    $valid = array(
        'Roboto=sans-serif' => 'Roboto',
        'Roboto+Slab:400,700=serif' => 'Roboto Slab',
        'Droid+Sans=sans-serif' => 'Droid Sans',
        'Droid+Serif:400,700=serif' => 'Open Serif',
        'Open+Sans=sans-serif' => 'Open Sans',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function sampression_sanitize_pro_version( $input ) {
    return $input;
}

function sampression_sanitize_widgets( $input ) {
    return $input;
}

function sampression_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Generate Custom CSS on front-end
 */
if( ! function_exists( 'sampression_custom_css_add' ) ) {

    function sampression_custom_css_add(){
        echo '<style id="sampression-custom-css">' . esc_textarea(get_theme_mod( 'sampression_custom_css', '' )) . '</style>';
    }

}

add_action( 'customize_register', 'sampression_customize_register' );
add_action( 'customize_preview_init', 'sampression_customize_preview_js' );
add_action( 'customize_controls_enqueue_scripts', 'sampression_customize_controls_js' );
add_action( 'wp_head', 'sampression_custom_css_add', 1000 );