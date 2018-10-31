// JavaScript Document

function make_mask()
{
    //e.preventDefault();
    //var id = $(obj).attr('href');
  	
    var maskHeight = $(window).height();
    var maskWidth = $(window).width();
  
    $('#mask').css({'width':maskWidth,'height':maskHeight});
  
    //$('#mask').fadeIn(1000); 
	
    $('#mask').stop().fadeTo("slow",0.8);
	//$('#boxes').stop().fadeTo("slow",1);
	$('#dialog1').stop().fadeTo("slow",1); 
	 
  	//var bodyH = $("body").height();
    //var bodyW = $("body").width();
	
    //var winH = $(window).height();
    //var winW = $(window).width();
  	
   	//$(id).css('top',  bodyH-$(id).height()*2);
    //$(id).css('left', bodyW/2-$(id).width()/2);
  	
    
 	
 };
$(document).ready(function() {   
	
	
	
    $('.window .close').click(function (e) {
		
		//e.preventDefault();
		$("div#boxes").empty();
		$('#mask, .window').stop().fadeTo(0);
		
    }); 
 		
    $('#mask').click(function () {
		$("div#boxes").empty();
		
		$('#mask, .window').css("display","none");
		
		//$(this).stop().fadeTo("fast",0,function(){$(this).css("display":"none")});
		//$('.window').stop().fadeTo("fast",0,function(){$(this).css("display":"none")});
    }); 
  
    });  