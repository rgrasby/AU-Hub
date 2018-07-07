<?php get_header(); ?>

    <div class="container">
        <section id="featured-posts">
            <?php get_template_part( 'template-parts/content/home', 'featured' ); ?>
        </section>
        
        <section id="recent-posts">
            <?php get_template_part( 'template-parts/content/home', 'recent' ); ?>
        </section>
        
        <section id="video-posts">
            <?php get_template_part( 'template-parts/content/home', 'videos' ); ?>
        </section>
        <hr>
    </div>   
    
    <div class="container">
        <section id="podcast-posts">
            <?php get_template_part( 'template-parts/content/home', 'podcasts' ); ?>  
        </section>
        <hr>
        <section id="faculty-stories">
            <?php get_template_part( 'template-parts/content/home', 'faculty' ); ?>     
        </section>       
    </div>

    <section id="events">
        <div class="container">
            <h2>AU Upcoming Events</h2>
            <?php echo do_shortcode("[2code-schedule-draw]"); ?> 
        </div>
    </section>

<?php get_footer();