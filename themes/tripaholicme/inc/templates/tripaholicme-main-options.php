<h1>Tripaholicme Theme Options</h1>

<?php settings_errors() ?>

<form action="options.php" method="post" id="tripaholicme-main-form">
	<?php settings_fields( 'tripaholicme-main-settings-group' ) ?>
  	<?php do_settings_sections( 'tripaholicme-main-options-slug' ) ?>
  	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ) ?>
</form>