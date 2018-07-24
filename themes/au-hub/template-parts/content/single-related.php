<section id="related">
    <div class="container">
        <?php 

        $categories = get_the_category($post->ID);
        
        if ($categories) :
            $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

            $args = array(
                'category__in' => $category_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=> 3, 
            );

            $my_query = new wp_query( $args );
            if( $my_query->have_posts() ) : ?>

                <div class="section-heading">
                    <h2>You may also like:</h2>
                </div>
        
                <div class="row">
                    <?php
                    while( $my_query->have_posts() ) :
                    $my_query->the_post();
                    ?>

                    <div class="col-sm-4">
                        <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            <?php else: ?>
                <h3 class="text-center zero-all">No related posts found</h3>
            <?php endif; ?>

        <?php endif; ?>
    </div>
</section>