<?php
$prev_post = get_previous_post(true);
$next_post = get_next_post(true);   

?>

<section id="prev-next">
    <div class="container">
        <div class="row no-gutters row-eq-height">

            <?php 
            $prevPost = get_previous_post(true);
            if($prevPost) :?>
            <div class="post-previous">
                <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $prevPost->ID
                    ); 
                    $prevPost = get_posts($args);
                    foreach ($prevPost as $post) :
                        setup_postdata($post);
               
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $prevPost->ID ), 'large' );  ?>
                    <a href="<?php the_permalink(); ?>" class="equal-no-row">  
                        <div class="thumbnail" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)">
                        </div>
                        <h4>
                            <span>Previous Story</span>
                            <?php the_title(); ?>
                        </h4>
                    </a>
                    <?php wp_reset_postdata(); ?>

                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            
            <?php
            $nextPost = get_next_post(true);
            if($nextPost) : ?>
                <div class="post-next">
                    <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $nextPost->ID
                    );
                    $nextPost = get_posts($args);
                    foreach ($nextPost as $post) :
                        setup_postdata($post);
                    $thumbnail2 = wp_get_attachment_image_src( get_post_thumbnail_id( $nextPost->ID ), 'large' ); 
                    ?>

                    <a href="<?php the_permalink(); ?>" class="equal-no-row">  
                        <h4>
                            <span>Next Story</span>
                            <?php the_title(); ?>
                        </h4>
                        <div class="thumbnail" style="background-image:url(<?php echo esc_url( $thumbnail2[0] ); ?>)">
                        </div>
                    </a>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</section>