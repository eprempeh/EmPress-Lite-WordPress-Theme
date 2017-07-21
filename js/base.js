jQuery(document).ready(function($){
	
	// For Scroll to top
	$("#scroll-up").hide();
    
    $(window).scroll(function(){
        var wScroll = $(window).scrollTop();
        if (wScroll > 200) {
            $('#scroll-up').fadeIn();
        } else {
            $('#scroll-up').fadeOut();
        }
    });
    $('a#scroll-up').click(function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

	// Redirection
	$('.category-essays h2.entry-title > a').attr('target', '_blank');

});