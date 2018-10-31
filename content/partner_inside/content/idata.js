// JavaScript Document

$(document).ready(function() {   
	
$('.add_bank').on('click',function(e){
			$('#boxes').load('content/partner_inside/content/action/idata/add_bank.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
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