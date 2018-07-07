
<article>

    <div class="article-excerpt">
        <a href="<?php the_permalink(); ?>" title="Read Article">

            <?php if ( has_post_thumbnail() ) : ?>
            <div class="article-image">
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" />
                <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
            </div>
            <?php endif; ?>

            <h2><?php the_title(); ?></h2>

        </a>

        <div class="post-meta">
            <ul>
                <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
            </ul>
        </div>

    </div>

</article>