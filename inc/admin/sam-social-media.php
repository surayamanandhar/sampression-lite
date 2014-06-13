<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'restricted access' );
    global $sampression_options_settings;
    $options = $sampression_options_settings;
?>
        <section class="row">
            <h3 class="sec-title"><?php _e( 'Social Media', 'sampression' ); ?></h3>
            <div class="box ">
                <div class="box-entry sam-lists sam-image-settings sam-social-option">
                    <ul class="social-media-list clearfix">
                        <li class="clearfix add-social-option">
                            <div class="box-title"><?php _e( 'Add Social Media', 'sampression' );?></div>
                            <div class="box-entry">
                                <ul class="custom-social-media-sizes">
                                    <li class="clearfix">
                                        <!-- Facebook -->
                                        <label class="sec-label medium-label"><?php _e( 'Facebook:', 'sampression' );?></label>
                                        <input name="sampression_theme_options[social_facebook_url]" class="medium-input" id="facebook_url" type="text" placeholder="<?php _e( 'Facebook Url', 'sampression' );?>" value="<?php echo esc_url( $options['social_facebook_url'] ); ?>" >      
                                    </li>
                                    <li class="clearfix">
                                        <!-- Twitter -->
                                        <label class="sec-label medium-label"><?php _e( 'Twitter:', 'sampression' );?></label>
                                        <input name="sampression_theme_options[social_twitter_url]" class="medium-input" id="twitter_url" type="text" placeholder="<?php _e( 'Twitter Url', 'sampression' );?>"  value="<?php echo esc_url( $options['social_twitter_url'] ); ?>" >
                                    </li>
                                    <li class="clearfix">
                                        <!-- LinkedIn -->
                                        <label class="sec-label medium-label"><?php _e( 'LinkedIn:', 'sampression' );?></label>
                                        <input name="sampression_theme_options[social_linkedin_url]" class="medium-input" id="linkedin_url" type="text" placeholder="<?php _e( 'LinkedIn Url', 'sampression' );?>" value="<?php echo esc_url( $options['social_linkedin_url'] ); ?>">
                                    </li>
                                    <li class="clearfix">
                                        <!-- Youtube -->
                                        <label class="sec-label medium-label"><?php _e( 'Youtube:', 'sampression' );?></label>
                                        <input name="sampression_theme_options[social_youtube_url]" class="medium-input" id="youtube_url" type="text" placeholder="<?php _e( 'Youtube Url', 'sampression' );?>" value="<?php echo esc_url( $options['social_youtube_url'] ); ?>" >
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php // endif; ?>
                    </ul>
                </div>
            </div> <!-- .box -->
        </section>
        <!-- .row-->
        <div id="response"></div>
        <p class="submit">
                    <input type="submit" name="sampression-theme-settings" id="submit" class="button1 alignright save-data" value="Save" />
                </p>