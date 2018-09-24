<?php 
if (get_field('hero_banner')): 
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sixteen-by-nine' ); 
    endif; 
?> 

<div class="container-sm">
    <ul class="social-share">
        <li class="facebook">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span><strong>Share</strong></a>
        </li>
        <li class="twitter">
            <a href="https://twitter.com/home?status=<?php echo strip_tags( get_field('intro')); ?> <?php echo get_permalink(); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span><strong>Tweet</strong></a>
        </li>
        <li class="linkedin">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo the_title(); ?>&summary=<?php echo strip_tags( get_field('intro')); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span><strong>Share</strong></a>
        </li>
        <li class="pinterest">
            <a href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo esc_url( $thumbnail[0] ); ?>"><span><i class="fa fa-pinterest-p" aria-hidden="true"></i></span><strong>Pin it</strong></a>    
        </li>
    </ul>
</div>