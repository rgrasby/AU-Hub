    <?php while ( have_posts() ) : the_post(); ?>

        <div class="post-intro">
            <div class="text-center">
                <h1><?php echo get_the_title(); ?></h1>
                <h2><?php echo get_field( "secondary_heading" ); ?></h2>
            </div>
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
           <p><?php echo $intro; ?></p>
            
        </div>   

    <?php endwhile; ?>

    <?php wp_reset_query(); ?>

    <?php if ( have_rows('layout') ) : while ( have_rows('layout') ) : the_row(); ?>

        <?php if ( get_row_layout() == 'text_with_image_and_title' ) :

            $image   = get_sub_field('image');
            $imgPosition = get_sub_field('image_position');
            if( $imgPosition == 'Left'): 
                $float = 'img-left';
            else:
                $float = 'img-right'; 
            endif; ?>

            <div class="text-row">
                <h2><?php the_sub_field('title'); ?></h2>
                
                <div class="content-with-image">
                    <img class="<?php echo $float; ?>" src="<?php echo $image['sizes']['square'] ?>" alt="<?php $image['alt'] ?>" />
                    <?php the_sub_field('content'); ?>
                </div>
                
            </div>
       
        <?php elseif ( get_row_layout() == 'text' ) : ?>

            <div class="text-row">
                <?php the_sub_field('content'); ?>
            </div>

        <?php elseif ( get_row_layout() == 'image' ) :

            $image   = get_sub_field('image'); 
            $image2  = get_sub_field('image_2');
            $columns = get_sub_field('columns');
            ?>

            <?php if ( $image ) : ?>

                <div class="image-row">
                    <div class="row no-gutters">
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
            <?php endif; ?>


        <?php elseif ( get_row_layout() == 'quote' ) : ?>

            <div class="quote-row">
                <blockquote class="testimonial-block">
                    <span class="quotation-mark-left">“</span>
                    <div class="testimonial-text">
                        <p><?php the_sub_field('quote'); ?></p>
                    </div>
                    <span class="quotation-mark-right">”</span>
                </blockquote>
            </div>

        <?php elseif ( get_row_layout() == 'image_slider' ) : ?>

            <?php 

            $images = get_sub_field('gallery');
            $size = 'sixteen-by-nine'; 

            if( $images ): ?>
                <div class="owl-carousel owl-theme">
                    <?php foreach( $images as $image ): ?>
                        <div class="item">
                            <img src="<?php echo $image['sizes']['sixteen-by-nine']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>

    <?php endwhile; endif; ?>