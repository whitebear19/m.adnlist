

(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU 
            ------------------------------------*/
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            }); 
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }    

    $(document).ready(function () {
        mainApp.initFunction(); 
		$("#sideNav").click(function(){
			if($(this).hasClass('closed')){
				$('.navbar-side').animate({left: '0px'});
				$(this).removeClass('closed');
				$('#adnlist-page-wrapper').animate({'margin-left' : '260px'});
				
			}
			else{
			    $(this).addClass('closed');
				$('.navbar-side').animate({left: '-260px'});
				$('#adnlist-page-wrapper').animate({'margin-left' : '0px'}); 
			}
        });

        (function () {

            $('.add_newaccount_btn').on('click', function() {
                $('.add_newaccount').slideToggle();
            });
    
    
        }());
    
    });

}(jQuery));
