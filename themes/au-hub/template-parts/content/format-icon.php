<?php
/**
 * Template part for displaying page format icons where needed
 */
?>

<?php if ( has_post_format('video') ) : ?> 

    <i class="fa fa-play" aria-hidden="true"></i>

<?php elseif ( has_post_format('audio') ) : ?>

    <i class="fa fa-headphones" aria-hidden="true"></i>

<?php elseif ( has_post_format('gallery') ) : ?>

    <i class="fa fa-picture-o" aria-hidden="true"></i>

<?php elseif ( has_post_format('chat') ) : ?>

    <i class="fa fa-comments" aria-hidden="true"></i>

<?php endif; ?>