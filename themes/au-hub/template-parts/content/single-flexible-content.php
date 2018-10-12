<?php
/**
 * Template part for building out blog posts with ACF 
 */
?>

        <!--Attention grabbing intro text that is slightly bigger than the rest of the content--> 
        <div id="post-intro">
            <div class="container-sm">
                <?php
                $intro = get_field('intro');
                echo $intro; 
                ?>
            </div>
        </div>   

        <?php 

        $additional_intro = get_field('additional_intro');

        if( $additional_intro ): ?>
            <div class="additional-intro">
                <div class="container-sm">
                    <?php echo $additional_intro ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Check if it is a video post format-->
        <?php if (!get_field('move_video_to_bottom')): ?>
            <?php if ( has_post_format('video') ) : ?> 
                <div class="spacer"></div>
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

        <!-- Check if it is an audio post format-->
        <?php if (!get_field('move_audio_to_bottom')): ?>
            <?php if ( has_post_format('audio') ) : ?> 
                <div class="spacer"></div>
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
    
        <!--Q and A -->
        <?php if (!get_field('before_or_after')): ?>
            <?php get_template_part( 'template-parts/content/single', 'qa' ); ?>
        <?php endif; ?>

        <!-- Check if it is an image gallery post format-->
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
                <?php if(get_sub_field('title')): ?>
                    <h2><?php the_sub_field('title'); ?></h2>
                <?php endif; ?>
                
                <div class="content-with-image">
                    <figure class="<?php echo $float; ?>">
                    <img src="<?php echo $image['sizes']['square'] ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php if ($image['caption']): ?>
                        <figcaption><?php echo $image['caption'] ?></figcaption>
                    <?php endif;?>
                    </figure>
                    <?php the_sub_field('content'); ?>
                </div>
                
            </div>
       
        <?php elseif ( get_row_layout() == 'standalone_image' ) :?>
            <div class="container-sm">
                <div class="image-only text-center">
                    <?php 

                    $image = get_sub_field('image');
                    $url = get_sub_field('url');
                    
                    if( !empty($image) ): 
                        if( $url ): ?>
                        <a href="<?php echo $url; ?>">
                        <?php endif; ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php if( $url ): ?>
                        </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <p class="text-center caption"><?php the_sub_field('caption_stand_alone_image')?></p>
            </div>

        <?php elseif ( get_row_layout() == 'content_only' ) :
            $optionalHeading = get_sub_field('optional_h2')
        ?>
            <div class="container-sm">
                <div class="content-only">
                    <?php if($optionalHeading): ?>
                        <h2><?php echo $optionalHeading ?></h2>
                    <?php endif; ?>
                    <?php the_sub_field('content'); ?>
                </div>
            </div>

        <?php elseif ( get_row_layout() == 'single_or_double_column_image' ) :

            $size    = 'six-by-four';
            $image  = get_sub_field('image');
            $image2  = get_sub_field('image_2');
            $columns = get_sub_field('columns');
            $urlImage1 = get_sub_field('url_image_1');
            $urlImage2 = get_sub_field('url_image_2');

            if ( $image ) : ?>
                <div class="container full-width-override">
                    <div class="image-row">
                            <div class="row">
                                <?php if( $columns == '2'): ?>

                                <div class="col-sm-6">
                                    <div class="img-row-bg" style="background-image:url(<?php echo $image['sizes']['sixteen-by-nine'] ?>)">
                                        <?php if( $urlImage1 ): ?> <a href="<?php echo $urlImage1; ?>"></a><?php endif; ?>
                                    </div>
                                    <p class="text-center caption"><?php the_sub_field('caption_image_1')?></p>
                                </div> 

                                <?php else: ?>

                                    <div class="col mb4 single-column">
                                        
                                        <div class="img-row-bg" style="background-image:url(<?php echo $image['sizes']['sixteen-by-nine'] ?>)">
                                            <?php if( $urlImage1 ): ?> <a href="<?php echo $urlImage1; ?>"></a><?php endif; ?>
                                        </div>
                                        <p class="text-center caption"><?php the_sub_field('caption_image_1')?></p>
                                    </div>

                                <?php endif; ?>

                                <?php if( $image2 and $columns == '2'): ?>

                                    <div class="col-sm-6">
                                        <div class="img-row-bg" style="background-image:url(<?php echo $image2['sizes']['sixteen-by-nine'] ?>)">
                                            <?php if( $urlImage2 ): ?> <a href="<?php echo $urlImage2; ?>"></a><?php endif; ?>
                                        </div>
                                        <p class="text-center caption"><?php the_sub_field('caption_image_2')?></p>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endif; ?>

        <!--full width quote -->
        <?php elseif ( get_row_layout() == 'full_width_pull_quote' ) : ?>

            <div class="container">
                <blockquote class="full-width-quote text-center">
                    <p>“<?php the_sub_field('full_width_pull_quote'); ?>”</p>
                    <?php if( get_sub_field('author') ): ?>
                        <cite>– <?php the_sub_field('author'); ?></cite>
                    <?php endif; ?>
                </blockquote>
            </div>

        <!--quote with image -->
        <?php elseif ( get_row_layout() == 'pull_quote_with_image' ) : ?>

            <?php 
            $quotePosition = get_sub_field('quote_position');
            ?>
            
            <div class="container">
                <div class="img-quote-row <?php echo strtolower($quotePosition)?>-quote">
                    <div class="row">
                        <div class="col-md-6 text-center <?php if( get_sub_field('quote_position') == 'Left' ): echo 'order-last';endif; ?>">
                            <?php 
                            $quoteimage = get_sub_field('pull_quote_image');
                            if( !empty($quoteimage) ): 
                            	$size = 'sixteen-by-nine';
                                $thumb = $quoteimage['sizes'][ $size ];
                            ?>
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $quoteimage['alt']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6 <?php if( get_sub_field('quote_position') == 'Left' ): echo 'order-first';endif; ?>">
                            <blockquote>
                                <p>“<?php the_sub_field('pull_quote'); ?>”</p>
                                <?php if( get_sub_field('author') ): ?>
                                    <cite>– <?php the_sub_field('author'); ?></cite>
                                <?php endif; ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

        <!--quote with small image -->
        <?php elseif ( get_row_layout() == 'pull_quote_with_small_image' ) : ?>

            <div class="container-sm">
                <div class="img-quote-row smaller-quote">
                    <div class="row">
                        <div class="col-md-3">
                            <?php 
                            $quoteimage = get_sub_field('pull_quote_image');
                            if( !empty($quoteimage) ): 
                            	$size = 'square';
                                $thumb = $quoteimage['sizes'][ $size ];
                            ?>
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $quoteimage['alt']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="col-md-9">
                            <blockquote>
                                <p>“<?php the_sub_field('pull_quote'); ?>”</p>
                                <?php if( get_sub_field('author') ): ?>
                                    <cite>– <?php the_sub_field('author'); ?></cite>
                                <?php endif; ?>
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
                <div class="container full-width-override">
                    <div class="owl-carousel owl-theme">
                        <?php foreach( $images as $image ): ?>
                            <div class="item" style="background-image:url(<?php echo $image['sizes']['sixteen-by-nine']; ?>)"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!--HTML Code -->
        <?php if ( get_row_layout() == 'html_code_block' ) : ?>
            <div class="html-code">
                <div class="container">
                    <?php the_sub_field('html_code'); ?>
                </div>
            </div>
        <?php endif; ?>

    <?php endwhile; endif; ?><!--end post builder flexible content-->


    <!--if chosen in the option the video content can be at the bottom-->
    <?php if (get_field('move_video_to_bottom')): ?>
        <?php if ( has_post_format('video') ) : ?> 
            <div class="spacer"></div>
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

     <!--if chosen in the option the video content can be at the bottom-->
    <?php if (get_field('move_audio_to_bottom')): ?>
        <?php if ( has_post_format('audio') ) : ?> 
            <div class="spacer"></div>
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

    <!--Q and A -->
    <?php if (get_field('before_or_after')): ?>
        <?php get_template_part( 'template-parts/content/single', 'qa' ); ?>
    <?php endif; ?>

<?php wp_reset_query(); ?>
