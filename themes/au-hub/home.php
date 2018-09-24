<?php get_header(); ?>

    <div class="container">
        
        <h1>Recent Posts</h1>       

        <div id="articles">
            <div class="articles-wrap">
                <div class="row">
                    <?php
                    //the first two most recent events are larger
                    if ( have_posts() ) :
                        $count = 0; 
                        while (have_posts()) : the_post();
                        $count++; 
                        ?>
                            <?php if ($count == 1) : ?>
                                <div class="col-sm-6 most-recent">					
                                    <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>			
                                </div>	
                            <?php elseif($count == 2): ?>
                                <div class="col-sm-6 most-recent">					
                                    <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>			
                                </div>
                            <?php elseif($count > 2): ?>
                                <div class="col-sm-4">					
                                    <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>	
                                </div>		
                            <?php endif; ?>
                        <?php endwhile;?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>

                </div>
            </div>
            <?php if ($wp_query->max_num_pages > 1) : ?>    
                <div class="loadmore-wrap">
                    <button id="loadmore" class="btn btn-md btn-orange btn-inline"><span>Load More Posts</span></button>
                    <div class="the-end">
                        <h3>You reached the end.</h3>
                    </div>
                </div>
            <?php endif; ?> 

		  <?php wp_reset_postdata(); ?>

        </div><!--END #articles -->
    </div><!--END .container -->


<?php get_footer();?>
