<?php defined('ABSPATH') or die('No script kiddies please!!');
$tdt_settings = get_option('tdt_settings');
?>
<div class="wrap tdt-wrap">

    <div class="wrap tdt-wrap">
        <div class="tdt-header">
            <h1 class="tdt-floatLeft">
                <img src="<?php echo TWT_IMG_DIR . '/tweet-logo1.png'; ?>" class="tdt-plugin-logo">

            </h1>
            <div class="tdt-sub-header"><?php esc_html_e('Select and Tweet Settings', 'select-and-chirp'); ?>
            </div>

        </div>
    </div>
    <!-- End of header section -->
    <?php
    if (!empty($_GET['message']) && $_GET['message'] == 1) {
    ?>
        <div class="notice notice-info is-dismissible inline">
            <p>
                <?php esc_html_e('Settings saved successfully.', 'select-and-chirp'); ?>
            </p>
        </div>
    <?php
    }
    ?>
    <h2 class="nav-tab-wrapper wp-clearfix">
        <?php
        $tdt_tabs = array(
            'basic' => array('label' => esc_html__('Basic Settings', 'select-and-chirp'), 'icon' => esc_html__('dashicons dashicons-admin-generic')),
            'layout' => array('label' => esc_html__('Layout Settings', 'select-and-chirp'), 'icon' => esc_html__('dashicons dashicons-layout', 'select-and-chirp')),
            
        );


        $tdt_tab_counter = 0;
        foreach ($tdt_tabs as $tdt_tab => $tdt_tab_detail) {
            $tdt_tab_counter++;
        ?>
            <a href="javascript:void(0);" class="nav-tab <?php echo ($tdt_tab_counter == 1) ? 'nav-tab-active' : ''; ?> tdt-tab-trigger" data-settings-ref="<?php echo esc_attr($tdt_tab); ?>"><span class="<?php echo esc_attr($tdt_tab_detail['icon']); ?>"></span><?php echo esc_attr($tdt_tab_detail['label']); ?></a>
        <?php
        }
        ?>

    </h2>

    <div class="tdt-settings-wrap">

        <form method="post" class="tdt-form" action="<?php echo admin_url('admin-post.php'); ?>">
            <?php
            include(TWT_PATH . 'includes/views/backend/boxes/basic-settings.php');
            include(TWT_PATH . 'includes/views/backend/boxes/layout-settings.php');
            

            ?>
            <div class="tdt-field-wrap">

                <div class="tdt-field-wrap  tdt-settings-action">

                    <label></label>
                    <div class="tdt-field">
                        <input type="submit" class="button-primary" value="<?php esc_html_e('Save Settings', 'select-and-chirp'); ?>" />
                    </div>
                </div>
        </form>

    </div>
</div>
