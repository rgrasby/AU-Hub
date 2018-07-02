    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'stitchcreative' ); ?>">

        <?php wp_nav_menu( array(
            'theme_location' => 'top',
            'menu_id'        => 'top-menu',
            'link_before'    => '<span class="menu-title">',
            'link_after'     => '</span>'
        ) ); ?>

    </nav><!-- #site-navigation -->