jQuery(window).on('load', function($){    
//masonry start
    var $grid = jQuery('#masonry-loop').imagesLoaded( function() {
    $grid.masonry({
    // options
    itemSelector: '.masonry-post, .one-column, .two-column',
    columnWidth: '.col-lg-6',
    percentPosition: true
    });
});  
//masonry end
});