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

                        <?php $postType = get_post_type(); ?>

                        <?php if ( !empty(esc_html(get_search_query(false))) && $postType == 'post' ) : ?>
                            <ul id="page-category-links">
                                <?php     
                                    $categories = get_categories();

                                    foreach($categories as $category): 
                                ?>

                                <li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>" class="page-category-link"><?php echo $category->name ?></a></li>

                                <?php endforeach ?>
                            </ul>
                        <?php else : ?>
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
                        <?php endif; ?>
						
					</nav>
				</aside>
			</div>
			<div class="col-md-9 col-md-pull-3">

                <h1 class="page-title search-query">You searched for &ldquo;<span class="search-query-text"><?php echo esc_html(get_search_query(false)) ?></span>&rdquo;</h1>

                <?php if (have_posts() && !empty(esc_html(get_search_query(false)))) : ?>
                    <div id="page-content">

                        <?php

                            $front_page_id = get_option( 'page_on_front' );
                            $blog_page_id  = get_option( 'page_for_posts' );

                            $customQuery = new WP_Query(array(
                                'paged'     => get_query_var( 'paged', 1 ),   // For pagination // find all pages ( if no pages, set to 1 )
                                'post_type' => array('page', 'post', 'tour'), // Search only in post types with not empty content
                                'orderby' => 'title',
                                'order' => 'ASC',
                                'post__not_in' => array($front_page_id, $blog_page_id)
                            ));

                        ?>

                        <?php while ($customQuery->have_posts()) : $customQuery->the_post() ?>
                            
                            <h2 class="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                            <div><?php the_excerpt(); ?></div>
                        
                            <hr>

                        <?php endwhile; ?>
                        
                    </div>

                    <?php echo paginate_links(array( 'total' => $customQuery->max_num_pages ) ) ?>

                <?php else : ?>
		            <h2 class="search-no-result">No results match that search.</h2>
	            <?php endif; ?>
			</div>
		</div>
	</div>

</main>

<?php get_footer(); ?>