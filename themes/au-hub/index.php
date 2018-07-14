<?php get_header(); ?>

    <div class="container">
        <?php if ( have_posts() ) : ?>
            <header class="page-header">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                ?>
            </header><!-- .page-header -->
        <?php endif; ?>
        
        <div id="articles">

            <div class="article-wrap row">

                <?php
                if ( have_posts() ) :
                    $count = 0; 
                    while (have_posts()) : the_post();
                        $count++; 
                    ?>
                        <?php if ( !is_paged() ) : ?>
                            <?php if ($count == 1) : ?>
                                <div class="col-sm-6">					
                                    <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>			
                                </div>	
                            <?php elseif($count ==2): ?>
                                <div class="col-sm-6">					
                                    <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>			
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="col-sm-4">					
                                <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>			
                            </div>		
                        <?php endif; ?>

                    <?php endwhile;?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            </div>
        
            <?php if ($wp_query->max_num_pages > 1) : ?>    
                <div class="loadmore-wrap text-center">
                    <button id="loadmore" class="btn btn-md btn-primary"><span>Load More Posts</span></button>
                    <div class="the-end">
                        <h3>You reached the end.</h3>
                    </div>
                </div>
            <?php endif; ?> 

		  <?php wp_reset_postdata(); ?>

        </div><!--END #articles -->
    </div><!--END .container -->

<?php get_footer();?>
