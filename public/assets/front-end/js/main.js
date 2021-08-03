(function ($) {
"use strict";
// TOP Menu Sticky
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 400) {
    $("#sticky-header").removeClass("sticky");
    $('#back-top').fadeIn(500);
	} else {
    $("#sticky-header").addClass("sticky");
    $('#back-top').fadeIn(500);
	}
});


$(document).ready(function(){

  // mobile_menu
  var menu = $('ul#navigation');
  if(menu.length){
  	menu.slicknav({
  		prependTo: ".mobile_menu",
  		closedSymbol: '+',
  		openedSymbol:'-'
  	});
  };

  // review-active
  $('.slider_active').owlCarousel({
    loop:true,
    margin:0,
    items:1,
    autoplay:true,
    navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
      nav:true,
    dots:false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        767:{
            items:1,
            nav:false,
        },
        992:{
            items:1,
            nav:false
        },
        1200:{
            items:1,
            nav:false
        },
        1600:{
            items:1,
            nav:true
        }
    }
  });


  // review-active
  $('.expert_active').owlCarousel({
    loop:true,
    margin:10,
    items:1,
    autoplay:true,
    navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
      nav:true,
    dots:false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    responsive:{
        0:{
            items:2,
            nav:false
        },
        767:{
            items:5,
            nav:false
        },
        992:{
            items:8,
        },
        1200:{
            items:4,
        },
        1500:{
            items:4
        }
    }
  });



  if (document.getElementById('default-select')) {
    $('select').niceSelect();
  }

});
})(jQuery);	