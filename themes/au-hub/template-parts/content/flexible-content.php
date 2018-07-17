<?php
/**
 * Template part for building out blog posts with ACF 
 */
?>
    <?php while ( have_posts() ) : the_post(); ?>

        <!--Attention grabbing intro text that is slightly bigger than the rest of the content--> 
        <div id="post-intro">
            <div class="container-sm">
                <?php
                /* Using CSS :first-letter was too inconsistent. Decided to wrap first letter with a span to get dropcap effect */
                $intro = get_field('intro');
                $first_letter = substr($intro, 0, 1);
                $remaining_string = substr($intro, 1);

                if(substr($intro, 0, 5) != '<span') {
                 $intro = '<span><span class="first-letter">'.$first_letter.'</span>'.$remaining_string;
                }
                if(substr($intro, -7) != '</span>') {
                 $intro .= '</span>';
                }
                ?>
                <p class="lead"><?php echo $intro; ?></p>
            </div>
        </div>   

    <?php endwhile; ?>


        <!-- Check if it is a video-->
        <?php if (!get_field('move_video_to_bottom')): ?>
            <?php if ( has_post_format('video') ) : ?> 
            <div class="media">
                <div class="video">
                    <div class="container">
                        <div class="resp-container">
                            <?php the_field('video_embed_code'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Check if it is an audio-->
        <?php if (!get_field('move_audio_to_bottom')): ?>
            <?php if ( has_post_format('audio') ) : ?> 
            <div class="media">
                <div class="audio">
                    <div class="container">
                        <div class="resp-container">
                            <?php the_field('audio_embed_code'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <!-- Check if it is an image gallery-->
        <?php if ( has_post_format('gallery') ) : ?> 

            <?php 

            $image_gallery = get_field('image_gallery');
            
            if( $image_gallery ): ?>
            <div class="media">
                <div id="gallery">
                    <div class="container">
                        <div class="row">
                            <?php foreach( $image_gallery as $image ): ?>
                                <div class="col-sm-3">
                                    <div class="image">
                                        <a data-fancybox="gallery" href="<?php echo $image['url']; ?>" data-caption="<?php echo $image['caption']; ?>">
                                             <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        
        <?php endif; ?>

    <?php if ( have_rows('post_builder') ) : while ( have_rows('post_builder') ) : the_row(); ?>

        <?php if ( get_row_layout() == 'content_with_image_float_and_title' ) :

            $image   = get_sub_field('image');
            $imgPosition = get_sub_field('image_position');
            if( $imgPosition == 'Left'): 
                $float = 'img-left';
            else:
                $float = 'img-right'; 
            endif; ?>

            <div class="container-sm">
                <h2><?php the_sub_field('title'); ?></h2>
                
                <div class="content-with-image">
                    <img class="<?php echo $float; ?>" src="<?php echo $image['sizes']['square'] ?>" alt="<?php $image['alt'] ?>" />
                    <?php the_sub_field('content'); ?>
                </div>
                
            </div>
       
        <?php elseif ( get_row_layout() == 'content_only' ) : ?>

            <div class="container-sm">
                <div class="content-only">
                    <?php the_sub_field('content'); ?>
                </div>
            </div>

        <?php elseif ( get_row_layout() == 'single_or_double_column_image' ) :

            $image   = get_sub_field('image'); 
            $image2  = get_sub_field('image_2');
            $columns = get_sub_field('columns');
            ?>

            <?php if ( $image ) : ?>
                <div class="container">
                    <div class="image-row">
                        <div class="row">
                            <?php if( $columns == '2'): ?>

                                <div class="col-sm-6">
                                    <img src="<?php echo $image['sizes']['six-by-four'] ?>" alt="<?php $image['alt'] ?>" />
                                </div>

                            <?php else: ?>

                                <div class="col">
                                    <img src="<?php echo $image['sizes']['sixteen-by-nine'] ?>" alt="<?php $image['alt'] ?>" />
                                </div>

                            <?php endif; ?>

                            <?php if( $image2 and $columns == '2'): ?>

                                <div class="col-sm-6">
                                    <img src="<?php echo $image2['sizes']['six-by-four'] ?>" alt="<?php $image2['alt'] ?>" />
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <!--full width quote -->
        <?php elseif ( get_row_layout() == 'full_width_pull_quote' ) : ?>

            <div class="container">
                <blockquote class="full-width-quote">
                    <p>“<?php the_sub_field('full_width_pull_quote'); ?>”</p>
                </blockquote>
            </div>

        <!--quote with image -->
        <?php elseif ( get_row_layout() == 'pull_quote_with_image' ) : ?>
            <div class="container">
                <div class="img-quote-row">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php 
                            $quoteimage = get_sub_field('pull_quote_image');
                            if( !empty($quoteimage) ): 
                            	$size = 'sixteen-by-nine';
                                $thumb = $quoteimage['sizes'][ $size ];
                            ?>
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $quoteimage['alt']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-6">
                            <blockquote>
                                <p>“<?php the_sub_field('pull_quote'); ?>”</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        <!--Image slider -->
        <?php elseif ( get_row_layout() == 'image_slider' ) : ?>

            <?php 

            $images = get_sub_field('image_slider_gallery');
            $size = 'sixteen-by-nine'; 

            if( $images ): ?>
                <div class="container">
                    <div class="owl-carousel owl-theme">
                        <?php foreach( $images as $image ): ?>
                            <div class="item" style="background-image:url(<?php echo $image['sizes']['sixteen-by-nine']; ?>)"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    <?php endwhile; endif; ?><!--end post builder flexible content-->

    <?php if (get_field('move_video_to_bottom')): ?>
        <?php if ( has_post_format('video') ) : ?> 
        <div class="media">
            <div class="video">
                <div class="container">
                    <div class="resp-container">
                        <?php the_field('video_embed_code'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Check if it is an audio-->
    <?php if (get_field('move_audio_to_bottom')): ?>
        <?php if ( has_post_format('audio') ) : ?> 
        <div class="media">
            <div class="audio">
                <div class="container">
                    <div class="resp-container">
                        <?php the_field('audio_embed_code'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

        

    <!--Faculty Q&A -->
    <div class="container-sm">

        <?php 
        $photo = get_field('photo');
        $name = get_field('name');

        if( have_rows('q_and_a') ): while ( have_rows('q_and_a') ) : the_row(); 

        ?>
            <div class="qa-row">

                <div class="qa-wrap">
                    <div class="qa-thumb"> 
                        <div class="thumb">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 145"><title>Athabasca University Shield</title><path class="shield" d="M1.3 4v88.3c0 29.3 48.7 49.4 48.7 49.4s48.7-20 48.7-49.4V4H1.3zM81 92.3c0 9.7-16.5 22.5-31 29.9-14.7-7.5-31-20.1-31-29.9V21.7h62v70.6z"></path></svg>
                        </div>
                        <p>Athabasca University News</p>
                    </div>

                    <div class="question">
                        <div class="inner">
                            <?php the_sub_field('au_question'); ?>
                        </div>
                    </div>
                </div>

                <div class="qa-wrap">
                    <div class="qa-thumb">
                        <div class="thumb" style="background-image:url(<?php echo $photo ?>)"></div>
                        <p><?php echo $name ?></p>
                    </div>

                    <div class="answer">
                        <div class="inner">
                            <?php the_sub_field('faculty_answer'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div><!--END .container-sm-->


    <?php wp_reset_query(); ?>
