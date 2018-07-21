<div class="section-heading">
    <h2>Upcoming Events</h2>
</div>

<div class="row">

    <div class="col-md-6"> 
        <?php

        $event_featured_post = get_field('event_featured_post');

        if( 'event_featured_post' ): 

            $post = $event_featured_post;
            setup_postdata( $post ); 

            ?>

            <div id="events-featured" class="featured featured-md">
                <div class="featured-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'large' );?>)"></div>
                <div class="featured-bg-color"></div>
                <div class="featured-content"> 
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><strong>Event Date:</strong> <?php the_field('event_start_date_time')?><?php if( 'event_start_date_time' ) : ?> - <?php the_field('event_end_date_time')?> <?php endif; ?></p>
                </div>
            </div>
            <div class="featured-intro">
                <?php $intro = get_field('event_description') ?>
                <p><?php echo limit_words($intro, 50); ?></p>
            </div>
            <?php wp_reset_postdata(); ?>
 
        <?php endif; ?>
    </div> 
    
    <!--Get most recent video format posts-->
    <?php
    $featured_posts = array(get_field('event_featured_post',$post->ID)->ID);
    $args = array(
        'posts_per_page' => 4,
        'post_type' => 'events',
        'post__not_in'   => $featured_posts,
    );
    $the_query = new WP_Query( $args ); 
    ?>
    
    <div class="col-md-6 secondary">
        
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <?php get_template_part( 'template-parts/blog/blog', 'articles-horizontal' ); ?>
        <?php endwhile; wp_reset_postdata(); ?>
        
    </div>

</div>