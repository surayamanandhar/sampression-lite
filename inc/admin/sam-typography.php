<?php
if ( !defined( 'ABSPATH' ) )
    exit( 'restricted access' );
    $default_fonts = sampression_fonts_style();
    global $sampression_options_settings;
    $options = $sampression_options_settings;
?>
        <section class="row">
            <div class="box titled-box">
                <div class="box-title">
                    <h4><?php _e( 'Typography', 'sampression' ) ?></h4>
                    <div class="select-wrapper">
                        <select class="sam-select" id="typo-selctor" autocomplete="off">
                            <?php
                            $t_options = array( 'general' => 'General', 'post-pages' => 'Post/Pages' );
                            $counter = 0;
                            foreach ( $t_options as $tkey => $tval ) {
                                $counter++;
                                $sel = '';
                                if( $counter === 1 ) { $sel = ' selected="selected"'; }
                                echo '<option'.$sel.' value="'.$tkey.'">'.$tval.'</option>';
                            }                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="box-entry typo-general" id="typography-general">
                    <div class="section row">
                        <div class="sec-label"><?php _e( 'Body Text', 'sampression' ) ?></div>
                        <div class="entry">
                            <p id="paragraphtext" class="font-demo" style="font: <?php echo absint( $options['body_font_size'] ); ?>px <?php echo esc_attr( $options['body_font_family'] ); ?>;"><?php _e( 'The quick brown fox jumps over the lazy dog.', 'sampression' ) ?></p>
                            <div class="select-wrapper font-face large-select alignleft" >
                                <?php sampression_font_select( 'sampression_theme_options[body_font_family]', 'sam-select change-fontface', esc_attr( $options['body_font_family'] ) ) ?>
                            </div>
                            <div class="select-wrapper font-size alignleft">
                                <?php sampression_font_size_select( 'sampression_theme_options[body_font_size]', 'sam-select change-fontsize', absint( $options['body_font_size'] ) ) ?>
                            </div>
                        </div>
                    </div>
                    <!-- .section-->
                </div>
                <div id="typography-post-pages" class="box-entry hide typo-post-pages">
                    <section class="row">
                        <div class="box titled-box ">
                            <div class="box-title">
                                <h4><?php _e( 'Post/Page Title', 'sampression' ) ?></h4>
                            </div>
                            <div class="box-entry">
                                <div class="section row">
                                    <div class="sec-label"><?php _e( 'Title', 'sampression' ) ?></div>
                                    <div class="entry">
                                        <h1 id="sam-post-title" class="font-demo" style="font: <?php echo absint( $options['post_title_font_size'] ); ?>px <?php echo esc_attr( $options['post_title_font_family'] ); ?>;"><?php _e( 'The quick brown fox jumps over the lazy dog.', 'sampression' ) ?></h1>
                                        <div class="select-wrapper font-face large-select alignleft" >
                                            <?php sampression_font_select( 'sampression_theme_options[post_title_font_family]', 'sam-select change-fontface', esc_attr( $options['post_title_font_family'] ) ) ?>
                                        </div>
                                        <div class="select-wrapper font-size small-select alignleft">
                                            <?php sampression_font_size_select( 'sampression_theme_options[post_title_font_size]', 'sam-select change-fontsize', absint( $options['post_title_font_size'] ) ) ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- .section-->
                            </div>
                            </div>
                    </section>
                    <section class="row">
                        <div class="box titled-box ">
                            <div class="box-title">
                                <h4><?php _e( 'Meta Text', 'sampression' ) ?></h4>
                            </div>
                            <div class="box-entry">
                                <div class="section row">
                                    <div class="sec-label"><?php _e( 'Text', 'sampression' ) ?></div>
                                    <div class="entry">
                                        <div id="sam-meta-text" class="font-demo" style="font: <?php echo absint( $options['meta_font_size'] ); ?>px <?php echo esc_attr( $options['meta_font_family'] ); ?>; "><?php _e( 'The quick brown fox jumps over the lazy dog.', 'sampression' ) ?></div>
                                        <div class="select-wrapper font-face large-select alignleft" >
                                            <?php sampression_font_select( 'sampression_theme_options[meta_font_family]', 'sam-select change-fontface', esc_attr( $options['meta_font_family'] ) ) ?>
                                        </div>
                                        <div class="select-wrapper font-size small-select alignleft">
                                            <?php sampression_font_size_select( 'sampression_theme_options[meta_font_size]', 'sam-select change-fontsize', absint( $options['meta_font_size'] ) ) ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- .section-->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section><a name="response"></a>
        <div id="response"></div>
        <p class="submit">
                    <input type="submit" name="sampression-theme-settings" id="submit" class="button1 alignright save-data" value="Save" />
                </p>