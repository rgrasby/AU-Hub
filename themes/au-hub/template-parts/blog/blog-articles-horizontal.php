    <article class="horizontal">

        <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">

            <?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>

            <div class="article-content">
                <h2><?php the_title(); ?></h2>

                <div class="post-meta">
                    <ul>
                        <li><?php echo get_the_category_list(' , '); ?></li>
                    </ul>
                    <p class="post-date"><?php echo get_the_date(); ?></p>
                </div>
            </div>
        </a>

    </article>