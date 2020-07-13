<?php get_header(); ?>

<?php get_template_part( 'template-parts/content', 'page-bxslider' ); ?>

<main id="page-main">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-md-push-9">
				<aside id="page-aside">
					<div id="aside-nav-toggle" class="hidden-lg hidden-md"><i class="fa fa-bars"></i> Sub Menu</div>
					<nav id="aside-nav">
						<h2 class="aside-header">Categories</h2>
						<ul id="page-category-links">
                            <?php     
                                $terms = get_terms( array(
                                    'taxonomy' => 'tour-categories',
                                    'hide_empty' => false,
                                ) );
                        
                                foreach($terms as $term):
                                    $term_link = get_term_link( $term );
                            ?>

                            <li><a href="<?php echo $term_link ?>" class="page-category-link"><?php echo $term->name ?></a></li>

                            <?php endforeach ?>
						</ul>
					</nav>
				</aside>
			</div>
			<div class="col-md-9 col-md-pull-3">
				<div id="page-content">
					
				
                    <?php while(have_posts()) : ?>
                    <?php the_post(); ?>

                    
                    <h1 id="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                    <div><?php the_title(); ?></div>
                 

                        

                        

                    <?php endwhile; ?>
					

         


				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>