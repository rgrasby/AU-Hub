<?php
    $thumb_id = get_post_thumbnail_id($post->ID );
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
?>

    <!--Check if post has a featured image. If not just show title-->
    <?php if (has_post_thumbnail( $post->ID ) ): ?>

        <div id="hero">
            <div class="hero-inner" <?php echo 'style="background-image:url('. $thumb_url. ')"'?>>
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>

    <?php else: ?> 

        <div id="title-only">
            <h1><?php echo the_title(); ?></h1>
        </div>

    <?php endif; ?> 