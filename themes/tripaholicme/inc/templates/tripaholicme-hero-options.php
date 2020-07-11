<h1>Tripaholicme Theme Options</h1>

<?php settings_errors() ?>

<form action="options.php" method="post">
  <?php settings_fields( 'tripaholicme-hero-title' ) ?>
  <?php do_settings_sections( 'tripaholicme-hero-options-slug' ) ?>
  <?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ) ?>
</form>