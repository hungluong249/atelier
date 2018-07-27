$(document).ready(function(){
    'use strict';

    // NAV Expand

    var navStatus = 0;

    $('#btn-nav-expand').click(function(){
        if(navStatus == 0){
            $('#btn-nav-expand').addClass('active');
            $('#nav-main').animate({
                left : '0'
            },500);

            navStatus = 1;
        }

        else{
            $('#btn-nav-expand').removeClass('active');
            $('#nav-main').animate({
                left : '-80%'
            },500);

            navStatus = 0;
        }
    });

});



