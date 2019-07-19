
  // scroll header top
$(window).scroll(function(){
 if ($(this).scrollTop() > 1){
	 $('nav').addClass("affix-top");
	 }
	 else{
		 $('nav').removeClass("affix-top");
		 }
});
  
$(window).load(function() {
  $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
});