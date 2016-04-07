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
            <p><a class="button button-primary" href="customize.php?return=%2Fwp-admin%2Fthemes.php%3Fpage%3Dabout-sampression">Go to Customizer</a> <a class="button button-primary" href="<?php bloginfo('wpurl') ?>" target="_blank">Visit <?php bloginfo('name') ?></a></p>
            <p>For further help, please visit our support page at: <a href="<?php echo esc_url( 'https://support.sampression.com/hc/en-us' ); ?>" target="_blank">https://support.sampression.com/</a></p>
        </div>
        <div>
            <h2>Sampression PRO</h2>
            <p>We also have a paid Pro version of the theme, which offers many more extra features and options for  customization. Sampression Pro offers additional following features:</p>
            <ul class="pro-feature-list">
                <li>Responsive Previews
                    <ul class="pro-feature-sub-list">
                        <li>See how your website looks on different screens be it mobile, tablet or desktop from customizer itself.</li>
                    </ul>
                </li>
                <li>Custom logo
                    <ul class="pro-feature-sub-list">
                        <li>You can upload your own logo from the customizer.</li>
                    </ul>
                </li>
                <li>Multiple layout options
                    <ul class="pro-feature-sub-list">
                        <li>The pro version of Sampression offers various different layout options including fixed width and full width, number of columns (one, two, three and four) to be displayed in home page, option to turn sidebar off/on, right and left etc</li>
                    </ul>
                </li>
                <li>Secondary navigation
                    <ul class="pro-feature-sub-list">
                        <li>Support for secondary navigation bar is now standard in Sampression Pro</li>
                    </ul>
                </li>
                <li>Responsive slider
                    <ul class="pro-feature-sub-list">
                        <li>Sampression Pro comes bundled with Revolution Slider - the most popular plugin option to create slideshows valued at US$ 19.00.</li>
                    </ul>
                </li>
                <li>Icons Mind icon set
                    <ul class="pro-feature-sub-list">
                        <li>Sampression Pro comes bundled with IconsMind iconset worth US$ 79.00.</li>
                    </ul>
                </li>
                <li>Typography options
                    <ul class="pro-feature-sub-list">
                        <li>Sampression Pro goes even further in its support for various typography options. Now you can make changes to all and any typography element of your website e.g. You can choose the font family, size, style, color etc.</li>
                    </ul>
                </li>
                <li>Google Fonts
                    <ul class="pro-feature-sub-list">
                        <li>Sampression Pro supports popular 50 Google fonts.</li>
                    </ul>
                </li>
                <li>Show hide your meta
                    <ul class="pro-feature-sub-list">
                        <li>You can choose to either show or hide the display of meta information from your posts.</li>
                    </ul>
                </li>
                <li>Set the number of post,/category on home page
                    <ul class="pro-feature-sub-list">
                        <li>The Pro version of the theme provides you with control over the number of posts/categories that you want to display in the home page.</li>
                    </ul>
                </li>
                <li>Write your own css in customizer
                    <ul class="pro-feature-sub-list">
                        <li>You can further customize the look of your Sampression Pro theme using your own CSS code.</li>
                    </ul>
                </li>
            </ul>
            <p style="clear: both;">
                <a target="_blank" class="button upgrade-pro" href="<?php echo esc_url( 'http://www.sampression.com/themes/sampression-pro/' ); ?>">Upgrade to PRO</a>
                <a target="_blank" class="button button-primary" href="<?php echo esc_url( 'http://www.demo.sampression.com/sampression-pro/' ); ?>">Live Theme Demo</a>
            </p>
        </div>
    </div>
    <style>
        ul.pro-feature-list {
            list-style: inherit;
            margin-bottom: 50px;
        }
        ul.pro-feature-list > li {
            display: inline-block;
            float: left;
            font-weight: bold;
            padding: 10px;
            width: 30%;
        }
        .pro-feature-sub-list {
            padding-top: 10px;
        }
        ul.pro-feature-sub-list li {
            font-weight: normal;
            line-height: 22px;
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