// JavaScript Document

$(document).ready(function() {   
	
	$(".datepicker" ).datepicker();
	$('[name = submit]').on('click',function(){
		$('#idata_client_form').submit();
	});
	



$('.add_client').on('click',function(){
			$('#boxes').load('content/partner_inside/content/action/clients/add_client.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
$('#import_excel').on('click',function(){
			$('#boxes').load('content/partner_inside/content/action/clients/import_excel.php');
			make_mask();
			 
	});
$('.tr_click').on('click',function(){
			//alert($(this).attr('id'));
			
			var newWin = window.open('content/partner_inside/content/clients/client_window.php?client='+$(this).attr('id'),
										'client_'+$(this).attr('id'),
										"width=1020,height=530,resizable=yes,scrollbars=yes,status=no"
									);
			
			/*var newWin = window.open("http://javascript.ru",
									   "JSSite",
									   "width=420,height=230,resizable=yes,scrollbars=yes,status=yes"
									)*/
	});
	
	
	
	
	
	
	
	
	
	
	
	
$('[base = "edit_bank"]').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/edit_bank.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
$('[base = "del_bank"]').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/del_bank.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	
	
	/* Редактируем Web Money*/
	
$('.add_wm').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/add_wm.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	
	
$('[base = "edit_wm"]').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/edit_wm.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
$('[base = "del_wm"]').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/del_wm.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	/* Редактируем Web Money*/

	/* Редактируем QIWI*/
	
$('.add_qiwi').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/add_qiwi.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	
	
$('[base = "edit_qiwi"]').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/edit_qiwi.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
$('[base = "del_qiwi"]').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/del_qiwi.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	/* Редактируем Web Money*/
	
});