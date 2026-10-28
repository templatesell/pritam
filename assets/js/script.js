jQuery(document).ready(function($){
    "use strict";

    /*==============================================
                      SIDE MENU
    ===============================================*/
        $('#TopBar .menu-btn a' ).click(function(){
        $('#TopBar .navbar-menu').toggleClass('menu-active'); 
        var element = document.querySelector( '.navbar-menu.menu-active' );
        if( element ) {
        $(document).on('keydown', function(e) {
            var focusable = element.querySelectorAll( 'input, a, button' );
            focusable = Array.prototype.slice.call( focusable );
            focusable = focusable.filter( function( focusableelement ) {
                return null !== focusableelement.offsetParent;
            } );
            var firstFocusable = focusable[0];
            var lastFocusable = focusable[focusable.length - 1];
            focus_trap( firstFocusable, lastFocusable, e );
            })
        }
    });
    
    $('.main-menu-close').click(function() {
        $('#TopBar .navbar-menu').removeClass('menu-active');
        var focusElement = $( this ).data( 'focus' );
        $( focusElement ).focus();
    });
    var KEYCODE_TAB = 9;
    function focus_trap( firstFocusable, lastFocusable, e ) {
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
                if (document.activeElement === firstFocusable) {
                    lastFocusable.focus();
                    e.preventDefault();
                }
            } else /* tab */ {
                if ( document.activeElement === lastFocusable ) {
                    firstFocusable.focus();
                    e.preventDefault();
                }
            }
        }
    } 
    /**
     * Primary menu sub-toggle
     */
    var pritamExpand   = ( window.pritam_menu && pritam_menu.expand ) ? pritam_menu.expand : 'Expand child menu',
        pritamCollapse = ( window.pritam_menu && pritam_menu.collapse ) ? pritam_menu.collapse : 'Collapse child menu';

    $('<button type="button" class="sub-toggle" aria-expanded="false">' +
        '<i class="fa fa-angle-down ml-2" aria-hidden="true"></i>' +
        '<span class="screen-reader-text">' + pritamExpand + '</span>' +
        '</button>').insertAfter('#primary-menu .menu-item-has-children>a, #primary-menu .page_item_has_children>a');

    $('body').on( 'click', '#primary-menu .sub-toggle', function() {
        var $toggle = $(this),
            open    = $toggle.attr('aria-expanded') !== 'true';

        $toggle.parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle();
        $toggle.parent('.page_item_has_children').children('ul.children').first().slideToggle();
        $toggle.children('.fa').first().toggleClass('fa-angle-right').toggleClass('fa-angle-down');
        $toggle.attr('aria-expanded', open ? 'true' : 'false');
        $toggle.children('.screen-reader-text').text( open ? pritamCollapse : pritamExpand );
    });

    /*==============================================
                  SETTING HEIGHT OF DIV
    ===============================================*/

    var cont_height = $(".cont-form-sec").innerHeight();
    $(".cont-img").css({
      "height": cont_height
    });


    /*==============================================
                      PAGE LOADER
    ===============================================*/

    $('.preloader').fadeOut();



  /*==============================================
                      SEARCH PAGE
    ===============================================*/

    $(".search-btn").on("click", function(){
      $(".search-page").addClass("active");
      var element = document.querySelector( '.search-page.active' );
        if( element ) {
            $(document).on('keydown', function(e) {
                var focusable = element.querySelectorAll( 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                var firstFocusable = focusable[0];
                var lastFocusable = focusable[focusable.length - 1];
                focus_trap( firstFocusable, lastFocusable, e );
            })
        }
    });
    $(".close-search").on("click", function(){
      $(".search-page").removeClass("active");
      var focusElement = $( this ).data( 'focus' );
      $( focusElement ).focus();
    });
     $( document ).on( 'keydown', function( event ) {
        if ( event.keyCode === 27 ) {
            event.preventDefault();
            $( '.search-page' ).removeClass( 'active' );
        }
    })
    

});




