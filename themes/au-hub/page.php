<?php get_header(); ?>

    <div class="container-sm">
        <h1 class="page-title"><?php the_title( ); ?></h1>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div><!-- .entry-content -->
    
<?php get_footer(); ?>