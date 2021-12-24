 $('#play').magnificPopup({
    items: {
           src: 'https://www.youtube.com/watch?v=7eo8XpT4CmM'
       },
    type: 'iframe',
    iframe: {
              markup: '<div class="mfp-iframe-scaler">'+
                      '<div class="mfp-close"></div>'+
                      '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                      '</div>', 
          patterns: {
              youtube: {
                    index: 'youtube.com/', 
                    id: 'v=', 
                    src: '//www.youtube.com/embed/%id%?autoplay=1' 
                  }
               },
               srcAction: 'iframe_src', 
       }
});

jQuery("#blogslider").owlCarousel({
  items: 4,
  autoplay: true,
  rewind: true, /* use rewind if you don't want loop */
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  dots: true,

  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 3
    },

    1024: {
      items: 4
    },

    1366: {
      items: 4
    },

  }
});

$(document).ready(function(){
jQuery("#categories").owlCarousel({
  loop:true,
  nav:false,
  dots:false,
  autoWidth:false,
  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 2
    },

    1024: {
      items: 3
    },

    1366: {
      items: 3,
      mergeFit:true
    },

  }
});

var selector = $('.newSlider');

$('.my-next-button').click(function() {
  selector.trigger('next.owl.carousel');
});

$('.my-prev-button').click(function() {
  selector.trigger('prev.owl.carousel');
});

})

$(document).ready(function(){
  jQuery("#testimonials").owlCarousel({
  loop:true,
  nav:false,
  dots:false,
  autoWidth:false,
  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 1
    },

    1024: {
      items: 1
    },

    1366: {
      items: 1,
     
    },

  }
});


var selector = $('.testSlider');


$('.my-next-button1').click(function() {
  selector.trigger('next.owl.carousel');
});

$('.my-prev-button1').click(function() {
  selector.trigger('prev.owl.carousel');
});

})

// scroll to top
var $window = $(window);
  $window.on('scroll', function () {
        // Sticky menu 
    var scroll = $window.scrollTop();
    if (scroll < 300) {
      $(".sticky").removeClass("is-sticky");
    } else {
      $(".sticky").addClass("is-sticky");
    }
        
        // Scroll To Top
    if ($(this).scrollTop() > 600) {
      $('.scroll-top').removeClass('not-visible');
    } else {
      $('.scroll-top').addClass('not-visible');
    }
  });
  
  $('body').on('click', '.scroll-top', function (e) {
        e.preventDefault();
    $('html,body').animate({
      scrollTop: 0
    }, 1000);
  });