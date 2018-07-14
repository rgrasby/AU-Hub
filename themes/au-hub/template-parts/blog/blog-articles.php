
<article>

    <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">
        <div class="article-image">
            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" />
            <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
        </div>
    </a>
    <?php endif; ?>

    <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title(); ?>">
        <h2><?php the_title(); ?></h2>
    </a>

    <div class="post-meta">
        <ul class="categories">
            <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
        </ul>
    </div>

</article>