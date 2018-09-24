<div class="row">

    <?php 

    $featured_posts = array(get_field('primary_featured_post',$post->ID)->ID, get_field('second_featured_post',$post->ID)->ID, get_field('third_featured_post',$post->ID)->ID);
    $args = array(
        'posts_per_page' => 12,
        'post__not_in' => $featured_posts
    );
    $the_query = new WP_Query( $args ); ?>

    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

        <div class="col-sm-6 col-md-4">
            <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>
        </div>

    <?php endwhile; wp_reset_postdata(); ?>

</div>
