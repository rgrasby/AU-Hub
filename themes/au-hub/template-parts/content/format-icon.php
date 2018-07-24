<?php
/**
 * Template part for displaying page format icons where needed
 */
?>


<?php if ( has_post_format('video') ) : ?> 
    <div class="post-format-icon" aria-label="Video">
        <i class="fa fa-play" aria-hidden="true"></i>
    </div>
<?php elseif ( has_post_format('audio') ) : ?>
    <div class="post-format-icon" aria-label="Podcast">
        <i class="fa fa-headphones" aria-hidden="true"></i>
    </div>
<?php elseif ( has_post_format('gallery') ) : ?>
    <div class="post-format-icon" aria-label="Image Gallery">
        <i class="fa fa-picture-o" aria-hidden="true"></i>
    </div>
<?php elseif ( has_post_format('chat') ) : ?>
    <div class="post-format-icon" aria-label="Faculty Q&A">
        <i class="fa fa-comments" aria-hidden="true"></i>
    </div>
<?php elseif ( has_post_format('standard') ) : ?>
    <div class="post-format-icon" aria-label="Standard Article">
        <i class="fa fa-file-text" aria-hidden="true"></i>
    </div>
<!--Event is an odd duck. It isn;t a post format but a post type -->
<?php elseif( get_post_type() == 'events' ) : ?>
    <div class="post-format-icon" aria-label="Upcoming Events">
        <i class="fa fa-calendar" aria-hidden="true"></i>
    </div>
<?php endif; ?>
    