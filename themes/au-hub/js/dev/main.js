( function($) {

    var $mainHeader = $('#main-header'),
        $mainNavContainer = $('#main-navigation-container'),
        $mainNavigationInner = $('#main-navigation-inner'),
        $scrollTop = $(window).scrollTop(),
        $headerHeight = $mainHeader.outerHeight(),
        $navAnchor = $('#nav-anchor'),
        $headerShiv = $('.header-shiv'),
        $headerActions = $('#header-actions'),
        $contentHeader = $('#content-container'),
        resizeTimer,
        breakpoint = 576

    
    //single post slider
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        items:1
    })
 
    $('.equal-row').matchHeight();
    $('.equal-no-row').matchHeight('false');
    
    $('.featured').on('click', function(e){
        if( !$(e.target).is('.featured-content .categories *') ){
          window.location = $(this).find('a').attr('href'); 
          return false;
        }
    });
    
    /* 
    Check if window resizing is done and call functions when resizing is complete
    =====================================================================*/
    $(window).on('resize', function(e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            $headerHeight = $mainHeader.outerHeight(),
            $headerHeightt = $headerHeight,
            windowWidth = checkWindowWidth(); 
            
            //stick navigation if necessary
            stickyMainNav.stickNav();
            
            if(checkWindowWidth()){
                sidebarNav.fixedMainNav();
            } else{
                $mainNavContainer.attr("style", "");
            }
    
        }, 250);
    });
      
    /* 
    Check window width (scrollbar included)   
    =====================================================================*/
    function checkWindowWidth() {
		var e = window, 
            a = 'inner';
        if (!('innerWidth' in window )) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        if ( e[ a+'Width' ] >= breakpoint ) {
			return true;
		} else {
			return false;
		}
	}
    
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
    Navigation panels for Notifcations and Search
    =====================================================================*/
    var navPanels = (function () {
        //variables
        var $navPanelToggle = $('.nav-panel-toggle'),
            $navPanel = $('.nav-panel'),
            $body = $('body');
        
        //bind events
        $navPanelToggle.on('click', openwithspacebar);
        $navPanelToggle.on('click', openNavPanel);
        $(document).on('click', closeNavPanels);
        
        function openNavPanel(e) {
            var $this = $(this),
                $activePanel = $(this).attr('href'); 
            
            //position .nav-panels based on if #main-header is sticky
            stickyMainNav.stickNav();
            
            e.preventDefault();
            
            $navPanelToggle.not($this).removeClass('active').attr("aria-expanded", 'false');
            
            $navPanel.removeClass('is-visible').attr("aria-hidden", 'true');
            
            $this.toggleClass('active');
            
            //automatically focus to search input on click of #search-trigger a
            if($activePanel === '#site-search'){
                $('#au-search').find('input[type=text]').val('');
            }
            
            if ($navPanelToggle.hasClass('active')){
                $this.attr("aria-expanded", 'true');
                $($activePanel).addClass('is-visible').attr("aria-hidden", 'false');
                $body.addClass('nav-panel-visible');
                
            } else {
                $($activePanel).removeClass('is-visible').attr("aria-hidden", 'true');
                $this.attr("aria-expanded", 'false');
                $body.removeClass('nav-panel-visible');
            } 
        }
        
        function openwithspacebar(e) {
            e.stopPropagation();
            if (e.keyCode == 32) {
                openNavPanel();
            }
        }  
        /*
        Prevents iOS from scrolling even when overflow: hidden is applied
        =====================================================================*/ 
        $('.nav-panel-visible').on('touchmove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
        
        //close nav panels if clicked anywhere outside of them
        function closeNavPanels(event){
            if(event){
                var target = event.target; 
                if (!jQuery(target).is('#header-actions *') ) {
                    $navPanelToggle.removeClass('active').attr("aria-expanded", 'false');
                    $navPanel.removeClass('is-visible').attr("aria-hidden", 'true');
                    $body.removeClass('nav-panel-visible');    
                }
            }
        }
        
    }());
                     
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
        $navOpenBtn.on('onkeydownopen', openWithsSpacebar);
        $(window).on('click', slideOutNav);
         
        //slide #main-navigation-container into visible canvas
        function slideInNav() {
            $mainNavContainer.toggleClass('visible');   
            $contentContainer.toggleClass('main-nav-showing');
            $breadcrumb.toggleClass('push-over');
            //stick navigation if necessary
            stickyMainNav.stickNav();            
            $hamburger.toggleClass('is-active'); 
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
                $('#open-main-nav .hamburger').removeClass('is-active');
            }
        }
         
        /*
        Prevents iOS from scrolling even when overflow: hidden is applied
        =====================================================================*/ 
        $('.nav-panel-visible').on('touchmove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
        
        //close nav panels if clicked anywhere outside of them
        function closeNavPanels(e){
            if(e){
                var target = e.target; 
                if (!jQuery(target).is('#au-right-nav *') ) {
                    $navPanelToggle.removeClass('active').attr("aria-expanded", 'false');
                    $navPanel.removeClass('is-visible').attr("aria-hidden", 'true');
                    $body.removeClass('nav-panel-visible');    
                }
            }
        }
         
        function openWithsSpacebar(e) {
            if (e.keyCode == 32) {
                e.stopPropagation();
                slideInNav();
                closeNavPanels();
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

            if(checkWindowWidth()){
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
        }   
        
        fixedMainNav();
        
        return {
            fixedMainNav: fixedMainNav
        };
 
    }());   
    
    
    /* 
    Fade Hero content on scroll
    =====================================================================*/
    var fadeStart = 100,
        fadeUntil = 700,
        $fading = $('.hero-inner');

    $(window).on('scroll', function(){
        var offset = $(document).scrollTop(),
            opacity = 0;
        if( offset<=fadeStart ){
            opacity = 1;
        }else if( offset<=fadeUntil ){
            opacity = 1 - offset/fadeUntil;
        }
        $fading.css('opacity',opacity);
    });
    
    /*
    Notification bell   
    =====================================================================*/
    var notificationBell = (function () {
        $bell = $('.fa-bell');
        $bellCount = $('.bell-count');
        $count = $('#notifications ul li').length;
        
        if($count > 0){
            $bell.addClass('shakeitbaby animated tada'); 
            $bellCount.text($count);
        } else {
            $bellCount.hide();    
        }
    }());        
    
    /*
    Set notification dropdown height     
    =====================================================================*/
    var notificationHeight = (function () {
        $notePanel = $('#notifications');
        $notePanelInner = $('#notifications .nav-panel-inner');
        $innerPanelHeight = $notePanelInner.outerHeight();
        windowWidth = checkWindowWidth();   
        
        if(checkWindowWidth()){
            $notePanel.css( 'height', $innerPanelHeight);
        }

    }());      
    
    /* 
    Count faculty items. Change classes accordingly
    =====================================================================*/
    var facultHome = (function () {
        $subStoryCount = $('#faculty-stories .horizontal').length;
        if($subStoryCount == 0){
            $('#faculty-stories .row .col-md-6:first-of-type').removeClass('col-md-6').addClass('col-md-12');  
        }
    }()); 
    
}) (jQuery);