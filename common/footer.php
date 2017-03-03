</div>
</div>
	<div id="footer">


		    <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
        <p><?php echo $footerText; ?></p>
        <?php endif; ?>
    <?php fire_plugin_hook('public_footer'); ?>

</div>
