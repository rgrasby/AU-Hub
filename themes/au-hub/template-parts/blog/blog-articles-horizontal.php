    <article class="horizontal">
            <div class="article-image">
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" />
                <?php endif; ?>
            </div>
            <div class="article-content">
                 <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>

                <div class="post-meta">
                    <ul class="categories">
                        <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                    </ul>
                    <p class="post-date"><?php echo get_the_date(); ?></p>
                </div>
            </div>
    </article>