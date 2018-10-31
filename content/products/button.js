$(document).ready(function(){
		
		$('a[name=modal]').mouseover(function(e){
				
				$('#boxes').load('content/products/buy_product.php',{
				'place':$(this).attr('place'),
				'link':$(this).attr('link')
				});
		});
		
		$('#move_right').click(function(e){
				
			$('.navigation_ed').css({'left':'10px'});
			$('#move_right').css({'display':'none'});
			$('#move_left').css({'display':'block'});
		});
		$('#move_left').click(function(e){
				
			$('.navigation_ed').css({'left':'-220px'});
			$('#move_right').css({'display':'block'});
			$('#move_left').css({'display':'none'});
		});
		
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
		});// JavaScript Document
	});