<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Sampression Lite Theme Options
 *
 * @package Sampression-Lite
 * @since Sampression Lite 2.0
 */

/*=======================================================================
 * Function to build theme page
 *=======================================================================*/
add_action('admin_menu', 'sampression_theme_page');

function sampression_theme_page() {

    add_theme_page(__('Sampression Theme', 'sampression'), __('About Theme', 'sampression'), 'edit_theme_options', 'about-sampression', 'about_sampression_theme_page');

}

function about_sampression_theme_page() {
    ?>
    <div class="wrap" style="width:75%">
        <div>
            <h1>Welcome to Sampression Lite.</h1>
            <p>We hope that you will enjoy using Sampression Lite.</p>
            <p>We want to make sure that you have the best experience using this theme. We have gathered here all the necessary information to make your process easier and faster. We hope you will enjoy using Sampression Lite, as much as we enjoy creating products.</p>
        </div>
        <div>
            <h2>Getting started</h2>
            <h4>Customize everything in a single place.</h4>
            <p>Using the WordPress Customizer, you can easily customize every aspect of the theme.</p>
            <p><a class="button button-primary" href="customize.php?return=%2Fwp-admin%2Fthemes.php%3Fpage%3Dabout-sampression">Go to Customizer</a> <a class="button button-primary" href="<?php bloginfo('wpurl') ?>" target="_blank">Visit <?php bloginfo('name') ?></a></p>
            <p>For further help, please visit our support page at: <a href="https://support.sampression.com/hc/en-us" target="_blank">https://support.sampression.com/hc/en-us</a></p>
        </div>
        <div>
            <h2>Sampression PRO</h2>
            <p>We also have a PRO version of Sampression Lite, featuring more customizable features like multiple homepage layouts, block page layout, typography options and many more.</p>
            <p>
                <a target="_blank" class="button button-primary" href="http://www.sampression.com/themes/sampression-pro/">Upgrade to PRO</a>
                <a target="_blank" class="button button-primary" href="http://www.demo.sampression.com/sampression-pro/">Live Theme Demo</a>
            </p>
        </div>
    </div>
    <?php
}