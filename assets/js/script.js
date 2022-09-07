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
    $('<a class="sub-toggle" href="javascript:void(0);"><i class="fa fa-angle-down ml-2"></i></a>').insertAfter('#primary-menu .menu-item-has-children>a, #primary-menu .page_item_has_children>a');

    $('body').on( 'click', '#primary-menu .sub-toggle', function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle();
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle();
        $(this).children('.fa').first().toggleClass('fa-angle-right').toggleClass('fa-angle-down');
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




