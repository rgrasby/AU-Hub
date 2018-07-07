<?php get_header(); ?>

    <div class="container">

        <?php $the_query = new WP_Query( 
            array( 
                'posts_per_page' => 2,
                'meta_key' => 'category_featured_post',
                'cat' => get_query_var('cat'),
                'meta_value' => '1' ) 
            ); 
        ?>

        <div class="row">
            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                <div class="col-sm-6">
                    <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="row">
            <?php if ( have_posts() ) : ?>
                <?php /* Start the Loop */ ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-sm-3">						
                      <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>				
                    </div>					
                <?php endwhile; ?>	
            <?php endif; ?>
        </div>
    </div>

<?php get_footer();?>
