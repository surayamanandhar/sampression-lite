<?php
if ( !defined( 'ABSPATH' ) )
    exit( 'restricted access' );

    $sidebar_options = sampression_sidebar_options();
    global $sampression_options_settings;
    $options = $sampression_options_settings;
?>
        <section class="row">
            <h3 class="sec-title"><?php _e( 'Customize', 'sampression' ); ?></h3>
            <div class="box titled-box">
                <div  class="box-title">
                    <h4><?php _e( 'Sidebar', 'sampression' ) ?></h4>
                </div>
                <div class="box-entry">
                    <ul id="sidebar-selector" class="style-selector-list clearfix">
                        <?php
                        for ( $i = 0; $i < count( $sidebar_options ); $i++ ) {
                            ?>
                            <li class="<?php
                            if ( $i == 0 ) {
                                echo 'first ';
                            } if ( $options['sidebar_active'] == $sidebar_options[$i] ) {
                                echo 'active ';
                            }
                            ?>style-selector">
                                <a href="javascript:void(0);" data-sidebar="<?php echo $sidebar_options[$i]; ?>" class="sam-style">
                                    <img src="<?php echo SAM_FW_ADMIN_IMAGES_URL; ?>/<?php echo $sidebar_options[$i]; ?>-layout.jpg" alt=""/>
    <?php echo ucwords( $sidebar_options[$i] ); ?>
                                </a>
                            </li>
    <?php
}
?>
                    </ul>
                    <input type="hidden" name="sampression_theme_options[sidebar_active]" id="sidebar" value="<?php echo $options['sidebar_active']; ?>" />
                </div>
            </div>
        </section>
         <div id="response"></div>
        
        <p class="submit">
                    <input type="submit" name="sampression-theme-settings" id="submit" class="button1 alignright save-data" value="Save" />
                </p>