jQuery(function($){
    $('#loadmore').click(function(){

        var button = $(this),
            data = {
            'action': 'loadmore',
            'query': athabascau_loadmore_params.posts, 
            'page' : athabascau_loadmore_params.current_page
        };

        $.ajax({
            url : athabascau_loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.find('span').text('Loading...');
            },
            success : function( data ){
                if( data ) { 
                    button.find('span').text( 'Load More Posts' );
                    $('.article-wrap').append(data); // insert new posts
                    athabascau_loadmore_params.current_page++;

                    if ( athabascau_loadmore_params.current_page == athabascau_loadmore_params.max_page ) {
                        button.remove(); 
                        $('.the-end').show();                       
                    }

                } else {
                    button.remove(); 
                    $('.the-end').show();
                }
            }
        });
    });
});