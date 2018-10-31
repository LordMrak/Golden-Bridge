<?
$login_name = "galeant@yandex.ru";
$login_pw   = "3251873";

$login_string = "$login_name&password=$login_pw";
$url = "http://www.myfxbook.com/api/login.xml?email=$login_string";
 
$login = file_get_contents($url);
$xml_sess = simplexml_load_string($login);
$sess = $xml_sess->session;

$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=2420043&start=2000-01-01&end=".date('Y-m-d');
$data = file_get_contents($url);
$xml_data = simplexml_load_string($data);

$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=2412970&start=2000-01-01&end=".date('Y-m-d');
$data2 = file_get_contents($url);
$xml_data2 = simplexml_load_string($data2);

$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=2420043&start=2000-01-01&end=".date('Y-m-d');
$data3 = file_get_contents($url);
$xml_data3 = simplexml_load_string($data3);

/*$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1736120&start=2000-01-01&end=".date('Y-m-d');
$data4 = file_get_contents($url);
$xml_data4 = simplexml_load_string($data4);*/
?>
<script type="text/javascript" src="content/products/invest/pamm_GB/pamm.js"></script>
<link rel="stylesheet" href="content/products/invest/pamm_GB/fant.css" type="text/css" media="screen" title="no title" charset="utf-8">
<head>
	<title>Golden Bridge :: Продукты :: ПАММ/МАМ  GB</title>
</head>
<!--  :: <a href="index.php?link=products&page=pamm_gb">Инвестирование</a> -->
<div class="history"><a href="index.php?link=abw" >Golden Bridge</a> :: <a href="index.php?link=products">Продукты</a> :: <a href="index.php?link=products&page=pamm_gb">ПАММ/МАМ Golden Bridge</a></div>

<section class="container">
			<h1><span class="title"> ПАММ/МАМ Golden Bridge </span> </h1>
			<h2>На счетах ведется торговля по совокупным системам компании</h2>

            
 </section>
<section class="container_pro container_pers ">  
    
       
    <div class="block_info_personal s_box_shadow mma">
    <div >
         <div class="borderpicter pic_robot"><img class="radius" src="content/img/invest/pamm.jpg" width="250px"> </div>
         <h3>Описание</h3>
         <!--<p>На ПАММ счете определенное время велась торговля ручным трейдингом, и мы в очередной раз убедились в преимуществе роботов в этом вопросе. Очень скоро наш ПАММ выйдет в прибыльную зону и будет постоянно зарабатывать.</p>-->
         
        <p>На ПАММ/МАМ счетах, в основном, торгует робот Mr. Crowley по системе корреляций с автоматическим выбором пар и направлений сделок. Данный программный продукт является логическим продолжением флагманского продукта компании  <a href="index.php?link=products&page=mrgray">Mr. Gray</a>. Мы по праву гордимся этим продуктом. Его рузльтаты лучше предшественника в 2-3 раза при уменьшеных расках в 2-3 раза.  </p>
    </div>

<table  class="table_product" cellpadding="10px">
	<tr>
    	<th colspan="6"><h3>Данные ПАММ Счета</h3></th>
    </tr>
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
        <th>
        	
        </th>
    </tr>
    <tr>
    	<td>
        	
        </td>
        <td class="gold">
        	5947175
        </td>
        <td class="profit">
        	1 307,80 USD
        </td>
        <td  class="<? if($xml_data->value>0) echo "profit"; else  echo "lost"; ?>">
        	<? echo (double) $xml_data->value; ?>%
        </td>
        <td>
        	<a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/2420043" target="_blank"><img  style="width:350px;" border="0" src="http://widgets.myfxbook.com/widgets/2420043/large.jpg"/></a>
        </td>
        <td>
        	<a  href="https://www.instaforex.com/ru/pamm_monitoring.php?trader=5947175&x=JUAV" target="_blank" class="invest_1">Мониторинг</a>
        </td>
    </tr>
    
    <tr>
    	<td>
        	
        </td>
        <td class="gold">
        	5957553
        </td>
        <td class="profit">
        	739,40 USD
        </td>
        <td  class="<? if($xml_data2->value>0) echo "profit"; else  echo "lost"; ?>">
        	<? echo (double) $xml_data2->value; ?>%
        </td>
        <td>
        	<a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/2412970" target="_blank"><img  style="width:350px;" border="0" src="http://widgets.myfxbook.com/widgets/2412970/large.jpg"/></a>
        </td>
        <td>
        	<a  href="https://www.instaforex.com/ru/pamm_monitoring.php?trader=5957553&x=JUAV" target="_blank" class="invest_1">Мониторинг</a>
        </td>
    </tr>
    
    <tr>
    	<td>
        	
        </td>
        <td class="gold">
        	5957543
        </td>
        <td class="profit">
        	1 307,80 USD
        </td>
        <td  class="<? if($xml_data->value>0) echo "profit"; else  echo "lost"; ?>">
        	<? echo (double) $xml_data->value; ?>%
        </td>
        <td>
        	<a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/2420043" target="_blank"><img  style="width:350px;" border="0" src="http://widgets.myfxbook.com/widgets/2420043/large.jpg"/></a>
        </td>
        <td>
        	<a  href="https://www.instaforex.com/ru/pamm_monitoring.php?trader=5957543&x=JUAV" target="_blank" class="invest_1">Мониторинг</a>
        </td>
    </tr>
</table>




</div>
	<div class="price"> Получить консультацию </div> 
	<a id="buy_gray" href="#dialog1" name="modal" place="Консультация ПАММ" link="http://g-bridge.ru<? echo $_SERVER['REQUEST_URI'];?>" class="buttom">Заказать звонок</a>
	

	
	
    
    </section>
