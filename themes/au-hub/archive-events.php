<?php get_header(); ?>

    <div class="container">
        <h1>Upcoming Events</h1>
        <div class="row">
            
            <?php $date_now = date('Y-m-d H:i:s');
            
            $args = array(
                'post_type'       => 'events',
                'posts_per_page'  => -1,
                'order'		      => 'ASC',
                'orderby'	      => 'meta_value',
                'meta_key'	   	  => 'event_start_date_time',
                'meta_type'		  => 'DATETIME',
                'meta_query'      => array(
                'relation' 		  => 'or',
                array(
                    'key' => 'event_end_date_time',
                    'compare' => '>=',
                    'value' => $date_now,
                    'type'  => 'DATETIME'
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
