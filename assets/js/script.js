jQuery(document).ready(function($){
    "use strict";
        "use strict";
    

    /*==============================================
                      SIDE MENU
    ===============================================*/

     $( '#TopBar .menu-btn' ).click(function(){
        $('.side-menu').toggleClass('active'); 
        var element = document.querySelector( '.side-menu.active' );
        if( element ) {
            $(document).on('keydown', function(e) {
                var focusable = element.querySelectorAll( 'input, a, button' );
                focusable = Array.prototype.slice.call( focusable );
                focusable = focusable.filter( function( focusableelement ) {
                    return null !== focusableelement.offsetParent;
                } );
                var firstFocusable = focusable[0];
                var lastFocusable = focusable[focusable.length - 1];
                matina_focus_trap( firstFocusable, lastFocusable, e );
            })
        }
    });
    //  $('.main-menu-close').click(function() {
    //     $('#TopBar .side-menu').removeClass('open-menu');
    //     var focusElement = $( this ).data( 'focus' );
    //     $( focusElement ).focus();
    // });

    $(".close-sidemenu").on("click", function(){
        $(".side-menu").removeClass("active");
        $(".menu-btn").removeClass("active");
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






    //$(".side-menu ul li.menu-item-has-children ul") .removeClass('sub-menu');
    // $(".side-menu ul").parent().addClass("menu-item-has-children");
    // $(".side-menu li.menu-item-has-children > a").on("click", function() {
    //     alert('goes here');
    //     //debugger;
    //   $(this).parent().toggleClass("active").siblings().removeClass("active");
    //   $(this).next("ul").slideToggle();
    //   $(this).parent().siblings().find("ul").slideUp();
    //   return false;
    // });


    $('.navigation li:has(ul)').each(function () {
        $(this).append('<span class="dropdown-plus"></span>');
        $(this).addClass('dropdown_menu');
    });

     $('.dropdown-plus').on("click", function () {
         $(this).prev('ul').slideToggle(300);
         $(this).toggleClass('dropdown-open');
     });

    // $('.dropdown_menu a').append('<span></span>');


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




