<?php
// set status
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
 
// site info
$blog = 'The Hub';
$site = 'news.athabascau.ca/';
$email = 'rgrasby@athabascau.ca';
  
// referrer
if (isset($_SERVER['HTTP_REFERER'])) {
$referer = clean($_SERVER['HTTP_REFERER']);
} else {
$referer = "undefined";
}
// request URI
if (isset($_SERVER['REQUEST_URI']) && isset($_SERVER["HTTP_HOST"])) {
$request = clean('http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
} else {
$request = "undefined";
}
// query string
if (isset($_SERVER['QUERY_STRING'])) {
$string = clean($_SERVER['QUERY_STRING']);
} else {
$string = "undefined";
}
// IP address
if (isset($_SERVER['REMOTE_ADDR'])) {
$address = clean($_SERVER['REMOTE_ADDR']);
} else {
$address = "undefined";
}
// user agent
if (isset($_SERVER['HTTP_USER_AGENT'])) {
$agent = clean($_SERVER['HTTP_USER_AGENT']);
} else {
$agent = "undefined";
}
// identity
if (isset($_SERVER['REMOTE_IDENT'])) {
$remote = clean($_SERVER['REMOTE_IDENT']);
} else {
$remote = "undefined";
}
// log time
$time = clean(date("F jS Y, h:ia", time()));
 
// sanitize
function clean($string) {
$string = rtrim($string);
$string = ltrim($string);
$string = htmlentities($string, ENT_QUOTES);
$string = str_replace("\n", "
", $string);
 
if (get_magic_quotes_gpc()) {
$string = stripslashes($string);
}
return $string;
}
 
$message =
"TIME: " . $time . "\n" .
"*404: " . $request . "\n" .
"SITE: " . $site . "\n" .
"THEME: " . $theme . "\n" .
"REFERRER: " . $referer . "\n" .
"QUERY STRING: " . $string . "\n" .
"REMOTE ADDRESS: " . $address . "\n" .
"REMOTE IDENTITY: " . $remote . "\n" .
"USER AGENT: " . $agent . "\n\n\n";
 
mail($email, "404 Alert: " . $blog . , $message, "From: $email");
 
?>

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
