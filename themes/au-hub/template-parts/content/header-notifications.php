
    <ul>
        <?php 

        $today = date('Ymd');

        $args = array(
            'post_type' => 'notification',
            'posts_per_page' => 5,
            'meta_query' => array(
                 array(
                    'key'		=> 'date',
                    'compare'	=> '>=',
                    'value'		=> $today,
                )
            ),
        );
            
        $the_query = new WP_Query( $args ); 
        
        if ( $the_query -> have_posts() ) :

            while ($the_query -> have_posts()) : $the_query -> the_post(); 
            $description = get_field('description');
            $date = get_field('date');
            $link = get_field('link');
        ?>
           

            <?php if( $link ): ?>
                <li>
                    <a href="<?php echo $link ?>">
                        <div class="description">
                            <?php echo $description ?>
                        </div>
                        <?php if( $date ): ?>
                            <div class="date">
                                <?php echo $date ?>
                            </div>
                        <?php endif; ?>
                        <span class="fake-link">Find out more <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <div class="description">
                        <?php echo $description ?>
                    </div>

                    <?php if( $date ): ?>
                        <div class="date">
                            <?php echo $date ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
        
        <?php endwhile; else : ?>
            <p class="text-center zero-all"><?php esc_html_e( 'No updates currently' ); ?></p>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
        
    </ul>


    