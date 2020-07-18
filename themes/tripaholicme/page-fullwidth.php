<?php
/**
 * Template Name: Full width template
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/content', 'page-bxslider' ); ?>

<main id="page-main">
	<div class="container">
        <div id="page-content">
            
        
            <?php while(have_posts()) : ?>
            <?php the_post(); ?>

            
            <h1 id="page-title"><?php the_title(); ?></h1>
            <?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php the_post_thumbnail_url() ?>" alt="page image">
            <?php endif ?>

            
            <br>
            <br>
            <div><?php the_content(); ?></div>

                

                

            <?php endwhile; ?>
            
        </div>
	</div>
</main>

<?php get_footer(); ?>