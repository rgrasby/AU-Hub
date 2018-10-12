<?php /* Template Name: Livestream */ ?>

<?php get_header(); ?>

    <div class="container">
        <h1 class="page-title"><?php the_title( ); ?></h1>
        <div class="entry-content">
            <?php the_content(); ?>
            
            <div class="resp-container">
                <?php the_field('livestream_embed_code') ?>
            </div>
        </div>
    </div>

<?php get_footer();?>
