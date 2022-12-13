"use strict"

import Count from './countDown.js';
import Vaild from './Form_validation.js';

/* index page */ 

/*Start Nav Bar */
let MainNavOffset = $('#main_nav').offset().top;

$(window).scroll(function(){
    let wScroll = $(window).scrollTop();
    if(wScroll > MainNavOffset){
        $('#main_nav').css({'position':'fixed','top':'0','left':'0'});
        $('.page-nav').css({'position':'fixed','top':'45px'});
    }
    else{
      $('#main_nav').css({'position':'relative'})
      $('.page-nav').css({'position':'relative' ,'top':'10px'});
    }
});

// for BtnUp
let CharOffset = $('#characteristics').offset()?.top;
$(window).scroll(function(){
    let wScroll = $(window).scrollTop();
    if(wScroll > CharOffset - 650){
        $('#btnUp').fadeIn(500);
    }
    else{
        $('#btnUp').fadeOut(500);
    }
})

$('#btnUp').click(function(){
    $('body,html').animate({scrollTop:0},1000)
})
/* End */

/*Go to Sections with Smooth scroll */
$("a[href^= '#']").click(function(e){
  let aHref = $(e.target).attr('href');
  let secOffset = $(aHref).offset().top;
  $('body , html').animate({scrollTop:secOffset} , 1000);
})
/* End */

/* slide between sections */
// deals_featured , New_Arrival , best_seller 
$('.featurd_list li').click(function(){

  $(this).addClass('active').siblings().removeClass('active');

  $('#deals_featured .items-sections > div , #New_Arrival .items-sections > div ,#best_seller .items-sections > div').hide();
  
  $($(this).data('content')).fadeIn(500).css('display','flex');
});
/* End slide between sections */

// Main custom_header
$('.selected-category').click(function(){
  $('.custom_header').fadeIn(300);
})
$('.custom_header li').click(function(){
  $('.selected-category').text($(this).text());
  $('.custom_header').fadeOut(300);
})

// All plugins
$(document).ready(function(){
  $('.ui.rating')
  .rating('disable')
;
  // loading
  $('#spinner').fadeOut(500 ,() => {
    $('#spinner').parent().fadeOut(1000 , ( ) => {
        $('.loading').remove();
        $('body').css( "overflow-y","auto" );
    }) 
  });
  // owl-carousel
  $('.owl-carousel').owlCarousel({
    margin:10,
    responsiveClass:true,
    autoplaySpeed:1000,
    nav:false,
    dots:true,
    dotsSpeed:1000,
    responsive:{
        0:{
            items:1,
            dots:false,
        },
        576:{
          items:1,
        }
    }
    });
  // Deals_of_the_Week_Owl
  $('.Deals_of_the_Week_Owl').owlCarousel({
    loop:true,
    dots:false,
    nav:true,
    navSpeed:700,
    responsive:{
      0:{
        items:1
    }
    }
    });
  // brand-owl
  $('.brand-owl').owlCarousel({
  loop:true,
  margin:10,
  dots:false,
  nav:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:5
      }
  }
    });
  // recently_viewed_owl
  $('.recently_viewed_owl').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
    });
  // Latest_Reviews_owl
  $('.Latest_Reviews_owl ').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
    });
  // slick Trends
  $('.trends').slick({
      centerMode: true,
      centerPadding: '60px',
      slidesToShow: 4,
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });

});

// product Images
$('.image_list li > img').click(function(){
  $('.main_img').hide().attr('src',$(this).attr('src')).fadeIn(500);
})

/* Start Subscribe Validation */
// User Subscribe Email
let userSubEmailInput = document.getElementById('userSubEmail'); 
let BtnSubEmail = document.getElementById('btnSubEmail');


function validateUserSubEmail(){
  let regex = /^([A-z][.A-z]{2,15}[0-9]{0,4}@(gmail|yahoo|outlook).com)$/;
  if(regex.test(userSubEmailInput.value) == true){
      BtnSubEmail.disabled =!1;
      return true;
  }
  else{
      BtnSubEmail.disabled =!0;
      return false;
  }
}
userSubEmailInput.addEventListener('keyup',function () {
  validateUserSubEmail();
});

let formSub = document.getElementById('subscrib_form');

formSub.addEventListener('submit',function(e){
      e.preventDefault();
  
      if(validateUserSubEmail() == true){
          BtnSubEmail.disabled =!1;
      }
      else{
          BtnSubEmail.disabled=!0;
      }
});
/* End Subscribe Validation */


// $('.custom_list li').click(function(){
//   let textSrc = $(this).text();
//   $('.selected-category').text(textSrc);
//   $('.custom_list').fadeToggle(500);
// })
// Count();
// Vaild();