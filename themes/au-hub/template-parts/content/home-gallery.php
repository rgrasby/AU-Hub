<div class="section-heading">
    <h2>Image Galleries</h2>
</div>

<div class="row">

    <div class="col-md-6"> 
        <?php

        $faculty_featured_post = get_field('gallery_featured_post');

        if( $faculty_featured_post ): 

            $post = $faculty_featured_post;
            setup_postdata( $post ); 

            ?>

            <div id="gallery-featured" class="featured featured-md">
                <div class="featured-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'large' );?>)"></div>
                <div class="featured-bg-color"></div>
                <div class="featured-content"> 
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <ul class="categories">
                        <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                    </ul>
                </div>
            </div>
            <div class="featured-intro">
                <a href="<?php the_permalink(); ?>">
                    <?php $intro = get_field('intro') ?>
                    <p><?php echo limit_words($intro, 30); ?></p>
                </a>
            </div>
            <?php wp_reset_postdata(); ?>
 
        <?php endif; ?>
    </div> 
    
    <!--Get most recent image gallery format posts-->
    <?php
    $featured_posts = array(get_field('gallery_featured_post',$post->ID)->ID);
    $args = array(
        'posts_per_page' => 4,
        'post__not_in'   => $featured_posts,
        'tax_query'      => array(
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array( 'post-format-gallery' ),
                ),
            ),
    );
    $the_query = new WP_Query( $args ); ?>

    <div class="col-md-6 secondary">
    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

        <?php get_template_part( 'template-parts/blog/blog', 'articles-horizontal' ); ?>

    <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>
    