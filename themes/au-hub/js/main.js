( function($) {

    $mainHeader = $('#main-header'),
    $mainNavContainer = $('#main-navigation-container'),
    $mainNavigationInner = $('#main-navigation-inner'),
    $scrollTop = $(window).scrollTop(),
    $headerHeight = $mainHeader.outerHeight(),
    $navAnchor = $('#nav-anchor'),
    $headerShiv = $('.header-shiv')
    
    //single post slider
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        items: 1
    })
    
   
    $parentCategory = $(".categories li:first-child a:contains('AU News Hub')");
    $parentCategory.hide();
    $parentCategory.next().hide();
 


    
    /*
    Sticky Header for #main-header
    =====================================================================*/
    var stickyMainNav = (function () {

        //variables
        var $stickyMainNavTop = $mainHeader.offset().top;
           
        //bind scroll event
        $(window).on('scroll', stickNav);

        function stickNav(){
            //vertical scrollbar position of viewport
            var $scrollTop = $(window).scrollTop();
            
            //nav is sticky
            if ($scrollTop > $stickyMainNavTop) { 
                $mainHeader.addClass('sticky');
                $('body').addClass('header-stuck');
                $headerShiv.addClass('header-sticky');
                var $headerHeight = $mainHeader.outerHeight();
            //nav is not sticky
            } else {
                $('body').removeClass('header-stuck');
                $mainHeader.removeClass('sticky');
                $headerShiv.removeClass('header-sticky');
                $headerHeight = $mainHeader.outerHeight();   
            }
        };
        
        return{
            stickNav: stickNav
        }
        
    }());

    stickyMainNav.stickNav();   
    
    /*
    Homepage Slide In Nav
    =====================================================================*/
     var sidebarNavSlideIn = (function () {

        //variables
        var $navOpenBtn = $('#open-main-nav'),
            $contentContainer = $('#content-container'),
            $hamburger = $('.hamburger'),
            $breadcrumb = $('.breadcrumb');
         
        //bind events
        $navOpenBtn.on('click', slideInNav);
        $(window).on('click', slideOutNav);
         
        //slide #main-navigation-container into visible canvas
        function slideInNav() {
            $mainNavContainer.toggleClass('visible');   
            $contentContainer.toggleClass('main-nav-showing');
            $breadcrumb.toggleClass('push-over');
        }
         
        //slide #main-navigation-container off canvas
        function slideOutNav(e){
            var target = e.target; 
            //allow close button to slide nav off canvas
            if ( !jQuery(target).is('#main-navigation-container *, #open-main-nav, #open-main-nav *') ) {
                //remove visible class so it slides off canvas
                $mainNavContainer.removeClass('visible');
                $contentContainer.removeClass('main-nav-showing');
                $breadcrumb.removeClass('push-over'); 
            }
        }
         
    }());
       
    
  /*
    Sticky left navigation that stops at footer
    =====================================================================*/
    var sidebarNav = (function () {

        //bind events
        $(window).on('scroll', fixedMainNav);
        
        //fix #main-navigation-container to the far left. 
        //Do a little magic to stop it at the footer
        function fixedMainNav(){
            //delcare variables
            var $headerHeight = $mainHeader.outerHeight(),
                $window_top = $(window).scrollTop() + $headerHeight,
                $footer_top = $("#site-footer").offset().top,
                $div_top = $navAnchor.offset().top,
                $div_height = $mainNavContainer.height();

            //sticky sidebar is at the bottom of viewport
            if ($window_top + $div_height > $footer_top){
                $mainNavContainer.removeClass('sticky');
                $mainNavContainer.removeClass('at-top');
                $mainNavContainer.css({
                    'position': 'absolute',
                    'bottom': 0,
                    'top': 'auto'
                });
            //sticky sidebar is in middle of viewport
            } else if ($window_top > $div_top) {
                $mainNavContainer.addClass('sticky');
                $mainNavContainer.removeClass('at-top');
                $mainNavContainer.css({
                    'position': 'fixed',
                    'bottom': 'auto',
                    'top': 0
                });
            //sticky sidebar is at the top
            } else {
                $mainNavContainer.removeClass('sticky');
                $mainNavContainer.addClass('at-top');
                $mainNavContainer.css({
                    'position': 'fixed',
                    'bottom': '0',
                    'top': 0
                });
            }
        }     
        

        fixedMainNav()
        
        return {
            fixedMainNav: fixedMainNav,
        };
 
    }());   
}) (jQuery);