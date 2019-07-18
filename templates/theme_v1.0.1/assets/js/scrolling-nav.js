//jQuery to collapse the navbar on scroll

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top-72
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
/**********Fixed nave ***********/
$(document).ready(function(){if($('.fixed-nav').length>0){var secondaryNav=$('.fixed-nav'),secondaryNavTopPosition=secondaryNav.offset().top,contentSections=$('.content_box');$(window).scroll(function(e){if($(window).scrollTop()>(secondaryNavTopPosition)){secondaryNav.css({'position':'fixed','top':'0'});secondaryNav.addClass('nav_fixed');contentSections.css('margin-top',secondaryNav.height());}
else{secondaryNav.css({'position':'relative','top':'0'});secondaryNav.removeClass('nav_fixed');contentSections.css('margin-top','0');}});if($('#no_fixed').length<0){$('.fixed-nav-trigger').on('click',function(event){event.preventDefault();$(this).toggleClass('menu-is-open');secondaryNav.find('ul').toggleClass('is-visible');});secondaryNav.find('ul a').on('click',function(event){event.preventDefault();if($(this).parent('li').hasClass('active')!='true'){secondaryNav.find('ul li').removeClass('active');$(this).parent('li').addClass('active');}
var target=$(this.hash);$('body,html').animate({'scrollTop':target.offset().top-secondaryNav.height()+1},360);$('.fixed-nav-trigger').removeClass('menu-is-open');secondaryNav.find('ul').removeClass('is-visible');});}}});