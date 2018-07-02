    <?php 

    $categories = get_the_category($post->ID);
    if ($categories) :
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

        $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 2, 
            'caller_get_posts'=>1
        );

        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ) : ?>

            <h3 class="heading-bar">You may also like:</h3>

            <div class="related-row">
                <div id="articles">

                    <?php
                    while( $my_query->have_posts() ) :
                    $my_query->the_post();

                        get_template_part( 'template-parts/blog/blog', 'articles' ); 
                    
                    endwhile; wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
   
 
