<section id="btns">
    <div id="btns-wrap">
        <div class="container">
            <div id="btn-slider-wrap">
                <div id="btn-slider" style="color:white">				
                    <?php     
                        $terms = get_terms( array(
                            'taxonomy' => 'tour-categories',
                            'hide_empty' => false,
                        ) );
                
                        foreach($terms as $term):
                            $image = get_field('category_image', 'category_' . $term->term_id);
                            $term_link = get_term_link( $term );
                    ?>

                    <a href="<?php echo $term_link ?>" class="btn-item">
                        <div class="btn-link-in" style="background:url('<?php echo $image['url'] ?>') top/cover no-repeat;"></div>
                        <span class="btn-link-title"><?php echo $term->name ?></span>
                    </a>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>