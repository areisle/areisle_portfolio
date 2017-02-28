/*global jQuery, console*/
jQuery(document).ready(function ($) {
    "use strict";
    //get the nav items
    var $nav_items = $('#inner-post-navigation a'),
        $sections = $('#main.single-work > section'),
        $window = $(window),
        $page = $('body, html'),
        $floating_box = $('#floating-box'),
        buffer = 59;
    
    function scrollToSection(sectionid) {
        $page.animate({
            scrollTop: $(sectionid).offset().top - buffer + 1 + 'px'
        }, 500);
    }
    
    $nav_items.on('click', function (e) {
        e.preventDefault();
        
        var sectionid = $(this).attr('href');
        scrollToSection(sectionid);
        //scrollSections();
        
    });
    //get section top positions --- will have to do all of this on resize as well
    
    function scrollSections(changeclass) {
        var count = $sections.length,
            current_section,
            $active = $('#inner-post-navigation a.active'),
            borderWidth = 8;
        if (count < 2) {
            return;
        } else {
            if ($window.scrollTop() < $($sections[1]).offset().top - buffer) {
                //in first section
                //switch active class to first nav item
                $nav_items.removeClass('active');
                $($nav_items[0]).addClass('active');
                
            }
            for (current_section = 1; current_section < count - 1; current_section += 1) {
                //index num so  actually section 2
                if ($window.scrollTop() >= ($($sections[current_section]).offset().top - buffer) && $window.scrollTop() < $($sections[current_section + 1]).offset().top - buffer) {
                    //in second section
                    //switch active class to second nav item
                    $nav_items.removeClass('active');
                    $($nav_items[current_section]).addClass('active');
                }
            }
            if (($window.scrollTop() >= $($sections[count - 1]).offset().top - buffer) || ($(document).height() - $window.scrollTop() - buffer <= $window.height())) {
                //in first section
                //switch active class to first nav item
                console.log("youre not crazy");
                $nav_items.removeClass('active');
                $($nav_items[count - 1]).addClass('active');
            }
            $floating_box.css('top', $('#inner-post-navigation a.active').offset().top + $('#inner-post-navigation a.active').height() / 2 - $floating_box.height() / 2 - $window.scrollTop() - borderWidth);
        }
    }
    $window.on('scroll resize', function () {
        scrollSections();
    });
    scrollSections();
});