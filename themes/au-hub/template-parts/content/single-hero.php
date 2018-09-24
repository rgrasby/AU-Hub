<!--Check if the editor wants a hero banner. If not just show title-->
<?php if (get_field('hero_banner')):
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sixteen-by-nine' ); ?>

    <div id="hero">
        <div class="hero-bg" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)"></div>
        <div class="hero-inner">
            <div class="container">
                
                <?php if( get_field('series') ): ?>
                    <div class="series">
                        <?php the_field('series'); ?>
                    </div>
                <?php endif; ?>
                
                <h1><?php echo the_title(); ?></h1>
                <div class="post-meta-top">
                    <ul class="categories">
                        <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                    </ul>
                    <span class="post-date"> <span class="seperator">|</span> <?php echo get_the_date(); ?></span>
                </div>
                <?php if( get_field('guest_author') ): ?>
                <p class="guess-author"> By: <?php the_field('guest_author'); ?></p>
                <?php endif; ?>
            </div>
            <div class="scroll-btn">
                <a href="#post-intro">
                    <span class="mouse">
                        <span></span>
                    </span>
                    <p>scroll down</p>
                </a>
            </div>
            <?php get_template_part( 'template-parts/content/format', 'icon' ); ?>
        </div>
    </div>

<?php else: ?> 

    <div id="title-only">
        <div class="container-sm">
            <h1><?php echo the_title(); ?></h1>
            <div class="post-meta-top">
                <ul class="categories">
                    <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
                </ul>
                <span class="post-date"> <span class="seperator">|</span> <?php echo get_the_date(); ?></span>
            </div>
        </div>
    </div>

<?php endif; ?> 

