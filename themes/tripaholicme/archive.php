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
                                $categories = get_categories();

                                foreach($categories as $category): 
                            ?>

                            <li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>" class="page-category-link"><?php echo $category->name ?></a></li>

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

                    <div><?php the_excerpt(); ?></div>
                 
					<hr>
                        

                        

                    <?php endwhile; ?>
					

         


				</div>

				<?php echo paginate_links() ?>
			</div>
		</div>
	</div>

	
</main>

<?php get_footer(); ?>