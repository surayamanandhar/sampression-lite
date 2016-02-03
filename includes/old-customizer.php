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
    //$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    //$wp_customize->get_setting( 'body_textcolor' )->transport = 'postMessage';
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
     * Site Identity - Section
     *********************************************************************/

    /*
     * Logo Setting
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
                    'priority'    => 1,
                    'description' => 'We recommend logo sizes within 220px x 120px.'
                )
            )
        );

    /*
     * Remove Logo Setting
     */
        $wp_customize->add_setting( 'sampression_remove_logo', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
                'sampression_remove_logo',
                array(
                    'type' => 'checkbox',
                    'label' => __('Remove Logo?', 'sampression'),
                    'section' => 'title_tagline',
                    'priority'    => 2,
                )
        );

    /*
     * Remove tagline Setting
     */
        $wp_customize->add_setting( 'sampression_remove_tagline', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
                'sampression_remove_tagline',
                array(
                    'type' => 'checkbox',
                    'label' => __('Remove Tagline?', 'sampression'),
                    'section' => 'title_tagline',
                    'priority'    => 3,
                )
        );

    /*
     * Remove search box Setting
     */
        $wp_customize->add_setting( 'sampression_remove_search', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
                'sampression_remove_search',
                array(
                    'type' => 'checkbox',
                    'label' => __('Remove Search Box?', 'sampression'),
                    'section' => 'title_tagline',
                    'priority'    => 20,
                )
        );

    /*
     * Copyright text Setting
     */
        $wp_customize->add_setting( 'sampression_copyright_text', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
                'sampression_copyright_text',
                array(
                    'label' => __('Copyright Text', 'sampression'),
                    'section' => 'title_tagline',
                    'priority'    => 21,
                )
        );

    /*
     * Powered by text Setting
     */
        $wp_customize->add_setting( 'sampression_poweredby_text', array('sanitize_callback' => 'sampression_sanitize_text'));
        $wp_customize->add_control(
                'sampression_poweredby_text',
                array(
                    'label' => __('Powered by Text', 'sampression'),
                    'section' => 'title_tagline',
                    'priority'    => 22,
                )
        );

    /*********************************************************************
     * Layout, Typography and Advance sections
     *********************************************************************/
    
    $wp_customize->add_section(
        'sampression_layout_section',
        array(
            'title' => __( 'Layout, Typography & Blog Options', 'sampression' ),
            'priority' => 35,
            'theme_supports' => '',
            'capability' => 'edit_theme_options',
        )
    );
    
    $wp_customize->add_setting(
        'sampression_layout_section',
        array(
            'sanitize_callback' => 'sampression_sanitize_pro_version'
        )
    );
    
    $wp_customize->add_control(
        new Sampression_Theme_Support( $wp_customize, 'sampression_layout_section',
        array(
            'type' => 'pro-version',
            'section' => 'sampression_layout_section',
       )
    ));

    /*********************************************************************
     * General Settings panel
     *********************************************************************/

    $wp_customize->add_panel( 'sampression_general_panel', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'General Settings', 'sampression' )
    ) );
    
    /**
     * General Section
     **************************/
    // $wp_customize->add_section( 'sampression_general_section' , array(
    //     'title' => __( 'General', 'sampression' ),
    //     'priority' => 1,
    //     'panel' => 'sampression_general_panel'
    // ));

    /**
     * Header Image Section
     **************************/
    $wp_customize->add_section( 'header_image', array(
        'title'          => __( 'Header Image', 'sampression' ),
        'theme_supports' => 'custom-header',
        'priority'       => 1,
        'panel' => 'sampression_general_panel'
    ) );

    /**
     * Social Section
     **************************/
    $wp_customize->add_section( 'sampression_social_section' , array(
        'title' => __( 'Social Media Links', 'sampression' ),
        'priority' => 2,
        'panel' => 'sampression_general_panel'
    ));

    /**
     * Facebook URL
     */
    $fb_icon = '';
    if(get_option('opt_get_facebook'))
        $fb_icon = get_option('opt_get_facebook');

        $wp_customize->add_setting( 'sampression_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => $fb_icon));
        $wp_customize->add_control(
            'sampression_socials_facebook',
            array(
                'label'    => __( 'Facebook link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_facebook',
                'priority'    => 1,
            )
        );

    /**
     * Twitter URL
     */
    $tw_icon = '';
    if(get_option('opt_get_twitter'))
        $tw_icon = get_option('opt_get_twitter');

        $wp_customize->add_setting( 'sampression_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => $tw_icon));
        $wp_customize->add_control(
            'sampression_socials_twitter',
            array(
                'label'    => __( 'Twitter link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_twitter',
                'priority'    => 2,
            )
        );

    /**
     * Youtube URL
     */
    $yt_icon = '';
    if(get_option('opt_get_youtube'))
        $yt_icon = get_option('opt_get_youtube');

        $wp_customize->add_setting( 'sampression_socials_youtube', array('sanitize_callback' => 'esc_url_raw','default' => $yt_icon));
        $wp_customize->add_control(
            'sampression_socials_youtube',
            array(
                'label'    => __( 'Youtube link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_youtube',
                'priority'    => 3,
            )
        );

    /**
     * Google+ URL
     */
        $gp_icon = '';
        if(get_option('opt_get_gplus'))
            $gp_icon = get_option('opt_get_gplus');

        $wp_customize->add_setting( 'sampression_socials_googleplus', array('sanitize_callback' => 'esc_url_raw','default' => $gp_icon));
        $wp_customize->add_control(
            'sampression_socials_googleplus',
            array(
                'label'    => __( 'Google+ link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_googleplus',
                'priority'    => 4,
            )
        );

    /**
     * Tumblr URL
     */
        $wp_customize->add_setting( 'sampression_socials_tumblr', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            'sampression_socials_tumblr',
            array(
                'label'    => __( 'Tumblr link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_tumblr',
                'priority'    => 5,
            )
        );

    /**
     * Pinterest URL
     */
        $wp_customize->add_setting( 'sampression_socials_pinterest', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            'sampression_socials_pinterest',
            array(
                'label'    => __( 'Pinterest link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_pinterest',
                'priority'    => 6,
            )
        );

    /**
     * Linkedin URL
     */
        $wp_customize->add_setting( 'sampression_socials_linkedin', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            'sampression_socials_linkedin',
            array(
                'label'    => __( 'Linkedin link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_linkedin',
                'priority'    => 7,
            )
        );

    /**
     * Github URL
     */
        $wp_customize->add_setting( 'sampression_socials_github', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            'sampression_socials_github',
            array(
                'label'    => __( 'Github link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_github',
                'priority'    => 8,
            )
        );

    /**
     * Instagram URL
     */
        $wp_customize->add_setting( 'sampression_socials_instagram', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            'sampression_socials_instagram',
            array(
                'label'    => __( 'Instagram link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_instagram',
                'priority'    => 9,
            )
        );

    /**
     * Flickr URL
     */
        $wp_customize->add_setting( 'sampression_socials_flickr', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            'sampression_socials_flickr',
            array(
                'label'    => __( 'Flickr link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_flickr',
                'priority'    => 10,
            )
        );

    /**
     * Vimeo URL
     */
        $wp_customize->add_setting( 'sampression_socials_vimeo', array('sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(
            'sampression_socials_vimeo',
            array(
                'label'    => __( 'Vimeo link', 'sampression' ),
                'section'  => 'sampression_social_section',
                'settings' => 'sampression_socials_vimeo',
                'priority'    => 11,
            )
        );

    /**
     * Colors Section
     **************************/
    $wp_customize->add_section( 'colors', array(
        'title'          => __( 'Colors', 'sampression' ),
        'theme_supports' => 'custom-background',
        'priority'       => 3,
        'panel' => 'sampression_general_panel'
    ) );
    
    /**
     * Header/Title text color setting
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
                    'label' => 'Header/Title Text Color',
                    'section' => 'colors',
                    'settings' => 'title_textcolor'
                )
            )
        );

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
                    'section' => 'colors',
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
                    'section' => 'colors',
                    'settings' => 'link_color'
                )
            )
        );

    /**
     * Background Image Section
     **************************/
    $wp_customize->add_section( 'background_image', array(
        'title'          => __( 'Background Image', 'sampression' ),
        'theme_supports' => 'custom-background',
        'priority'       => 2,
        'panel' => 'sampression_general_panel'
    ) );
    /*
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
            )
        );    
    
    /**
     * Custom code Section
     **************************/
    $wp_customize->add_section( 'sampression_custom_code_section' , array(
        'title' => __( 'Custom Code', 'sampression' ),
        'priority' => 3,
        'panel' => 'sampression_general_panel'
    ));

    /*
     * Header Code Setting
     */
        $wp_customize->add_setting( 'sampression_header_code', array('sanitize_callback' => 'sampression_sanitize_html','default' => ''));
        $wp_customize->add_control(
        'sampression_header_code',
        array(
            'label'      => __( 'To insert into Header', 'sampression' ),
            'section'    => 'sampression_custom_code_section',
            'settings'   => 'sampression_header_code',
            'type'       => 'textarea',
        )
    );
        $wp_customize->add_setting(
            'sampression_header_code_desc',
            array(
                'sanitize_callback' => 'sampression_sanitize_pro_version'
            )
        );
        $wp_customize->add_control(
            new Sampression_Theme_Support( $wp_customize, 'sampression_header_code_desc',
            array(
                'type' => 'description',
                'section' => 'sampression_custom_code_section',
                'description' => __('Write/Paste the codes which you want to insert in Header. For eg. custom styles, scripts, etc. This will be inserted before the  &#060;/head&#062; tag in the header of the document.', 'sampression')
           )
        ));

    /*
     * Footer Code Setting
     */
        $wp_customize->add_setting( 'sampression_footer_code', array('sanitize_callback' => 'sampression_sanitize_html','default' => ''));
        $wp_customize->add_control(
        'sampression_footer_code',
        array(
            'label'      => __( 'To insert into Footer', 'sampression' ),
            'section'    => 'sampression_custom_code_section',
            'settings'   => 'sampression_footer_code',
            'type'       => 'textarea',
        )
    );
        $wp_customize->add_setting(
            'sampression_footer_code_desc',
            array(
                'sanitize_callback' => 'sampression_sanitize_pro_version'
            )
        );
        $wp_customize->add_control(
            new Sampression_Theme_Support( $wp_customize, 'sampression_footer_code_desc',
            array(
                'type' => 'description',
                'section' => 'sampression_custom_code_section',
                'description' => __('Write/Paste the codes which you want to insert in Footer. For eg. custom styles, scripts, etc. This will be inserted before the  &#060;/body&#062; tag in the footer of the document.', 'sampression')
           )
        ));

    /*********************************************************************
     * Custom CSS panel
     *********************************************************************/

    $wp_customize->add_section(
        'sampression_customcss_section',
        array(
            'title' => __( 'Custom CSS', 'sampression' ),
            'priority' => 45,
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
            'section'    => 'sampression_customcss_section',
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