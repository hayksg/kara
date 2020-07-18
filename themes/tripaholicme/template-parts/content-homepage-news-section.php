<section id="news">
		<div class="news-top">
			<div class="container">
				<h2 class="site-title">Hot tours</h2>
			</div>
		</div>

		<div class="news-bottom">
			<div class="container">

				<?php
					$tours = new WP_Query( array(
						'posts_per_page' => -1,
						'post_type'      => 'tour',
					) ); 
				?>

				<div id="news-slider">

				<?php while($tours->have_posts()) : $tours->the_post() ?>
					
                    <?php if( get_field('show_in_hot_tours') == 'Yes' ) : ?>
                        
                        <a href="<?php the_permalink() ?>" class="news">
                            <div class="news-banner-wrap">
                                <div class="news-banner" style="background:url('<?php the_post_thumbnail_url() ?>') center/cover no-repeat;"></div>
                            </div>
                            <div class="news-info">
                                <h3 class="news-title"><?php the_title() ?></h3>
                                <p class="news-text"><?php echo wp_trim_words(get_the_excerpt(), 30) ?></p>
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