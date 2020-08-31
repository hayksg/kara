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
                       
                        <!-- Category this page belongs to (Категория, к которой принадлежит эта страница) -->
                        <?php
                            $terms = wp_get_post_terms( get_the_ID(), array( 'tour-categories' ) );
                            foreach ( $terms as $term ) :
                                $pageCategory = $term->name;
                            endforeach;
                        ?>

						<ul id="page-category-links">
                            <?php     
                                $terms = get_terms( array(
                                    'taxonomy' => 'tour-categories',
                                    'hide_empty' => false,
                                ) );
                        
                                foreach($terms as $term):
                                    $term_link = get_term_link( $term );
                            ?>

                            <?php if ( $pageCategory == $term->name) : ?>
                                <li><a href="<?php echo $term_link ?>" class="page-category-link page-category-link-active"><?php echo $term->name ?></a></li>
                            <?php else : ?>
                                <li><a href="<?php echo $term_link ?>" class="page-category-link"><?php echo $term->name ?></a></li>
                            <?php endif ?>
                            
                            <?php endforeach ?>
						</ul>
					</nav>
				</aside>
			</div>
			<div class="col-md-9 col-md-pull-3">
				<div id="page-content">
					
                    <?php while(have_posts()) : ?>
                    <?php the_post(); ?>
                    
                    <h1 id="page-title"><?php the_title(); ?></h1>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php the_post_thumbnail_url() ?>" alt="tour image">
                    <?php endif ?>
                    <br>
                    <br>
                    <div><?php the_content(); ?></div>

                    <?php endwhile; ?>

                    <?php get_template_part( 'template-parts/content', 'contact-form' ); ?>
					
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>