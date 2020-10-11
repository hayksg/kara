<h1>Tripaholicme Theme Options</h1>

<?php settings_errors() ?>

<form action="options.php" method="post" id="tripaholicme-footer-form">
	<?php settings_fields( 'tripaholicme-footer-settings-group' ) ?>
  	<?php do_settings_sections( 'tripaholicme-footer-options-slug' ) ?>
  	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ) ?>
</form>