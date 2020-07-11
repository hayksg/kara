<section id="slider">
	<ul class="bxslider">
		
        <?php 
            $slides = new WP_Query( array(
                'posts_per_page' => -1,
                'post_type'      => 'hero-slider-big',
            ) ); 
        ?>

        <?php while($slides->have_posts()) : $slides->the_post(); ?>
            <li style="background: url('<?php the_post_thumbnail_url() ?>') center/cover no-repeat"></li>
        <?php endwhile; ?>
        
        <?php wp_reset_postdata(); ?>

	</ul>
	<h1 class="container text-center" id="slider-caption">Welcome to Armenia</h1>
</section>