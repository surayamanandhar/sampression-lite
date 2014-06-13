<?php //
if (!defined('ABSPATH'))
    exit('restricted access');

add_action('wp_head', 'sampression_write_custom_css');
function sampression_write_custom_css() {
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    WP_Filesystem();
    global $wp_filesystem;    
    
    $file = SAM_FW_CSS_DIR . '/custom-css.css';
    $css = sampression_generate_custom_css();
    if($css === '') {
        return;
    }
    if (!is_writable($file)) {
        $str = '<p class="message info">' . $file . ' is not writeable.<br />Copy the generated css from the text area below and paste it in the file above.</p>';
        $str .= '<textarea id="custom-css-select" style="width: 100%; height: 150px;">' . $css . '</textarea><br /><br />';
        $str .= '<script>window.document.getElementById("custom-css-select").select();</script>';
        echo $str;
        return;
    }
    if ( ! $wp_filesystem->put_contents( $file, ' ', FS_CHMOD_FILE) ) {
        echo __('CSS could not be written at this time. Please try again later.', 'sampression');
    }
    
    if (file_exists($file)) {
        if ( ! $wp_filesystem->put_contents( $file, $css, FS_CHMOD_FILE) ) {
            echo __('CSS could not be written at this time. Please try again later.', 'sampression');
        }
    }
}

function sampression_generate_custom_css(){
    $css = '';
    global $sampression_options_settings;
    $options = $sampression_options_settings;
    $css .= '.site-title .home-link { font: ' . esc_attr( $options['web_title_style'] ) . ' ' . absint( $options['web_title_size'] ) . 'px/1.3 ' . esc_attr( $options['web_title_font'] ) . '; color: ' . esc_attr( $options['web_title_color'] ) . '; }' . PHP_EOL;
    $css .= '.site-description { font: ' . esc_attr( $options['web_desc_style'] ) . ' ' . absint( $options['web_desc_size'] ) . 'px/1.3 ' . esc_attr( $options['web_desc_font'] ) . '; color: ' . esc_attr( $options['web_desc_color'] ) . '; }' . PHP_EOL;
    $css .= 'body { font: ' . absint( $options['body_font_size'] ) . 'px/1.6 ' . esc_attr( $options['body_font_family'] ) . '; }' . PHP_EOL;
    $css .= '.entry-title { font: ' . absint( $options['post_title_font_size'] ) . 'px/1.3 ' . esc_attr( $options['post_title_font_family'] ) . '; }' . PHP_EOL;
    $css .= '.entry-meta { font: ' . absint( $options['meta_font_size'] ) . 'px/1.6 ' . esc_attr( $options['meta_font_family'] ) . '; }' . PHP_EOL;
    $css .=  esc_attr( $options['custom_css_value'] ) . PHP_EOL;
    return $css;
}