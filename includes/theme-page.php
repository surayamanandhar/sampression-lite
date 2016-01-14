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
            <h2>Welcome to Sampression Lite.</h2>
            <p>Hope you will enjoy using Sampression Lite.</p>
            <p>We want to make sure you have the best experience using Sampression Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Sampression Lite, as much as we enjoy creating great products.</p>
        </div>
        <div>
            <h2>Getting started</h2>
            <h4>Customize everything in a single place.</h4>
            <p>Using the WordPress Customizer you can easily customize every aspect of the theme.</p>
            <p><a class="button button-primary" href="customize.php?return=%2Fwp-admin%2Fthemes.php%3Fpage%3Dabout-sampression">Go to Customizer</a></p>
        </div>
        <div>
            <h2>Sampression Pro</h2>
            <p>
                <a class="button button-primary" href="http://www.sampression.com/themes/sampression-pro/">Buy Now</a>
                <a class="button button-primary" href="http://www.demo.sampression.com/sampression-pro/">View Demo</a>
            </p>
            <p>We want to make sure you have the best experience using Sampression Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Sampression Lite, as much as we enjoy creating great products.</p>
        </div>
    </div>
    <?php
}