<?php get_header(); ?>
<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sixteen-by-nine' ); ?>
    <article>
        <div class="container">
        
            <div class="featured">
                <div class="featured-bg" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)"></div>
                <div class="featured-bg-color"></div>
                <div class="featured-content"> 
                    <h1><?php echo the_title(); ?></h1>
                </div>
                
            </div>
            
            <div class="meta-box meta-box-events">

                <div class="meta-row date">
                    <strong>Date and Time:</strong>
                    <div class="meta-content">
                        <?php the_field('event_start_date_time')?><?php if( 'event_start_date_time' ) : ?> - <?php the_field('event_end_date_time')?> <?php endif; ?>
                    </div>
                </div>

                <div class="meta-row location">
                    <strong>Location:</strong>
                    <div class="meta-content">
                        <?php the_field('city_or_town')?>
                        <?php the_field('address')?>
                    </div>
                </div>

                <div class="meta-row description">
                    <strong>Description:</strong>
                    <div class="meta-content">
                        <?php the_field('event_description')?>
                    </div>
                </div>
                
                <div class="event-cta">
                    <?php if (get_field('cta_url')): ?>

                        <?php if (!get_field('cta_button_text')): ?>
                            <a href="<?php the_field('cta_url') ?>" class="btn btn-lg btn-orange">RSVP to this event</a>
                        <?php else: ?>
                            <a href="<?php the_field('cta_url') ?>" class="btn btn-lg btn-orange"><?php the_field('cta_button_text')?></a>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div><!--END .container -->
        
    </article>

<?php get_footer();?>
