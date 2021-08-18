/*----------------------------- Navigation --------------------------*/
jQuery(window).on('scroll', function (){
  if (jQuery(window).scrollTop() > 700){
    jQuery('#masthead').addClass('navbar-fixed-top').slideDown(500);
  } else {
    jQuery('#masthead').removeClass('navbar-fixed-top').slideDown(500);
  }
});


/*------------- Scroll to Top -----------------*/
$('#scroll-to-top').click(function(){
  $("html,body").animate({ scrollTop: 0 }, 1000);
  return false;
});


  // NiceScroll
  //==================================================================================
  jQuery(document).ready(function($) {

    "use strict";

    //Check IE11
    function IEVersion() {
      if (!!navigator.userAgent.match(/Trident\/7\./)) {
        return 11;
      }
    }

    if (IEVersion() != 11) 
    {
      $('html').niceScroll({
        cursorcolor: "#1A212C",
        zindex: '99999',
        cursorminheight: 60,
        scrollspeed: 80,
        cursorwidth: 7,
        autohidemode: true,
        background: "#aaa",
        cursorborder: 'none',
        cursoropacitymax: .7,
        cursorborderradius: 0,
        horizrailenabled: false
      });
    }


    // LAZYLOAD TRIGGER START
    $("img.lazy").lazyload({threshold : 200, effect : "fadeIn"});

    $('.image-link').magnificPopup({type:'image'});

    $('.youtube-video, .vimeo-video, .popup-gmaps').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false,
    });

  });


  /*------------------- Parallax ------------------*/
  jQuery(window).load(function(){
    $(".top-slider").parallax("50%", 0.5);
    $(".blog-head").parallax("50%", 0.5);
    $(".shortcode-head").parallax("50%", 0.5);
    $(".portfolio-head").parallax("50%", 0.5);
    $(".error-head").parallax("50%", 0.5);
  });



  /*------------  Skill Progress bar  ---------------*/
  $( '.progress-bar' ).each(function() { 
    var  barWidth = $(this).data('progress-value');
    $(this).css({
      'width': barWidth
    });
  });



  /*--------------------------  Portfolio -----------------------*/
  (function ($) {
    "use strict";
    var $container = $('#works-item'),
    colWidth = function () {
      var w = $container.width(), 
      columnNum = 1,
      columnWidth = 0;
      if (w > 960) {
        columnNum  = 3;
      } 
      else if (w > 640) {
        columnNum  = 3;
      }  
      else if (w > 360) {
        columnNum  = 2;
      } 
      columnWidth = Math.floor(w/columnNum);
      $container.find('.item').each(function() {
        var $item = $(this),
        multiplier_w = $item.attr('class').match(/item-w(\d)/),
        multiplier_h = $item.attr('class').match(/item-h(\d)/),
        width = multiplier_w ? columnWidth*multiplier_w[1] : columnWidth,
        height = multiplier_h ? columnWidth*multiplier_h[1]*0.7-10 : columnWidth*0.7-5;
        $item.css({
          width: width,
          height: height
        });
      });
      return columnWidth;
    },
    isotope = function () {
      $container.isotope({
        resizable: true,
        itemSelector: '.item',
        masonry: {
          columnWidth: colWidth(),
          gutterWidth: 10
        }
      });
    };
    isotope();
    $(window).smartresize(isotope);

    $('.portfolioFilter a').click(function(){
      $('.portfolioFilter .current').removeClass('current');
      $(this).addClass('current');

      var selector = $(this).attr('data-filter');
      $container.isotope({
        filter: selector,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        }
      });
      return false;
    }); 
  }
  (jQuery)
  );



/*--------------------------  Portfolio-2 -----------------------*/
(function ($) {
  "use strict";

  var $container = $('#works-item-2'),
  colWidth = function () {
    var w = $container.width(), 
    columnNum = 1,
    columnWidth = 0;
    if (w > 960) {
      columnNum  = 3;
    } 
    else if (w > 640) {
      columnNum  = 3;
    }  
    else if (w > 360) {
      columnNum  = 2;
    } 
    columnWidth = Math.floor(w/columnNum);
    $container.find('.item').each(function() {
      var $item = $(this),
      multiplier_w = $item.attr('class').match(/item-w(\d)/),
      multiplier_h = $item.attr('class').match(/item-h(\d)/),
      width = multiplier_w ? columnWidth*multiplier_w[1] : columnWidth,
      height = multiplier_h ? columnWidth*multiplier_h[1]*0.7-10 : columnWidth*0.7-10;
      $item.css({
        width: width,
        height: height
      });
    });
    return columnWidth;
  },
  isotope = function () {
    $container.isotope({
      resizable: true,
      itemSelector: '.item',
      masonry: {
        columnWidth: colWidth(),
        gutterWidth: 10
      }
    });
  };
  isotope();
  $(window).smartresize(isotope);

  $('.portfolioFilter a').click(function(){
    $('.portfolioFilter .current').removeClass('current');
    $(this).addClass('current');

    var selector = $(this).attr('data-filter');
    $container.isotope({
      filter: selector,
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      }
    });
    return false;
  }); 
}
(jQuery)
);



/*------------------- Team Member Slider  --------------*/
var teamSlider = $("#testimonial-slider");

teamSlider.owlCarousel({
  autoPlay : 3000,
  stopOnHover : true,
  pagination : true,
  paginationNumbers: false,

  itemsCustom : [
  [0, 1],
  [450, 1],
  [600, 1],
  [700, 2],
  [1000, 2],
  [1200, 2],
  ],
        // Responsive 
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
      });



/*------------------- Team Member Slider  --------------*/
var teamSlider = $("#client-slider");

teamSlider.owlCarousel({
  autoPlay : 3000,
  stopOnHover : true,
  pagination : true,
  paginationNumbers: false,

  itemsCustom : [
  [0, 1],
  [450, 2],
  [600, 3],
  [700, 4],
  [1000, 5],
  [1200, 5],
  ],
        // Responsive 
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
      });




/*------------------- Similar Project Slider  --------------*/
var teamSlider = $("#similar-project-slider");

teamSlider.owlCarousel({
  autoPlay : 3000,
  stopOnHover : true,
  pagination : true,
  paginationNumbers: false,

  itemsCustom : [
  [0, 1],
  [450, 2],
  [600, 3],
  [700, 4],
  [1000, 5],
  [1200, 5],
  ],
        // Responsive 
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
      });
