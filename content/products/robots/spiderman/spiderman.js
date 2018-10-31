$(document).ready(function(){
	//Первый блок
	    $(".set1").mouseover(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/1.jpg)");			
		});	
		$(".set1").mouseout(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/base.jpg)");			
		});	
	//2 блок
	    $(".set2").mouseover(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/2.jpg)");			
		});	
		$(".set2").mouseout(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/base.jpg)");			
		});	
	//3 блок
	    $(".set3").mouseover(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/3.jpg)");				
		});	
		$(".set3").mouseout(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/base.jpg)");		
		});
	//4 блок
	    $(".set4").mouseover(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/4.jpg)");		
		});	
		$(".set4").mouseout(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/base.jpg)");		
		});	
	//5 блок
	    $(".set5").mouseover(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/5.jpg)");			
		});	
		$(".set5").mouseout(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/base.jpg)");		
		});	
	//6 блок
	    $(".set6").mouseover(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/6.jpg)");			
		});	
		$(".set6").mouseout(function(){	
			$("#fant").css("background","url(content/img/robots/Fant/base.jpg)");		
		});	
	
		
		
	//alert('vv');
	//$('#buy_gray').mousedown(function(e){
			//alert($('#boxes').attr("id"));
		$('#boxes').load('content/products/buy_product.php',{
			'place':$('#buy_gray').attr('place'),
			'link':$('#buy_gray').attr('link')
			});
				
		//});

	$('#zakaz').click(function(e){
			
			$('#boxes').load('content/products/buy_product.php',{
				'sname':$('#sname').val(),
				'name':$('#name').val(),
				'summ':$('#summ').val(),
				'email':$('#email').val(),
				'tel':$('#tel').val(),
				'ats':$("#ats option:selected").text(),
				'adrsite':$('#adrsite').val()
				});
				
		});
	/*$('.window .close').click(function (e) {
		
		$("div#boxes").empty();
		$('#mask, .window').hide();
	
    }); 
	 $('#close').click(function(e){
			//alert($('#modal').attr("id"));
			$('#boxes').load('content/products/buy_product.php',{
				'sname':$('#sname').val(),
				'name':$('#name').val(),
				'summ':$('#summ').val(),
				'email':$('#email').val(),
				'tel':$('#tel').val()
				});
				
		}); */
		
});
		