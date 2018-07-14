<?php get_header(); ?>

    <div class="container-sm">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">Oops! That page can’t be found.</h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p>It looks like nothing was found at this location. Maybe try a search?</p>
                <form role="search" method="get" id="searchform" class="searchform" action="http://192.168.33.10/AU-Hub/">
                    <div><label class="screen-reader-text" for="s">Search for:</label>
                        <input value="" placeholder="Search the AU News Hub" name="s" id="s" type="text">
                        <input id="searchsubmit" class="btn btn-orange" value="Search" type="submit">
                    </div>
                </form>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </div>

<?php get_footer();
