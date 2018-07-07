    <div class="row">

        <?php $the_query = new WP_Query( 'posts_per_page=6' ); ?>

        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <div class="col-sm-4">
                <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>

    </div>
