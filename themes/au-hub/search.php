<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'auhub' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header>
    <?php else : ?>
        <h1 class="page-title"><?php _e( 'Nothing Found', 'auhub' ); ?></h1>
    <?php endif; ?>
    <div class="row">
        <?php if ( have_posts() ) : ?>
            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-sm-4">						
                  <?php get_template_part( 'template-parts/blog/blog', 'articles' ); ?>				
                </div>					
            <?php endwhile; ?>	
        <?php endif; ?>
    </div>
    
</div>

<?php get_footer();
