<?php

$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'basic_information';  ?>  

<div class="wrap">
    <h1><?php _e('Accessibility Statement'); ?></h1>

    <h2 class="nav-tab-wrapper">
        <a href="<?php echo admin_url('options-general.php?page=accessibility-statement&tab=basic_information'); ?>" class="nav-tab<?php echo $active_tab == 'basic_information' ? ' nav-tab-active' : ''; ?>"><?php _e('Basic Information'); ?></a>
        <a href="<?php echo admin_url('options-general.php?page=accessibility-statement&tab=your_efforts'); ?>" class="nav-tab<?php echo $active_tab == 'your_efforts' ? ' nav-tab-active' : ''; ?>"><?php _e('Your Efforts'); ?></a>
    </h2>

    <form action="options.php" method="POST" class="main-settings">
        <?php
        if ($active_tab == 'basic_information') {
            settings_fields('basic_information');
            do_settings_sections('basic_information');
        } elseif ($active_tab == 'your_efforts') {
            settings_fields('your_efforts');
            do_settings_sections('your_efforts');
        }

        submit_button(); ?>
    </form>

    <form action="<?php echo admin_url('admin-post.php'); ?>" method="POST">
        <input type="hidden" name="action" value="generate_statement">
        <?php submit_button('Generate Statement', 'secondary'); ?>
    </form>
</div>