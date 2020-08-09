<?php get_header() ?>

<?php get_template_part( 'template-parts/content', 'homepage-bxslider' ); ?>

<main id="main">

	<?php get_template_part( 'template-parts/content', 'categories-slider' ); ?>

	<?php get_template_part( 'template-parts/content', 'homepage-news-section' ); ?>
	
	<section id="about-us" style="background: url('<?php echo esc_attr(get_option( 'about_us_bg_picture' )) ?>') center/cover no-repeat">
		<div class="container">
			<div id="about-us-box">
				<?php $aboutUsPage = get_page_by_title( 'About us' ); ?>
				<h3 class="site-title"><?php echo $aboutUsPage->post_title ?></h3>
				<p class="about-us-text"><?php echo $aboutUsPage->post_excerpt ?></p>
				<a href="<?php echo $aboutUsPage->guid ?>" class="site-btn">learn more</a>
			</div>
		</div>
	</section>	

	<?php get_template_part( 'template-parts/content', 'testimonials-slider' ); ?>
</main>

<?php get_footer(); ?>