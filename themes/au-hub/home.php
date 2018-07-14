<?php get_header(); ?>    

    <div class="container" id="articles">
        
        <?php if ( have_posts() ) : ?>
            <div class="row">
                <header class="page-header">
                    <h1 class="page-title">Recent Posts</h1>
                </header><!-- .page-header -->
            </div>
        <?php endif; ?>

        <div class="row">

            <div class="row article-wrap">

                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-sm-4">
                            <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>

            <?php if ($wp_query->max_num_pages > 1) : ?>    
                <div class="loadmore-wrap">
                    <button id="loadmore" class="btn btn-md btn-orange btn-inline"><span>Load More Posts</span></button>
                    <div class="the-end">
                        <h3>You reached the end.</h3>
                    </div>
                </div>
            <?php endif; ?> 

        </div><!--END .row -->
    </div><!--END #articles -->

<?php get_footer(); ?>