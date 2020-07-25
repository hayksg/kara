<section id="categories">
    <div id="categories-wrap">
        <div class="container">
            <div id="categories-slider-wrap">
                <div id="categories-slider" style="color:white">				
                    <?php     
                        $terms = get_terms( array(
                            'taxonomy' => 'tour-categories',
                            'hide_empty' => false,
                        ) );
                
                        foreach($terms as $term):
                            $image = get_field('category_image', 'category_' . $term->term_id);
                            $term_link = get_term_link( $term );
                    ?>

                    <a href="<?php echo $term_link ?>" class="categories-item">
                        <div class="categories-link-in" style="background:url('<?php echo $image['url'] ?>') top/cover no-repeat;"></div>
                        <span class="categories-link-title"><?php echo $term->name ?></span>
                    </a>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>