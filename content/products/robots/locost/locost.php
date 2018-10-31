<script type="text/javascript" src="content/products/robots/spiderman/spiderman.js"></script>

<?
/*
$login_name = "galeant@yandex.ru";
$login_pw   = "3251873";

$login_string = "$login_name&password=$login_pw";
$url = "http://www.myfxbook.com/api/login.xml?email=$login_string";
 
$login = file_get_contents($url);
$xml_sess = simplexml_load_string($login);
$sess = $xml_sess->session;

$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1628535&start=2000-01-01&end=".date('Y-m-d');;
$data = file_get_contents($url);
$xml_data = simplexml_load_string($data);

//$xml_data_2 = simplexml_load_string($data);
*/
?>

<link rel="stylesheet" href="content/products/robots/globalfant/fant.css" type="text/css" media="screen" title="no title" charset="utf-8">
<head>
<title>Golden Bridge :: Продукты :: Mr. Anderson</title>
</head>
<div class="history"><a href="index.php?link=abw" >Golden Bridge</a> :: <a href="index.php?link=products">Продукты</a> :: <a href="/index.php?link=products&page=robots">Роботы</a> ::    <a>Mr. Anderson</a></div>

<section class="container">
			<h1><span class="title"> Mr. Anderson </span> </h1>
			<h2>Выбери правильную таблетку!</h2>

            
 </section>
<section class="container_pro container_pers ">  
    
    <div class="block_info_personal s_box_shadow mma">
 
         <div class="borderpicter pic_robot"><img class="radius" src="content/img/robots/mr.anderson.jpg" width="250px"> </div>
         <h3>Описание</h3>
<p> Данный робот создан по известной и излюбленной стратегии всех новичков на рынке Forex. Догадались о чем речь? Да, это Синьер Мартин. Для тех, кто не знает оного, это система усреднений, по которой с определенным шагом открываются дополнительные сделки, и при этом увеличенным лотом. Эта система сама по себе способна торговать в течении долгого периода в прибыль. Но исход чаще всего один - это слив. Профи тоже используют эту систему, но с умом.  </p>
<p>	В нашем случае, мы "прикрутили" несколько неплохих индикаторов, которые дают статистичекое преимущество для данной стратегии. Пока все они основаны на осциляторах. При этом, естественно, мы не рекомендуем использовать его с высоким лотом на старте. Соотношение лотности должно быть примерно такое: 1000$ - 0,01 лот при базовом объеме 100 000.</p>

<h3>Мониторинги счетов</h3>
<table class="table_product" cellpadding="10px">
	<tr>
    	<th>
        	
        </th>
        <th>
        	Счет
        </th>
        <th>
        	Капитал
        </th>
        <th>
        	Доходность
        </th>
        <th>
        	Мониторинг
        </th>
    </tr>
    <!--<tr>
    
    	<td>
        	
        </td>	
    	<td><a href="#">Locost</a></td>
        <td>
        	10 000$
        </td>
        <td>
        	<?
			if($xml_data->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        
        	<span class="<? echo $class;?>"><? echo $xml_data->value;?>%</span>
        </td>
        <td>
        <a href="http://www.myfxbook.com/members/Lord_Zeus/gb--locost--10/1628535" target="_blank"><img style="width:350px;"  border="0" src="http://widgets.myfxbook.com/widgets/1628535/large.jpg"/></a>
		</td>
    </tr>-->
</table>


<!--Информация о тестировании-->
<div class="rang_peron">ВНИМАНИЕ! Предлагаемые настройки носят рекомендательный характер, и компания и ее сотрудники не несут ответственности за их использование. Лотность настроена под брокера InstaForex (У них 10 000 базовых единиц. Стандарт 100 000). Для торговли у любого другого брокета нужно в 10 раз уменьшить лот в настройках.</div>
<h3>Тестирование</h3>
<table class="table_product" cellpadding="10px">
	<tr>
    	<th >
        	Символ
        </th>
    	<th >
        	Всего сделок
        </th>
        <th >
        	Смоделировано тиков
        </th>
        <th >
        	Начальный депозит
        </th>
        <th>
        	Чистая прибыль
        </th>
        <th>
        	Процент
        </th>
        <th>
        	Месяцев
        </th>
    </tr>
    <tr>
    	<td colspan="7"  class="num_z"> Настройка для EURNZD </td>
    </tr>
    <tr>
    	<td >
        	EURNZD
        </td>
    	<td >
        	6607
        </td>
        <td class="num_z">
        	34 745 801
        </td>
        <td class="num_z">
        	$1000.00
        </td>
        <td class="profit">$16 167.65</td>
        <td class="profit">
        	1616.7%
        </td>
        <td>
        	9
        </td>
    <tr>
    <tr>
    	<td colspan="6"><a href="content/products/statments/locost/1_EURNZD_1000.rar" class="gist"><img src="content/products/statments/locost/1_EURNZD_1000.gif"></a></td>
        <td><a href="content/products/sets/locost/EURNZD.set" target="_blank" download class="download"></a></td>
    </tr>
    
</table>


</div>

	<div class="price"> Стоимость робота Mr. Anderson  <h3>По запросу</h3> </div> 
	<a id="buy_gray" href="#dialog1" name="modal" place="Locost" link="http://g-bridge.ru<? echo $_SERVER['REQUEST_URI'];?>" class="buttom">Запрос</a>
	

	
	
    
    </section>
