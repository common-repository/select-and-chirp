<?php
global $post;
global $wp_query;
$tdt_settings = get_option('tdt_settings');
if (!empty($wp_query->queried_object->post_type)) {
    $post_type = $wp_query->queried_object->post_type;

    $post_type_check = (!empty($tdt_settings['basic']['display_post_types'])) ? $tdt_settings['basic']['display_post_types'] : [];

    if (in_array($post_type, $post_type_check)) {
        $block_template = (!empty($tdt_settings['layout']['block_template'])) ?
            $tdt_settings['layout']['block_template'] : 'template-0';
        if (isset($atts['template'])) {
            $block_template = $atts['template'];
        }
?>
        <div class="twt-shortcode-wrap twt-relative <?php echo esc_attr($block_template); ?>">
            <span class="twt-srtcode">
                <?php
                echo wp_kses_post($content);
                ?>
            </span>
            <?php
            global $post;
            $twt_post_settings = (!empty(get_post_meta($post->ID, 'twt_post_status', true))) ? get_post_meta($post->ID, 'twt_post_status', true) : '';

            if ($twt_post_settings == '') {
                $tdt_settings = get_option('tdt_settings');
                if ($tdt_settings['basic']['status'] == 1) {
                    $tweet_text = (!empty($tdt_settings['basic']['hashtag'])) ? $tdt_settings['basic']['hashtag'] : '';
                    $tweet_via = (!empty($tdt_settings['basic']['via'])) ? $tdt_settings['basic']['via'] : '';
                    $tweet_site_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $tweet_url = "https://twitter.com/intent/tweet?text=$content&url=$tweet_site_link&hashtags=$tweet_text&via=$tweet_via";
            ?>
                    <div class="twt-line"></div>
                    <div class="twt-shortcode-button-wrap">
                        <?php


                        if ($tdt_settings['layout']['text_template'] == 'template-1') {
                        ?>
                            <a href="<?php echo esc_url($tweet_url); ?>" target="_blank">
                                <?php
                                include(TWT_PATH . '/includes/views/frontend/shortcode-templates/shortcode-text/text-template-1.php');
                                ?>
                            </a>
                        <?php
                        } elseif ($tdt_settings['layout']['text_template'] == 'template-2') {
                        ?>
                            <a href="<?php echo esc_url($tweet_url); ?>" target="_blank">
                                <?php
                                include(TWT_PATH . '/includes/views/frontend/shortcode-templates/shortcode-text/text-template-2.php');
                                ?>
                            </a>
                        <?php
                        } elseif ($tdt_settings['layout']['text_template'] == 'template-3') {
                        ?>
                            <a href="<?php echo esc_url($tweet_url); ?>" target="_blank">
                                <?php
                                include(TWT_PATH . '/includes/views/frontend/shortcode-templates/shortcode-text/text-template-3.php');
                                ?>
                            </a>
                        <?php
                        } elseif ($tdt_settings['layout']['text_template'] == 'template-4') {
                        ?>
                            <a href="<?php echo esc_url($tweet_url); ?>" target="_blank">
                                <?php
                                include(TWT_PATH . '/includes/views/frontend/shortcode-templates/shortcode-text/text-template-4.php');
                                ?>
                            </a>
                        <?php
                        }


                        ?>
                    </div>
            <?php }
            }

            ?>
        </div>
<?php }

}

?>
