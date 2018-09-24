<?php /* Template Name: Get Social */ ?>

<?php get_header(); ?>

<div class="container">
    
    <?php 

    $image = get_field('contest');
    $url = get_field('contest_url');

    if( !empty($image) ): 

        if( $url ): ?>
            <a class="button" href="<?php echo $url ?>" target="_blank">
        <?php endif; ?>

            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

        <?php if( $url ): ?>
            </a>
        <?php endif; ?>

    <?php endif; ?>
            
</div>
<?php get_footer();?>