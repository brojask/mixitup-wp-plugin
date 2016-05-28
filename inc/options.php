<div class="wrap">
    <h2>Mixitup Options</h2>
    <br/>
    <h3>For customizing Default Mixit options. You just need to follow 4 simple steps</h3>
    <ol>
        <li>Navigate to Mixit Kunkalabs by clicking <a target="_blank" href="https://mixitup.kunkalabs.com/">here</a></li>
        <li>Click on configurations panel <img height="32" width="32" src="<?php echo MIXIT_PLUGIN_URL .'/assets/img/setting.png'?>" alt=""/> export your required animation settings.</li>
        <li>Copy exported configurations data.</li>
        <li>Paste the exported configurations to below text area and save it.</li>
        <li>Yipee! You have done.</li>
    </ol>
    <form method="post" action="options.php">
        <?php settings_fields('mixit-options-group'); ?>
        <?php do_settings_sections('mixit-options-group'); ?>
        <?php $content = get_option('mixit_json_options'); ?>
        <?php wp_editor($content, 'mixit_json_options'); ?>
        <?php submit_button(); ?>

    </form>
</div>