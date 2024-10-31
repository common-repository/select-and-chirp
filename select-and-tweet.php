<?php

defined('ABSPATH') or die('No script kiddies please!!');
/**
 * Plugin Name:       Select and Tweet
 * Plugin URI:        https://wpshuffle.com/select-and-tweet
 * Description:       A plugin which gives your site users ability to share your site content to twitter by simply selecting the text.
 * Version:           1.0.1
 * Requires at least: 5.5
 * Requires PHP:      7.0
 * Author:            WP Shuffle
 * Author URI:        https://wpshuffle.com/       
 * Text Domain:       select-and-chirp
 * Domain Path:       /languages
 */

if (!class_exists('select_and_tweet')) {

    class select_and_tweet
    {

        function __construct()
        {
            $this->define_constants();

            add_action('admin_menu', array($this, 'tdt_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'tdt_admin_assets'));
            add_action('wp_enqueue_scripts', array($this, 'tdt_frontend_assets'));
            add_action('admin_post_tdt_settings_save_action', array($this, 'save_settings_action'));
            add_action('wp_footer', array($this, 'adding_button'));
            add_shortcode('select_and_tweet', array($this, 'tweet_shortcode'));

            add_action('plugins_loaded', array($this, 'load_td'));
        }

        function load_td()
        {
            load_plugin_textdomain('select-and-tweet', false, dirname(plugin_basename(__FILE__)) . '/languages');
        }

        function define_constants()
        {
            defined('TWT_PATH') or define('TWT_PATH', plugin_dir_path(__FILE__));
            defined('TWT_CSS_DIR') or define('TWT_CSS_DIR', untrailingslashit(plugin_dir_url(__FILE__)) . '/assets/css'); // plugin's CSS directory URL
            defined('TWT_IMG_DIR') or define('TWT_IMG_DIR', plugin_dir_url(__FILE__) . 'images');
            defined('TWT_URL') or define('TWT_URL', plugin_dir_url(__FILE__));
            defined('TWT_VERSION') or define('TWT_VERSION', '1.0.1');
        }
        function tweet_shortcode($atts, $content)
        {
            ob_start();
            require TWT_PATH . 'includes/views/frontend/select-and-tweet-shortcode.php';
            $shortcode_html = ob_get_contents();
            ob_clean();
            return $shortcode_html;
        }



        function tdt_admin_assets()
        {

            if (
                isset($_GET['page']) && isset($_GET['page']) == 'select-and-tweet'
            ) {
                wp_enqueue_style('tdt-backend-style', TWT_URL . 'assets/css/tdt-backend.css', array(), TWT_VERSION);


                wp_enqueue_script('tdt-backend-script', TWT_URL . 'assets/js/tdt-backend.js', array('jquery'), TWT_VERSION);
            }
        }

        function tdt_frontend_assets()
        {

            global $post;
            global $wp_query;

            $tdt_settings = get_option('tdt_settings');


            if ($tdt_settings['basic']['status'] == 1) {
                if (!empty($wp_query->queried_object->post_type)) {
                    $post_type = $wp_query->queried_object->post_type;

                    $post_type_check = (!empty($tdt_settings['basic']['display_post_types'])) ? $tdt_settings['basic']['display_post_types'] : [];

                    if (in_array($post_type, $post_type_check)) {
                        $hashtags[] = $tdt_settings['basic']['hashtag'];
                        $js_obj = ['hashtags' => $tdt_settings['basic']['hashtag']];
                        $js_obj1 = ['via' => $tdt_settings['basic']['via']];
                        $js_obj2 = ['pagelink' => $tdt_settings['basic']['pagelink']];

                        wp_enqueue_style('tdt-frontend-style', TWT_URL . 'assets/css/tdt-frontend.css', array(), TWT_VERSION);
                        wp_enqueue_script('tdt-frontend-script', TWT_URL . 'assets/js/tdt-frontend.js', array('jquery'), TWT_VERSION);

                        wp_localize_script('tdt-frontend-script', 'twd_js_obj', $js_obj);
                        wp_localize_script('tdt-frontend-script', 'twd_js_obj1', $js_obj1);
                        wp_localize_script('tdt-frontend-script', 'twd_js_obj2', $js_obj2);
                    }
                }
            }

            if ($tdt_settings['basic']['hpage'] == 'homepage') {

                if (is_home() || is_front_page()) {


                    $hashtags[] = $tdt_settings['basic']['hashtag'];
                    $js_obj = ['hashtags' => $tdt_settings['basic']['hashtag']];
                    $js_obj1 = ['via' => $tdt_settings['basic']['via']];
                    $js_obj2 = ['pagelink' => $tdt_settings['basic']['pagelink']];

                    wp_enqueue_style('tdt-frontend-style', TWT_URL . 'assets/css/tdt-frontend.css', array(), TWT_VERSION);
                    wp_enqueue_script('tdt-frontend-script', TWT_URL . 'assets/js/tdt-frontend.js', array('jquery'), TWT_VERSION);

                    wp_localize_script('tdt-frontend-script', 'twd_js_obj', $js_obj);
                    wp_localize_script('tdt-frontend-script', 'twd_js_obj1', $js_obj1);
                    wp_localize_script('tdt-frontend-script', 'twd_js_obj2', $js_obj2);

                }
            }

            if ($tdt_settings['basic']['ar_page'] == 'archive_page') {

                if (is_archive()) {


                    $hashtags[] = $tdt_settings['basic']['hashtag'];
                    $js_obj = ['hashtags' => $tdt_settings['basic']['hashtag']];
                    $js_obj1 = ['via' => $tdt_settings['basic']['via']];
                    $js_obj2 = ['pagelink' => $tdt_settings['basic']['pagelink']];

                    wp_enqueue_style('tdt-frontend-style', TWT_URL . 'assets/css/tdt-frontend.css', array(), TWT_VERSION);
                    wp_enqueue_script('tdt-frontend-script', TWT_URL . 'assets/js/tdt-frontend.js', array('jquery'), TWT_VERSION);

                    wp_localize_script('tdt-frontend-script', 'twd_js_obj', $js_obj);
                    wp_localize_script('tdt-frontend-script', 'twd_js_obj1', $js_obj1);
                    wp_localize_script('tdt-frontend-script', 'twd_js_obj2', $js_obj2);

                }
            }
        }


        function tdt_admin_menu()
        {
            add_menu_page(esc_html__('Select and Tweet', 'select-and-chirp'), esc_html__('Select and Tweet', 'select-and-chirp'), 'manage_options', 'select-and-tweet', array($this, 'tdt_setting_page'), 'dashicons-twitter');

            add_submenu_page('select-and-tweet', esc_html__('Select and Tweet Settings', 'select-and-chirp'), esc_html__('Select and Tweet Settings', 'select-and-chirp'), 'manage_options', 'select-and-tweet', array($this, 'tdt_setting_page'));

            add_submenu_page('select-and-tweet', esc_html__('About', 'select-and-chirp'), esc_html__('About', 'select-and-chirp'), 'manage_options', 'tdt-about', array($this, 'tdt_about'));
            add_submenu_page('select-and-tweet', esc_html__('Help', 'select-and-chirp'), esc_html__('Help', 'select-and-chirp'), 'manage_options', 'tdt-help', array($this, 'tdt_help'));
        }

        function adding_button()
        {
            global $post;
            global $wp_query;
            $tdt_settings = get_option('tdt_settings');
            if ($tdt_settings['basic']['status'] == 1) {
                if (!empty($wp_query->queried_object->post_type)) {
                    $post_type = $wp_query->queried_object->post_type;

                    $post_type_check = (!empty($tdt_settings['basic']['display_post_types'])) ? $tdt_settings['basic']['display_post_types'] : [];

                    if (in_array($post_type, $post_type_check)) {
                        ?>
                        <div class="twt-button-wrap">
                            <?php
                            $logo = (!empty($tdt_settings['layout']['tweet_logo'])) ?
                                $tdt_settings['layout']['tweet_logo'] : 'twt-old-logo.png';

                            if ($tdt_settings['layout']['text_template'] == 'template-1') {
                                include(TWT_PATH . '/includes/views/frontend/template/text-icon/template-1.php');
                            } elseif ($tdt_settings['layout']['text_template'] == 'template-2') {
                                include(TWT_PATH . '/includes/views/frontend/template/text-icon/template-2.php');
                            } elseif ($tdt_settings['layout']['text_template'] == 'template-3') {
                                include(TWT_PATH . '/includes/views/frontend/template/text-icon/template-3.php');
                            } else {
                                include(TWT_PATH . '/includes/views/frontend/template/text-icon/template-4.php');
                            }
                    }

                    ?>
                    </div>
                    <?php
                }
            }
        }

        function tdt_setting_page()
        {
            include(TWT_PATH . 'includes/views/backend/settings.php');
        }

        function tdt_help()
        {
            include(TWT_PATH . 'includes/views/backend/help.php');
        }

        function tdt_about()
        {
            include(TWT_PATH . 'includes/views/backend/about.php');
        }

        function save_settings_action()
        {

            if (
                !empty($_POST['tdt_settings_nonce_field']) &&
                wp_verify_nonce($_POST['tdt_settings_nonce_field'], 'tdt_settings_nonce')
            ) {
                if (isset($_POST['tweet_this_settings']['basic']['display_post_types'])) {
                    $post_type_array = array_map('sanitize_text_field', $_POST['tweet_this_settings']['basic']['display_post_types']);
                } else {
                    $post_type_array = '';
                }

                $status = (isset($_POST['tweet_this_settings']['basic']['status'])) ? sanitize_text_field($_POST['tweet_this_settings']['basic']['status']) : '';
                $pagelink = (isset($_POST['tweet_this_settings']['basic']['pagelink'])) ? sanitize_text_field($_POST['tweet_this_settings']['basic']['pagelink']) : '';
                $hashtags = sanitize_text_field($_POST['tweet_this_settings']['basic']['hashtags']) ? sanitize_text_field($_POST['tweet_this_settings']['basic']['hashtags']) : '';
                $via = sanitize_text_field($_POST['tweet_this_settings']['basic']['via']) ? sanitize_text_field($_POST['tweet_this_settings']['basic']['via']) : '';
                $tweet_logo = (isset($_POST['tweet_this_settings']['layout']['tweet_logo'])) ? sanitize_text_field($_POST['tweet_this_settings']['layout']['tweet_logo']) : '';
                $text_template = (isset($_POST['tweet_this_settings']['layout']['text_template'])) ? sanitize_text_field($_POST['tweet_this_settings']['layout']['text_template']) : '';
                $block_template = (isset($_POST['tweet_this_settings']['layout']['block_template'])) ? sanitize_text_field($_POST['tweet_this_settings']['layout']['block_template']) : '';
                $front_text = (isset($_POST['tweet_this_settings']['layout']['front_text'])) ? sanitize_text_field($_POST['tweet_this_settings']['layout']['front_text']) : '';
                $custom_width = (isset($_POST['tweet_this_settings']['layout']['custom_width'])) ? sanitize_text_field($_POST['tweet_this_settings']['layout']['custom_width']) : '';
                $homepage = (isset($_POST['tweet_this_settings']['basic']['hpage'])) ? sanitize_text_field($_POST['tweet_this_settings']['basic']['hpage']) : '';
                $archieve_page = (isset($_POST['tweet_this_settings']['basic']['ar_page'])) ? sanitize_text_field($_POST['tweet_this_settings']['basic']['ar_page']) : '';
                $tdt_settings = array(
                    'basic' => array(
                        'status' => $status,
                        'display_post_types' => $post_type_array,
                        'hashtag' => $hashtags,
                        'via' => $via,
                        'hpage' => $homepage,
                        'ar_page' => $archieve_page,
                        'pagelink' => $pagelink
                    ),

                    'layout' => array(
                        'text_template' => $text_template,
                        'front_text' => $front_text,
                        'tweet_logo' => $tweet_logo,
                        'block_template' => $block_template,
                        'custom_width' => $custom_width
                    ),
                );

                update_option('tdt_settings', $tdt_settings);
                wp_redirect(admin_url('admin.php?page=select-and-tweet&message=1'));
                exit;
            }
        }
    }

    new select_and_tweet();
}
