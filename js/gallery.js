/*global jQuery, Hammer, console */
jQuery(document).ready(function ($) {
    "use strict";
    var current_img = $('.large .inner').length - 1,
        $img_list = $('.large .inner'),
        $mobile_img_list = $('.small .inner'),
        $inner_nav = $('.inner-nav li'),
        hammertime = new Hammer($('.gallery')[0]),
        $btn_next = $('.btn-next'),
        $btn_previous = $('.btn-previous'),
        $caption_list = $('figcaption .inner');
    
    function swap_image(current, next, $list, dir, z_base) {
        if (current !== next) {
            $list.css({'z-index': z_base});
            $($list[current]).css('z-index', z_base + 10);
            //thing move leftwards
            if (dir === "left") {
                $($list[next]).css({'z-index': z_base + 5, 'left': '100%'});
                $($list[current]).animate({'left': '-100%'}, 300);
            } else {
                $($list[next]).css({'z-index': z_base + 5, 'left': '-100%'});
                $($list[current]).animate({'left': '100%'}, 300);
            }
            
            $($list[next]).animate({'left': 0}, 300);
            $inner_nav.removeClass('active');
            $($inner_nav[next]).addClass('active');
        }
        return next;
    }
    function swap_text(current, next, $list) {
        if (current !== next) {
            $list.css({'z-index': 0});
            $($list[next]).css('z-index', 10);
            $($list[current]).animate({'opacity': 0}, 300);
            $($list[next]).animate({'opacity': 1}, 300);
        }
    }
    
    hammertime.on('swipeleft', function () {
        $btn_next.click();
    });
    hammertime.on('swiperight', function () {
        $btn_previous.click();
    });
    
    $btn_next.on('click', function () {
        //next image is after in html list
        var next_img = (current_img + 1) % $img_list.length;
        swap_image(current_img, next_img, $mobile_img_list, 'left', 50);
        swap_text(current_img, next_img, $caption_list);
        current_img = swap_image(current_img, next_img, $img_list, 'left', 0);
    });
    
    $btn_previous.on('click', function () {
        //next image is before in html list
        var next_img = (current_img - 1 + $img_list.length) % $img_list.length;
        swap_image(current_img, next_img, $mobile_img_list, 'right', 50);
        swap_text(current_img, next_img, $caption_list);
        current_img = swap_image(current_img, next_img, $img_list, 'right', 0);
    });
    
    
    $inner_nav.on('click mouseenter', function () {
        //$inner_nav.removeClass('active');
        jQuery(this).addClass('active');
        var next_img = $(this).index('.inner-nav li');
        swap_text(current_img, next_img, $caption_list);
        if (next_img > current_img) {
            swap_image(current_img, next_img, $mobile_img_list, 'left', 50);
            current_img = swap_image(current_img, next_img, $img_list, 'left', 0);
        } else {
            swap_image(current_img, next_img, $mobile_img_list, 'right', 50);
            current_img = swap_image(current_img, next_img, $img_list, 'right', 0);
        }
        
    });
});
