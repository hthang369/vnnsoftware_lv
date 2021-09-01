/**
* Template Name: Lumia - v2.2.1
* Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
!(function($) {
    "use strict";



    // Back to top button
    $(window).scroll(function() {
      if ($(window).scrollTop() > 100) {
        $('#header').addClass('fixed-top');
      }
      else {
        $('#header').removeClass('fixed-top');
      }
      if ($(this).scrollTop() > 100) {
        $('.back-to-top').addClass('active');
      } else {
        $('.back-to-top').removeClass('active');
      }
    });

    $('.back-to-top').click(function() {
      $('html, body').animate({
        scrollTop: 0
      }, 1500);
      return false;
    });

  })(jQuery);
