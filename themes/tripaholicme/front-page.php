<?php get_header() ?>

<?php get_template_part( 'template-parts/content', 'homepage-bxslider' ); ?>

<main id="main">

	<?php get_template_part( 'template-parts/content', 'categories-slider' ); ?>

	<?php get_template_part( 'template-parts/content', 'homepage-news-section' ); ?>

	<section id="about-us">
		<div class="container">
			<div id="about-us-box">
				<?php $aboutUsPage = get_page_by_title( 'About us' ); ?>
				<h3 class="site-title"><?php echo $aboutUsPage->post_title ?></h3>
				<p class="about-us-text"><?php echo $aboutUsPage->post_excerpt ?></p>
				<a href="<?php echo $aboutUsPage->guid ?>" class="site-btn">learn more</a>
			</div>
		</div>
	</section>	

	<section id="testimonials">
		<div class="container">
			<h2 class="site-title">what our customers are saying</h2>
			<div id="testimonials-slider">

				<div class="testimonials-slider-item">
					<img src="<?php echo get_template_directory_uri() ?>/site/images/testimonials-img1.jpg" alt="testimonial image" class="testimonial-img">
					<div class="testimonials-slider-item-data">
						<div class="testimonials-slider-message">Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</div>
						<div class="testimonials-slider-author">Lexi Williams</div>
					</div>
				</div>

				<div class="testimonials-slider-item">
					<img src="<?php echo get_template_directory_uri() ?>/site/images/testimonials-img2.jpg" alt="testimonial image" class="testimonial-img">
					<div class="testimonials-slider-item-data">
						<div class="testimonials-slider-message">Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</div>
						<div class="testimonials-slider-author">Jason Richmond</div>
					</div>
				</div>

				<div class="testimonials-slider-item">
					<img src="<?php echo get_template_directory_uri() ?>/site/images/testimonials-img3.jpg" alt="testimonial image" class="testimonial-img">
					<div class="testimonials-slider-item-data">
						<div class="testimonials-slider-message">Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</div>
						<div class="testimonials-slider-author">Dustin Freeze</div>
					</div>
				</div>

				<div class="testimonials-slider-item">
					<img src="<?php echo get_template_directory_uri() ?>/site/images/testimonials-img4.jpg" alt="testimonial image" class="testimonial-img">
					<div class="testimonials-slider-item-data">
						<div class="testimonials-slider-message">Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</div>
						<div class="testimonials-slider-author">Amber Metz</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>