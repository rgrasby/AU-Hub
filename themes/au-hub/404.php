<?php get_header();

    //$broken_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //mail("rgrasby@athabascau.ca", "AU News ", $broken_link, "From: communications@athabascau.ca\n")
?>
    <div class="container-sm">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">Oops! That page can’t be found.</h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p>It looks like nothing was found at this location. Maybe try a search?</p>
                <form role="search" method="get" id="searchform" class="searchform" action="http://news.athabascau.ca"0>
                    <div><label class="screen-reader-text" for="s">Search for:</label>
                        <input value="" placeholder="Search the AU News Hub" name="s" id="s" type="text">
                        <input id="searchsubmit" class="btn btn-orange" value="Search" type="submit">
                    </div>
                </form>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </div>

<?php get_footer();
