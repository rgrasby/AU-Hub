<div class="container-sm">
    <div class="meta-box">
        
        <div class="shield-logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 145"><title>Athabasca University Shield</title><path class="shield" d="M1.3 4v88.3c0 29.3 48.7 49.4 48.7 49.4s48.7-20 48.7-49.4V4H1.3zM81 92.3c0 9.7-16.5 22.5-31 29.9-14.7-7.5-31-20.1-31-29.9V21.7h62v70.6z"></path></svg>
        </div>
        
        <div class="meta-row">
            <strong>Filed Under: </strong>
            <ul class="categories">
                <li><?php echo get_the_category_list('<span> / </span>'); ?></li>
            </ul>
        </div>

        <div class="meta-row">
            <strong>Published:</strong>
            <ul>
                <li><?php echo get_the_date(); ?></li>
            </ul>
        </div>

        <?php if(has_tag()) : ?>
        <div class="meta-row">
            <strong>Tagged In:</strong>
            <?php echo get_the_tag_list('<ul><li>',' , ','</li></ul>'); ?>
        </div>
        <?php endif; ?>
        
    </div>
</div>