<a href="#notifications" aria-expanded="false" class="nav-panel-toggle" aria-label="View notification and deadlines" role="button" aria-controls="notifications">
    <span class="nav-panel-close"></span>
    <i class="fa fa-bell" aria-hidden="true"><span class="bell-count"></span></i>
    <span class="sr-only">Notification</span>
</a>
<div id="notifications" class="nav-panel" aria-hidden="true">
    <div class="nav-panel-inner">
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
            
        $the_query = new WP_Query( $args ); ?>

        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); 
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

        <?php endwhile; wp_reset_postdata(); ?>
    </ul>

    </div>
</div><!-- END #site-search -->

    