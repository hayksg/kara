<h1>Tripaholicme Theme Options</h1>

<?php settings_errors() ?>

<form action="options.php" method="post">
  <?php settings_fields( 'tripaholicme-settings-group' ) ?>
  <?php do_settings_sections( 'tripaholicme-slug' ) ?>
  <?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ) ?>
</form>