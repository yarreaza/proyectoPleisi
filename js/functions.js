
// $("#owl-marcas").owlCarousel({
//     autoPlay: true,
//     navigation: false,
//     pagination: false,
//     responsive: true,
//     responsiveRefreshRate: 200,
//     responsiveBaseWidth: window,
//     slideSpeed: 400,
//     paginationSpeed: 400,
//     items: 3
// });

$(function() {
    'use strict';
    if ($("#contact-form").length > 0) {
        $("#contact-form").validationEngine('attach', {
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status === true) {
                    $('#form-submit-wrapper').empty();
                    $('#form-submit-wrapper').addClass('loading');
                    var form_data = $('#contact-form').serialize();
                    $('#btn_submit').attr({disabled: 'disabled', value: 'ENVIANDO...'});
                    $.post('../contacto-submit', form_data, function(data) {
                        $('#form-submit-wrapper').html(data);
                        $('#form-submit-wrapper').removeClass('loading');
                        $('#btn_submit').attr({disabled: 'disabled', value: 'LISTO!'});
                    });
                }
            }
        });
    }
});



$(document).ready(function() {
    $("html").niceScroll({cursorcolor: "#355D93", cursorborder: "1px solid #355D93", zindex:"1090" });
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    });
    $('#owl-blog').owlCarousel({
        autoplay: true,
        loop:true,
        margin:10,
        nav:false,
        items:1
    });


    /*:::::::::::::::Inicio ocultar redes::::::::::::::*/
posicionarMenu();
    $(window).scroll(function() {    
    posicionarMenu();
    });
    function posicionarMenu() {
        var altura_del_banner = $('.altoBanner').outerHeight(true);
        //var altura_del_menu = $('.menu').outerHeight(true);
        //$('.menu').css('display', 'none');
        if ($(window).scrollTop() > altura_del_banner){
            $('.basemenu').css('display', 'none');
            $('.basemenu1').css('display', 'block');


           // $('.menu').addClass('fixedd'); 
            // $('.menu').css('position', 'fixed');
            // $('.menu').css('top', '0');
            // $('.menu').css('z-index', '10');
            // $('.menu').css('width', '100%'); 
            // $('.menu').css('background', '#3B4841');
            // $('.logo-cdt').css('padding', '11px'); }
             $('.divmenuarriba').css('background', 'none');

        } 
        else{
            $('.basemenu1').css('display', 'none');
            $('.divmenuarriba').css('background', '#303030');
            
            $('.basemenu').css('display', 'block');

            //$('.divmenu').css('display', 'block'); 
            //$('.logo-cdt').css('padding', '19px');            
        }
    }


/*:::::::::::::::Fin ocultar redes:::::::::::*/

    // $('#owl-demo').owlCarousel({
    //     autoplay: true,
    //     loop:true,
    //     nav:false,
    //     items:1
    // });



        $('#owl-marcas').owlCarousel({
        loop:true,
        //responsiveClass:true,
        nav: false,
        dots: false,
        autoplay: true,  //colocar esto como true
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:3,
                nav:false,
                margin: 30

            }
        }
    });

 

    new WOW().init();
    $window = $(window);
    var h = $window.height();
    $('#map_canvas').css("height", h-120);
});
$(function() {
    if ($("#commentform").length > 0) {
        $("#commentform").validationEngine('attach', {
            scroll: false
        });
    }
});