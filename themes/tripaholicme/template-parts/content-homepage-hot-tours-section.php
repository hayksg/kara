<section id="hot-tours">
	<div class="hot-tours-top">
		<div class="container">
			<h2 class="site-title"><?php echo esc_attr(get_option( 'hot_tours_title' )) ?></h2>
		</div>
	</div>

	<div class="hot-tours-bottom">
		<div class="container">

			<?php
				$tours = new WP_Query( array(
					'posts_per_page' => -1,
					'post_type'      => 'tour',
				) ); 
			?>

			<div id="hot-tours-slider">

			<?php while($tours->have_posts()) : $tours->the_post() ?>
				
				<?php if( get_field('show_in_hot_tours') == 'Yes' ) : ?>
					
					<a href="<?php the_permalink() ?>" class="hot-tours">
						<div class="hot-tours-banner-wrap">
							<div class="hot-tours-banner" style="background:url('<?php the_post_thumbnail_url() ?>') center/cover no-repeat;"></div>
						</div>
						<div class="hot-tours-info">
							<h3 class="hot-tours-title"><?php the_title() ?></h3>
							<p class="hot-tours-text"><?php echo wp_trim_words(get_the_excerpt(), 30) ?></p>
							<span class="read-more">read more</span>
						</div>
					</a>
					
				<?php endif ?>

			<?php endwhile; ?>

			</div>

			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>