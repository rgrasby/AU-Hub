<article>

    <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">
        <div class="article-image">
            <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" />
                <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
            </a>
        </div>
    </a>
    <?php endif; ?>

    <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">
        <h2><?php the_title(); ?></h2>
    </a>

    <?php if( get_post_type() == 'events' ) : ?>

        <!-- For Events -->
        <div class="post-meta meta-event">

            <p><strong>Event Date:</strong> <?php the_field('event_start_date_time')?><?php if( 'event_start_date_time' ) : ?> - <?php the_field('event_end_date_time')?> <?php endif; ?></p>

            <?php if( get_field('city_or_town') ): ?>
                <p><strong>Location: </strong><?php the_field('city_or_town')?></p>
            <?php endif; ?>
            
        </div>

    <?php else: ?>

        <!-- For Post Formats -->
        <div class="post-meta">
            <ul class="categories">
                <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
            </ul>
        </div>

    <?php endif; ?>

</article>

