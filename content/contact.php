<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Golden Bridge :: Счета</title>
<link rel="stylesheet" href="content/css.css" type="text/css" media="screen" title="no title" charset="utf-8">
<script type="text/javascript" src="content/products/invest/pamm_GB/pamm.js"></script>
<link rel="stylesheet" href="content/products/invest/pamm_GB/fant.css" type="text/css" media="screen" title="no title" charset="utf-8">
 <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
 <link rel="stylesheet" href="content/products/css_product.css" type="text/css" media="screen" title="no title" charset="utf-8">
 <script type="text/javascript">
 		$(document).ready(function(e) {
		
        $(".video_class").css("width",$('.container_text').width());
   
				ymaps.ready(function () {
				var myMap = new ymaps.Map('map', {
					center: [59.851218, 30.308002],
					zoom: 16
				}, 
				{
					// Ограничиваем количество результатов поиска.
					searchControlResults: 1,
		
					// Отменяем автоцентрирование к найденным адресам.
					searchControlNoCentering: true,
		
					// Разрешаем кнопкам нужную длину.
					buttonMaxWidth: 150
				}),
				myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
					hintContent: 'GOLDEN BRIDGE LTd',
					balloonContent: 'GOLDEN BRIDGE LTd<br> пл. Конституции д.7, офис 446'
				}, {
					// Опции.
					// Необходимо указать данный тип макета.
					iconLayout: 'default#image',
					// Своё изображение иконки метки.
					iconImageHref: 'content/img/ico/GB_mini2.png',
					// Размеры метки.
					iconImageSize: [40, 59],
					// Смещение левого верхнего угла иконки относительно
					// её "ножки" (точки привязки).
					iconImageOffset: [-10, -42]
				});
		
			myMap.geoObjects.add(myPlacemark);
		});
 });
	
    </script>
</head>

<body>

<section class="container_text">

	<h3 style="font-size:18px;">Контакты</h3>
    <div style="font-size:14px;" class="rang_peron"> Email </div>
    <table class="table_cont">
    	<tr>
        	<td >
           		<span style="font-weight:bold; font-style:italic;">Общие вопросы</span> касающиеся: работы сайта, предложения по улучшению сервиса, вопросы по продуктам , вопросы по цене и прочее.
            </td>
            <td width="35%">
            	info@g-bridge.ru
            </td>
            <td></td>
        </tr>
        <tr>
        	<td >
           		<span style="font-weight:bold; font-style:italic;">Вопросы по технической поддержке:</span> по вопросам касающимся установки/настройки советников, покупки дополнительных настроек и прочие вопросы связанные с поддержкой продуктов. Включая семинары.
            </td>
            <td>
            	support@g-bridge.ru
            </td>
            <td></td>
        </tr>
        <tr>
        	<td >
           		<span style="font-weight:bold; font-style:italic;">Вопросы по сотрудничеству:</span> по вопросам касающимся Оптовых закупок, привлечения клиентов и совместных проектов.
            </td>
            <td>
            	partners@g-bridge.ru
            </td>
            <td></td>
        </tr>
		<tr>
		<td>
			<span style="font-weight:bold; font-style:italic;">Контактный телефон для связи:</span> 
		</td>
 			<td>8 (812) 9556 004</td>
		</tr>
        <!--<tr>
        	<td>
           		Для связи клиентов и партнеров.
            </td>
            <td>
            	+7 (911) 970 72 66
            </td>
            <td>Помощник директора.  Алина</td>
        </tr>
        <tr>
        	<td>
           		email
            </td>
            <td colspan="2">
            	info@g-bridge.ru
            </td>
        </tr>-->
    </table>
    <!--<div class="video_class" style="padding:25px;" >
    	<div id="map" style="width: 100%; height: 400px"></div>
    </div>-->
    
    <a id="buy_gray" href="#dialog1" name="modal" place="Запрос звонка" link="http://g-bridge.ru<? echo $_SERVER['REQUEST_URI'];?>" class="buttom">Связаться</a>
    
</section>

</body>
</html>