<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>`
<div class="tdt-settings-section" data-settings-ref="layout" style="display:none;">
    <div class="tdt-field-wrap">
        <?php
        $display_type = (!empty($tdt_settings['layout']['display_type'])) ? $tdt_settings['layout']['display_type'] : 'icon';
        ?>



        <div class="tdt-field-wrap front-text">
            <label>
                <?php esc_html_e('Front Text', 'select-and-chirp'); ?>
            </label>
            <div class="tdt-field">
                <input type="text" name="tweet_this_settings[layout][front_text]" value="<?php echo esc_attr((!empty($tdt_settings['layout']['front_text']))) ? esc_attr($tdt_settings['layout']['front_text']) : 'Select and chirp'; ?>" />

            </div>

        </div>

        <div class="tdt-field-wrap">
            <label>
                <?php esc_html_e('Logo', 'select-and-chirp'); ?>
            </label>
            <div class="tdt-field logo-select">
                <select name="tweet_this_settings[layout][tweet_logo]" class="tdt-form-field tdt-template-dropdown-logo" style="display:none;">

                    <option value="twt-old-logo.png" <?php selected($tdt_settings['layout']['tweet_logo'], 'twt-old-logo.png'); ?>>
                        <?php esc_html_e('Old Logo ', 'select-and-chirp')  ?>
                    </option>
                    <option value="twt-new-logo.png" <?php selected($tdt_settings['layout']['tweet_logo'], 'twt-new-logo.png'); ?>>
                        <?php esc_html_e('New Logo ', 'select-and-chirp')  ?>
                    </option>

                </select>
                <?php

                $tweet_logo_check = (!empty($tdt_settings['layout']['tweet_logo'])) ?
                    $tdt_settings['layout']['tweet_logo'] : 'twt-old-logo.png';
                ?>

                <div class="tdt-logo-template-previews-image">
                    <ul class="tdt-logo-icon">

                        <li class="<?php echo $tweet_logo_check == 'twt-old-logo.png' ? 'active' : ''; ?>"><img data-logo="twt-old-logo.png" src="<?php echo TWT_IMG_DIR . '/twt-old-logo.png'; ?>" class="image" /></li>
                        <li class="<?php echo $tweet_logo_check == 'twt-new-logo.png' ? 'active' : ''; ?>"><img data-logo="twt-new-logo.png" src="<?php echo TWT_IMG_DIR . '/twt-new-logo.png'; ?>" class="image" /></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="tdt-field-wrap tdt-text-ref">
            <label>
                <?php esc_html_e('Choose  Template', 'select-and-chirp'); ?>
            </label>
            <div class="tdt-field">
                <select name="tweet_this_settings[layout][text_template]" class="tdt-form-field tdt-template-dropdown-text" style="display:none;">
                    <?php

                    for ($i = 1; $i <=8; $i++) {
                    ?>

                        <option value="template-<?php echo esc_attr($i); ?>" <?php selected($tdt_settings['layout']['text_template'], 'template-' . $i); ?>>
                            <?php echo esc_html_e('Template-', 'select-and-chirp') . $i; ?>
                        </option>
                    <?php
                    }
                    ?>

                </select>
                <?php
                $text_template_check = (!empty($tdt_settings['layout']['text_template'])) ?
                    $tdt_settings['layout']['text_template'] : 'template-1';
                ?>
                <div class="tdt-template-previews-image tdt-old-templ" <?php if ($tweet_logo_check  == 'twt-new-logo.png') { ?>style="display:none" <?php } ?>>
                    <ul class="tdt-tabs-icon">
                        <?php for ($i = 1; $i <= 4; $i++) {
                        ?>
                            <li class="<?php echo $text_template_check == 'template-' . $i ? 'active' : ''; ?>"><img data-template="template-<?php echo esc_attr($i); ?>" src="<?php echo TWT_IMG_DIR . '/template-text/template-' . $i . '.png'; ?>" class="image" /></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="tdt-template-previews-image tdt-new-templ" <?php if ($tweet_logo_check  == 'twt-old-logo.png') { ?>style="display:none" <?php } ?>>
                    <ul class="tdt-tabs-icon">
                        <?php for ($i = 1; $i <= 4; $i++) {
                        ?>
                            <li class="<?php echo $text_template_check == 'template-' . $i ? 'active' : ''; ?>"><img data-template="template-<?php echo esc_attr($i); ?>" src="<?php echo TWT_IMG_DIR . '/new-template/template-' . $i . '.png'; ?>" class="image" /></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        $block_template = (!empty($tdt_settings['layout']['block_template'])) ? $tdt_settings['layout']['block_template'] : 'template-1';
        ?>
        <div class="tdt-field-wrap">
            <label>
                <?php esc_html_e('Choose Block Template', 'select-and-chirp'); ?>
            </label>
            <div class="tdt-field">
                <select name="tweet_this_settings[layout][block_template]" class="tdt-form-field tdt-template-dropdown-block">
                    <?php
                    $selected_block_template = (!empty($tdt_settings['layout']['block_template'])) ? $tdt_settings['layout']['block_template'] : 'template-0';
                    for ($i = 0; $i <= 2; $i++) {
                        if ($i == 0) {
                    ?>
                            <option value="template-<?php echo esc_attr($i); ?>" <?php selected($selected_block_template, 'template-' . $i); ?>>
                                <?php esc_html_e('Default Template', 'select-and-chirp') . $i; ?>
                            </option>
                        <?php } else { ?>

                            <option value="template-<?php echo esc_attr($i); ?>" <?php selected($selected_block_template, 'template-' . $i); ?>>
                                <?php echo esc_html_e('Template - ', 'select-and-chirp') . $i; ?>
                            </option>
                    <?php
                        }
                    }
                    ?>

                </select>
                <?php

                $block_template_check = (!empty($tdt_settings['layout']['block_template'])) ?
                    $tdt_settings['layout']['block_template'] : 'template-0';

                ?>

                <div class="tdt-template-previews-image">

                    <?php for ($i = 0; $i <= 2; $i++) {
                    ?>
                        <div class="tdt-each-template-preview-block" <?php if ('template-' . $i != $block_template_check) { ?>style="display:none" <?php } ?> data-block="template-<?php echo esc_attr($i); ?>"><img src="<?php echo TWT_IMG_DIR . '/block-templates/template-' . $i . '.png'; ?>" class="image" /></div>
                    <?php } ?>

                </div>

            </div>
        </div>
        <div class="tdt-field-wrap front-text">
            <label>
                <?php esc_html_e('Custom Width', 'select-and-chirp'); ?>
            </label>
            <div class="tdt-field">
                <input type="number" name="tweet_this_settings[layout][custom_width]" value="<?php echo esc_attr((!empty($tdt_settings['layout']['custom_width']))) ? esc_attr($tdt_settings['layout']['custom_width']) : ''; ?>" />
            </div>

        </div>


    </div>
</div>
