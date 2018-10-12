<?php /* Template Name: Get Social */ ?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-title"><?php the_title( ); ?></h1>
        </div>
        <div class="col-md-6 align-self-center something-to-share">
            <a href="./share-the-goods"><i class="fa fa-share-alt" aria-hidden="true"></i> Have something for us to share?</a>
        </div>
    </div>
    <?php 

    $image = get_field('contest');
    $url = get_field('contest_url');

    if( !empty($image) ): 

        if( $url ): ?>
            <a class="button" href="<?php echo $url ?>" target="_blank">
        <?php endif; ?>
            <div class="content-image">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        <?php if( $url ): ?>
            </a>
        <?php endif; ?>

    <?php endif; ?>
    
    <div class="row">
    
        <div class="col-sm-6">
            <div class="fb-page" data-href="https://www.facebook.com/AthabascaU/" data-tabs="timeline" data-width="500" data-height="560" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AthabascaU/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AthabascaU/">Athabasca University</a></blockquote></div>    
        </div>

        <div class="col-sm-6">
            <a class="twitter-timeline" data-height="600" href="https://twitter.com/AthabascaU?ref_src=twsrc%5Etfw">Tweets by AthabascaU</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
        </div>

    </div>
</div>
<?php get_footer();?>


