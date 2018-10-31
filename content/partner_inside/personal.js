// JavaScript Document
$(document).ready(function(){
	
	$('.parter_botton').click(function(e) {
		
		
		var id = $(this).attr('href');
		$("#partner,#net,#trad,#rest").stop().fadeTo("slow",0);
		$('#partner,#net,#trad,#rest').css("display","none");
		$(id).stop().fadeTo("slow",1); 

		});
	
	
	});
