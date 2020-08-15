<section id="testimonials">
    <div class="container">
        <h2 class="site-title"><?php echo esc_attr(get_option( 'testimonials_title' )) ?></h2>
        <div id="testimonials-slider">

        <?php 
            $slides = new WP_Query( array(
                'posts_per_page' => -1,
                'post_type'      => 'testimonials',
            ) ); 
        ?>

        <?php while($slides->have_posts()) : $slides->the_post(); ?>

            <div class="testimonials-slider-item">
                <img src="<?php the_post_thumbnail_url() ?>" alt="testimonial image" class="testimonial-img">
                <div class="testimonials-slider-item-data">
                    <div class="testimonials-slider-message"><?php the_excerpt() ?></div>
                    <div class="testimonials-slider-author"><?php the_title() ?></div>
                </div>
            </div>

        <?php endwhile; ?>
        
        <?php wp_reset_postdata(); ?>

        </div>
    </div>
</section>