<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <title><?php bloginfo( 'name' ); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta charset="<?php bloginfo( 'charset' )?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>

  </head>
  
  <body <?php body_class(); ?>>

  <header>
	<div id="toggles" class="hidden-lg hidden-md">
		<div id="search-toggle" class="fa fa-search"></div>
		<div id="nav-toggle" class="fa fa-bars"></div>
	</div>

	<div id="header-top">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="header-top-left-block">
						<a href="mailto:name@email.com" class="header-email">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span><?php echo esc_attr(get_option( 'business_email' )) ?></span> 
						</a>
						<a href="tel:9015441100" class="header-phone">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<span><?php echo esc_attr(get_option( 'business_phone' )) ?></span> 
						</a>
					</div>
				</div>
				<div class="col-md-7">
					<div class="header-top-right-block">
						<span class="stay-connected">Follow Us:</span>
						<div id="social-media-links">
							<a href="./" class="social-media-link" target="_blank">
								<span class="sr-only">Twitter link</span>
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
							<a href="./" class="social-media-link" target="_blank">
								<span class="sr-only">Facebook link</span>
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</div>

						<!-- Google translate start -->
						<div id="google_translate_element">
							<span id="google-t-title"></span> 
						</div>

						<script>
							var prevent_duplicate_counter = 0;
							function googleTranslateElementInit() {
								if (prevent_duplicate_counter == 0) {
									new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
								}

								prevent_duplicate_counter++;
							}
						</script>

						<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
						<!-- Google Translate end -->

						<div id="search">
							<form class="search-form" method="GET" action="search.php" role="search" aria-label="sitewide">
								<label class="sr-only" for="search-input">Search</label>
								<input name="q" class="form-control search-input" placeholder="Search..." type="search" id="search-input">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="header-bottom">
		<div class="container">
			<div class="header-bottom-wrap">
				<script type="text/javascript">
					var templateUrl = '<?= get_bloginfo("template_url"); ?>';
				</script>
				<a href="<?php echo site_url() ?>" id="logo"></a>
				
				<ul id="nav">
					<li><a href="./">Home</a></li>
					<li><a href="./">About us</a></li>
					<li><a href="./">Link 3</a></li>
					<li><a href="./">Link 4</a></li>
					<li><a href="./">Link 5</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>