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
            <h1>Welcome to Sampression Lite</h1>
            <p>We hope you will enjoy using Sampression Lite, as much as we enjoyed creating it.</p>
        </div>
        <div>
            <h2>Getting started</h2>
            <h4>Customize everything from a single place.</h4>
            <p>Using the WordPress Customizer you can easily customize every aspect of the theme.</p>
            <p><a class="button button-primary" href="<?php echo esc_url('customize.php?return=%2Fwp-admin%2Fthemes.php%3Fpage%3Dabout-sampression') ?>">Go to Customizer</a> <a class="button button-primary" href="<?php echo esc_url( site_url() ) ?>" target="_blank">Visit <?php bloginfo('name') ?></a></p>
            <p>For further help, please visit our support page at: <a href="<?php echo esc_url( 'https://support.sampression.com/hc/en-us' ); ?>" target="_blank">https://support.sampression.com/</a></p>
        </div>
        <div>
            <h2>Sampression PRO</h2>
            <p>We also have a paid Pro version of the theme, which offers many more extra features and options for  customization. Sampression Pro offers additional following features:</p>
            <ul class="pro-feature-list">
                <li><h3>Custom logo</h3>
                    You can upload your own logo from the customizer.
                </li>
                <li><h3>Google Fonts</h3>
                    Supports fonts that have been provided by Google to enhance every sites design.
                </li>
                <li><h3>Icons Mind icon set</h3>
                    Sampression Pro comes bundled with IconsMind iconset worth US$ 79.00.
                </li>
                <li class="clear left"><h3>Typography options</h3>
                    Sampression Pro goes even further in its support for various typography options. Now you can make changes to all and any typography element of your website e.g. You can choose the font family, size, style, color etc.
                </li>
                <li><h3>Multiple layout options</h3>
                    The pro version of Sampression offers various different layout options including number of columns (one, two, three and four) to be displayed in home page, option to turn sidebar off/on etc
                </li>
                <li><h3>Set the number of post,/category on home page</h3>
                    The Pro version of the theme provides you with control over the number of posts/categories that you want to display in the home page.
                </li>
                <li class="clear left"><h3>Show hide your meta</h3>
                    You can choose to either show or hide the display of meta information from your posts.
                </li>
                <li><h3>Write your own css in customizer</h3>
                    You can further customize the look of your Sampression Pro theme using your own CSS code.
                </li>
                <li><h3>Custom code</h3>
                    Add custom codes to Header and Footer easily.
                </li>
            </ul>
            <p style="clear: both; padding-top: 20px;">
                <a target="_blank" class="button upgrade-pro" href="<?php echo esc_url( 'http://www.sampression.com/themes/sampression-pro/' ); ?>">Upgrade to PRO</a>
                <a target="_blank" class="button button-primary" href="<?php echo esc_url( 'http://www.demo.sampression.com/sampression-pro/' ); ?>">Live Theme Demo</a>
            </p>
        </div>
    </div>
    <style>
        ul.pro-feature-list {
            list-style: inherit;
        }
        ul.pro-feature-list > li {
            display: inline-block;
            float: left;
            padding: 10px;
            width: 30%;
        }
        ul.pro-feature-list .clear.left {
            clear: left;
        }
        .button.upgrade-pro {
            background-color: #fe6e41;
            box-shadow: 0 1px 0 #FF3B00;
            color: #fff;
            border-color: #FF3B00;
        }
        .button.upgrade-pro:hover {
            background-color: #FB8F6E;
            color: #fff;
            border-color: #FF3B00;
        }
    </style>
    <?php
}