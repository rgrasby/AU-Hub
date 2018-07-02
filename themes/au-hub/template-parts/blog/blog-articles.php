
    <article>

        <?php if ( has_post_thumbnail() ) : ?>

            <div class="article-img circle" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>

        <?php endif; ?>

        <div class="article-excerpt">

            <div class="post-meta">
                <ul>
                    <li><?php echo get_the_date(); ?></li>
                    <li>Categories: <?php echo get_the_category_list(' , '); ?></li>
                </ul>
            </div>
            <a href="<?php the_permalink(); ?>" title="Read Article">
                <h2><?php the_title(); ?> <span class="bullet">&#8226;</span> <?php echo get_field( "secondary_heading" ); ?></h2>

                <?php $excerpt = wp_trim_words( get_field('intro'), $num_words = 50, $more = '...' ); ?>
                <p><?php echo $excerpt ?></p>

                <span class="btn btn-link">
                    Continue Reading
                    <svg viewBox="0 0 32 32" class="icon">
                        <use xlink:href="#right-arrow"></use>
                    </svg>
                </span>
            </a>

        </div>
        
    </article>