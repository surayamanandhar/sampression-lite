<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'restricted access' );
    global $sampression_options_settings;
    $options = $sampression_options_settings;
?>
        <textarea id="sam-custom-code" class="large-textarea" name="sampression_theme_options[custom_css_value]"><?php echo esc_attr( $options['custom_css_value'] ); ?></textarea>
        <div id="response"></div>
        <p class="submit">
                    <input type="submit" name="sampression-theme-settings" id="submit" class="button1 alignright save-data" value="Save" />
                </p>