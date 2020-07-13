<section id="slider">
	<ul class="bxslider">
		
        <?php 
            $slides = new WP_Query( array(
                'posts_per_page' => -1,
                'post_type'      => 'hero-slider-small',
            ) ); 
        ?>

        <?php while($slides->have_posts()) : $slides->the_post(); ?>
            <li style="background: url('<?php the_post_thumbnail_url() ?>') center/cover no-repeat"></li>
        <?php endwhile; ?>
        
        <?php wp_reset_postdata(); ?>

	</ul>
</section>
