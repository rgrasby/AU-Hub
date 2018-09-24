<?php get_header(); ?>

    <div class="container">
        <section id="featured-posts">
            <?php get_template_part( 'template-parts/content/home', 'featured' ); ?>
        </section>
        
        <section id="recent-posts">
            <?php get_template_part( 'template-parts/content/home', 'recent' ); ?>
            <div class="see-all">
                <a href="<?php echo get_permalink() ?>recent-posts" class="btn btn-circle-icon-lg internal">See all recent posts</a>
            </div>
        </section>
        
        <hr>
        
         <section id="event-posts">
            <?php get_template_part( 'template-parts/content/home', 'events' ); ?>
            <div class="see-all">
                <a href="<?php echo get_permalink() ?>events" class="btn btn-circle-icon-lg internal">See all upcoming events</a>
            </div>
        </section>
        
        <hr>
        
        <section id="video-posts">
            <?php get_template_part( 'template-parts/content/home', 'videos' ); ?>
            <div class="see-all">
                <a href="<?php echo get_post_format_link( 'video' ) ?>" class="btn btn-circle-icon-lg internal">See all videos</a>
            </div>
        </section>
        
        <hr>
    </div>   
    
    <div class="container">
        
        <?php/*
        <section id="podcast-posts">
            <?php get_template_part( 'template-parts/content/home', 'podcasts' ); ?>  
            <div class="see-all">
                <a href="<?php echo get_post_format_link( 'audio' ) ?>" class="btn btn-circle-icon-lg internal">See all podcasts</a>
            </div>
        </section>
        
        <hr>
        
        <section id="gallery-posts">
            <?php get_template_part( 'template-parts/content/home', 'gallery' ); ?>  
            <div class="see-all">
                <a href="<?php echo get_post_format_link( 'video' ) ?>" class="btn btn-circle-icon-lg internal">See all galleries</a>
            </div>
        </section>
        
        <hr>*/ ?>           
        
        <section id="faculty-stories">
            <?php get_template_part( 'template-parts/content/home', 'qa' ); ?> 
            <div class="see-all">
                <a href="<?php echo get_post_format_link( 'chat' ) ?>" class="btn btn-circle-icon-lg internal">See al Q&amp;As</a>
            </div>
        </section>  

    </div>

<?php get_footer();