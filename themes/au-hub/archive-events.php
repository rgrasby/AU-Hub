<?php get_header(); ?>

    <div class="container">
        <h1>Upcoming Events</h1>
        <div class="row">
            
            <?php $today = date('Y-m-d H:i:s');
            
            $args = array(
                'post_type' => 'events',
                'posts_per_page' => 100,
                'meta_query' => array(
                'relation' => 'OR',
                    array(
                        'key'		=> 'event_start_date_time',
                        'compare'	=> '>=',
                        'value'		=> $today,
                    ),
                     array(
                        'key'		=> 'event_end_date_time',
                        'compare'	=> '>=',
                        'value'		=> $today,
                    )
                ),
            );
            
            //the first two most recent events are larger
            $loop = new WP_Query( $args );
            $count = 0; 
            while ( $loop->have_posts() ) : $loop->the_post();
            $count++;
            ?>
                <?php if ($count == 1) : ?>
                    <div class="col-sm-6">					
                        <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>			
                    </div>	
                <?php elseif($count == 2): ?>
                    <div class="col-sm-6">					
                        <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>		
                    </div>
                <?php elseif($count > 2): ?>
                    <div class="col-sm-4">		
                        <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>			
                    </div>		
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div><!--END .row -->

<?php get_footer();?>
