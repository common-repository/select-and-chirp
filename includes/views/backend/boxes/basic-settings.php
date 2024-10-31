<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="tdt-settings-section" data-settings-ref="basic">
    <?php wp_nonce_field('tdt_settings_nonce', 'tdt_settings_nonce_field'); ?>
    <input type="hidden" name="action" value="tdt_settings_save_action" />
    <?php
    $main_status = (!empty($tdt_settings['basic']['status'])) ? $tdt_settings['basic']['status'] : '';

    ?>
    <div class="tdt-field-wrap">
        <label><?php esc_html_e('Status', 'select-and-chirp'); ?></label>
        <div class="tdt-field tdt-checkbox-toggle">
            <input type="checkbox" id="tdt-basic-status" name="tweet_this_settings[basic][status]" value="1" <?php checked($main_status, '1'); ?> />
            <label></label>
        </div>
    </div>

    <?php

    $basic_status = (!empty($tdt_settings['basic']['status'])) ? $tdt_settings['basic']['status'] : '';
    ?>
    <div class="tdt-basic-wrap" <?php if ($basic_status  == '') { ?>style="display:none" <?php } ?>>

        <h3><?php esc_html_e('Select Post Type to Select Text', 'tweet-this'); ?></h3>
        <?php

        $args       = array(
            'public' => true,
        );
        $post_types = get_post_types($args, 'names');
        unset($post_types['attachment']);
        foreach ($post_types as $post_type) {
        ?>
            <div class="tdt-field-wrap">
                <label><?php esc_html_e("Display on $post_type", 'tweet-this'); ?></label>
                <div class="tdt-field">
                    <?php
                    $selected_display_post_types = (!empty($tdt_settings['basic']['display_post_types'])) ? $tdt_settings['basic']['display_post_types'] : [];

                    ?>
                    <div class="tdt-field tdt-checkbox-toggle">
                        <input type="checkbox" name="tweet_this_settings[basic][display_post_types][<?php echo esc_attr($post_type); ?>]" value="<?php echo esc_attr($post_type); ?>" <?php echo esc_attr((in_array($post_type, $selected_display_post_types))) ? 'checked="checked"' : ''; ?>>
                        <label></label>
                    </div>
                </div>
            </div>
        <?php } ?>
    
            <?php
            $home_page = (!empty($tdt_settings['basic']['hpage'])) ? $tdt_settings['basic']['hpage'] : '';
            ?>
            <h3><?php esc_html_e('Select Homepage/Front-Page', 'tweet-this'); ?></h3>

            <div class="tdt-field-wrap">
                <label><?php esc_html_e("Display on Home/Front-Page", 'tweet-this'); ?></label>
                <div class="tdt-field">

                    <div class="tdt-field tdt-checkbox-toggle">
                        <input type="checkbox" name="tweet_this_settings[basic][hpage]" value="homepage" <?php checked($home_page, 'homepage'); ?>>
                        <label></label>
                    </div>
                </div>
            </div>
  

    
            <?php
            $archieve_page = (!empty($tdt_settings['basic']['ar_page'])) ? $tdt_settings['basic']['ar_page'] : '';
            ?>
            <h3><?php esc_html_e('Display on Archive Page', 'tweet-this'); ?></h3>

            <div class="tdt-field-wrap">
                <label><?php esc_html_e("Display on Archive Page", 'tweet-this'); ?></label>
                <div class="tdt-field">

                    <div class="tdt-field tdt-checkbox-toggle">
                        <input type="checkbox" name="tweet_this_settings[basic][ar_page]" value="archive_page" <?php checked($archieve_page, 'archive_page'); ?>>
                        <label></label>
                    </div>
                </div>
            </div>
  


        <h3><?php esc_html_e('Tweet Options', 'select-and-chirp'); ?></h3>
        <div class="tdt-field-wrap">

            <?php
            $pagelink = (!empty($tdt_settings['basic']['pagelink'])) ? $tdt_settings['basic']['pagelink'] : '';

            ?>
            <div class="tdt-field-wrap">
                <label><?php esc_html_e('Show Page Link', 'select-and-chirp'); ?></label>
                <div class="tdt-field tdt-checkbox-toggle">
                    <input type="checkbox" id="tdt-basic-pagelink" name="tweet_this_settings[basic][pagelink]" value="1" <?php checked($pagelink, '1'); ?> />
                    <label></label>
                </div>
            </div>

            <div class="tdt-field-wrap">
                <label><?php esc_html_e("Hashtags", 'select-and-chirp'); ?></label>
                <div class="tdt-field">

                    <input type="text" name="tweet_this_settings[basic][hashtags]" value="<?php echo (!empty($tdt_settings['basic']['hashtag'])) ? esc_attr($tdt_settings['basic']['hashtag']) : ''; ?>" />
                    <p class="description"><?php esc_html_e('Please enter hashtags without # separated by comma', 'select-and-chirp'); ?></p>
                </div>

            </div>
            <div class="tdt-field-wrap">
                <label><?php esc_html_e("Via", 'select-and-chirp'); ?></label>
                <div class="tdt-field">

                    <input type="text" name="tweet_this_settings[basic][via]" value="<?php echo (!empty($tdt_settings['basic']['via'])) ? esc_attr($tdt_settings['basic']['via']) : ''; ?>" />

                </div>

            </div>
        </div>

    </div>

</div>
