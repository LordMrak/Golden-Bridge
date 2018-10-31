// JavaScript Document
// JavaScript Document
$(document).ready(function(){
/*$(function() {
		
		setTimeout(function () {	
				$('.online_man').show('slow');			
		// Ваш скрипт
		}, 100000); // время в мс
		
		$('.on_man_close').on('click', function(){
				
				$('.online_man').toggle('slow');
		});
	})*/
	
$.datepicker.regional['ru'] = {
closeText: 'Закрыть',
prevText: '&#x3c;Пред',
nextText: 'След&#x3e;',
currentText: 'Сегодня',
monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
'Июл','Авг','Сен','Окт','Ноя','Дек'],
dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
dateFormat: 'dd.mm.yy',
firstDay: 1,
isRTL: false
}; 
$.datepicker.setDefaults($.datepicker.regional['ru']); 
$.datepicker.setDefaults(
	  $.extend(
		{'dateFormat':'yy-mm-dd'}
	  )
	);	
	
	
	$(".datepicer").datepicker();
	
	
});