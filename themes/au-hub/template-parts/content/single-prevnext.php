<?php
$prev_post = get_previous_post(true);
$next_post = get_next_post(true);   
?>

<section id="prev-next">
    <div class="container">
        <div class="row no-gutters row-eq-height">

            <div class="post-previous">
                <?php 
                $prevPost = get_previous_post(true);
                if($prevPost) :
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $prevPost->ID
                    );
                    $prevPost = get_posts($args);
                    foreach ($prevPost as $post) :
                        setup_postdata($post);
                ?>

                <a href="<?php the_permalink(); ?>">  
                    <div class="thumbnail">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    <h4>
                        <span>Previous Story</span>
                        <?php the_title(); ?>
                    </h4>
                </a>
                <?php wp_reset_postdata(); ?>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="post-next">
                <?php
                $nextPost = get_next_post(true);
                if($nextPost) :
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $nextPost->ID
                    );
                    $nextPost = get_posts($args);
                    foreach ($nextPost as $post) :
                        setup_postdata($post);
                ?>

                <a href="<?php the_permalink(); ?>">  
                    <h4>
                        <span>Next Story</span>
                        <?php the_title(); ?>
                    </h4>
                    <div class="thumbnail">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                </a>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>