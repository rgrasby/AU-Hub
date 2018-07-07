<div class="row">
    <?php

    $primary_featured_post = get_field('primary_featured_post');

    if( $primary_featured_post ): 

        $post = $primary_featured_post;
        setup_postdata( $post ); 

        ?>

        <div id="primary-featured" class="col-12">
            <div class="featured">
                <div class="featured-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'large' );?>)"></div>
                <div class="featured-bg-color"></div>
                <div class="featured-content"> 
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <ul class="categories">
                        <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                    </ul>
                </div>
                <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>

<div class="row">
    <?php

    $second_featured_post = get_field('second_featured_post');

    if( $second_featured_post ): 

        // override $post
        $post = $second_featured_post;
        setup_postdata( $post ); 

        ?>
        <div id="secondary-featured" class="featured-md col-sm-6">
            <div class="featured">
                <div class="featured-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'large' );?>)"></div>
                <div class="featured-bg-color"></div>
                <div class="featured-content">              
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <ul class="categories">
                        <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                    </ul>
                </div>
                <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
            </div>
        </div>
        <?php wp_reset_postdata();?>
    <?php endif; ?>


    <?php

    $third_featured_post = get_field('third_featured_post');

    if( $third_featured_post ): 

        // override $post
        $post = $third_featured_post;
        setup_postdata( $post ); 

        ?>
        <div id="third-featured" class="featured-md col-sm-6">
            <div class="featured">
                <div class="featured-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'large' );?>)"></div>
                <div class="featured-bg-color"></div>
                <div class="featured-content">  
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <ul class="categories">
                        <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                    </ul>
                </div>
                <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>