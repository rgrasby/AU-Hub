<h2>Podcasts</h2>

<div class="row">

    <div class="col"> 
        <?php

        $podcast_featured_post = get_field('podcast_featured_post');

        if( $podcast_featured_post ): 

            $post = $podcast_featured_post;
            setup_postdata( $post ); 

            ?>

            <div id="video-featured" class="featured">
                <div class="featured-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'large' );?>)">
                    <div class="featured-content"> 
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
                </div>
            </div>
            
            <?php wp_reset_postdata(); ?>

        <?php endif; ?>
    </div> 
    
    <!--Get most recent video format posts-->
    <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => '4',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array( 'post-format-audio' ),
                ),
            ),
        );
    ?>

    <div class="col"> 
        <?php $the_query = new WP_Query( $args ); ?>

        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
    
            <?php get_template_part( 'template-parts/blog/blog', 'articles-horizontal' ); ?>
        
        <?php endwhile; wp_reset_postdata(); ?>
    </div>

</div>