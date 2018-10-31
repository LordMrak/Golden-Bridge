<script type="text/javascript" src="content/products/robots/globalfant/globalfant.js"></script>
<?

$login_name = "galeant@yandex.ru";
$login_pw   = "3251873";

$login_string = "$login_name&password=$login_pw";
$url = "http://www.myfxbook.com/api/login.xml?email=$login_string";
 
$login = file_get_contents($url);
$xml_sess = simplexml_load_string($login);
$sess = $xml_sess->session;

$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1510547&start=2000-01-01&end=".date('Y-m-d');;
$data = file_get_contents($url);
$xml_data = simplexml_load_string($data);

//$xml_data_2 = simplexml_load_string($data);

?>

<link rel="stylesheet" href="content/products/robots/globalfant/fant.css" type="text/css" media="screen" title="no title" charset="utf-8">
<head>
<title>Golden Bridge :: Продукты :: Global Fant</title>
</head>
<div class="history"><a href="index.php?link=abw" >Golden Bridge</a> :: <a href="index.php?link=products">Продукты</a> :: <a href="index.php?link=products&page=robots">Роботы</a> :: <a href="index.php?link=products&page=fant">Global Fant</a></div>

<section class="container">
			<h1><span class="title"> Global Fant </span> </h1>
			<h2>Он не знает куда пойдет цена. Для него это не важно.</h2>

            
 </section>
<section class="container_pro container_pers ">  
    
    <div class="block_info_personal s_box_shadow agress">
         <div class="borderpicter pic_robot"><img class="radius" src="content/img/robots/globalgant.jpg" width="250px"> </div>
         <h3>Описание</h3>
<p>Данный советник представляет собой воплощение интересной идеи относительно глобального свойства движения цены, о котором знает каждый трейдер: цена движется слева направо и периодически ходит вверх и вниз. Это и так понятно, скажете Вы. Но исходя из этой простой мысли, мы можем заработать хорошие деньги, и этот робот создан именно по такой технологии.</p>
<p>Итак, мы определились, что цена будет вверху или внизу. Теперь мы должны открыть ордера. Данный советник строит сеть из ордеров через расстановку Stop ордеров. Этот метод отличает его от советника Spider Man. Цена идет и собирает ордера и периодически натыкается на T/P, который расставляется соответствующими приказами на графике. S/L – не предусмотрен. </p>
<p>Мы имеем кучу открытых и не открытых ордеров. Что дальше? Советник обладает мощнейшим логическим модулем анализа ордеров, для принятия решения о закрытии оных. Именно так: он постоянно открывает ордера и думает о том моменте, когда их закрыть. АТС анализирует: время ордера в рынке, отношение баланса к эквити, процент прибыли относительно начального эквити и прочее. Он может тралить стоп приказ за ценой и формировать распределение по Вашему выбору (расстояние для отложенных сделок), оценивать баланс после достижения определенного значения на депозите, гибко автоматически настраивать объемы торговли и обладает возможностью остановить в автоматическом режиме торговлю по достижению цели. Советник закрывает все сделки и удаляет отложенные приказы после достижения заданного процента от депозита. После этого он ставит новую цель уже от нового депозита и увеличивает лот. Процесс может длиться бесконечно.</p>
<p> Также стоит отметить очевидные  недостатки системы: систематические просадки соразмерные настроенному риск-менеджменту, отсутствие стоп приказов.</p>
<p>Все эти возможности формируют огромный потенциал в его использовании. Огромным преимуществом данного советника является возможность протестировать его на тестере стратегий. Это безусловно нужно уметь делать правильно, и наши специалисты всегда готовы провести небольшое вводное занятие по тестированию советников. </p>

<h3>Мониторинг счетов</h3>
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
    	<td colspan="7"  class="num_z"> Настройка для GBPUSD </td>
    </tr>
    <tr>
    	<td >
        	GBPUSD
        </td>
    	<td >
        	462
        </td>
        <td class="num_z">
        	20 832 729
        </td>
        <td class="num_z">
        	1000.00
        </td>
        <td class="profit">$17 328.68</td>
        <td class="profit">
        	1 732.87%
        </td>
        <td>
        	5
        </td>
    <tr>
    <tr>
    	<td colspan="6"><a href="content/products/statments/fant/1_GBPUSD.rar" class="gist"><img src="content/products/statments/fant/1_GBPUSD.gif"></a></td>
        <td><a href="content/products/sets/fant/Stability_GFant_GBPUSD.set" target="_blank" download class="download"></a></td>
    </tr>
    <tr>
    	<td colspan="7"  class="num_z"> Настройка для EURGBP </td>
    </tr>
    <tr>
    	<td >
        	EURGBP
        </td>
    	<td >
        	622
        </td>
        <td class="num_z">
        	22 664 813
        </td>
        <td class="num_z">
        	1000.00
        </td>
        <td class="profit">$2 038.14</td>
        <td class="profit">
        	203.81%
        </td>
        <td>
        	5
        </td>
    <tr>
    <tr>
    	<td colspan="6"><a href="content/products/statments/fant/1_EURGBP.rar" class="gist"><img src="content/products/statments/fant/1_EURGBP.gif"></a></td>
        <td><a href="content/products/sets/fant/Stability_EURGBP_1.set" target="_blank" download class="download"></a></td>
    </tr>
</table>

<!--Информация о тестировании-->




<!--<h3>Настрайка</h3>
<table cellpadding="10px">
	<tr>
    	<th >
        	Файл настройки
        </th>
        <th>
        	Файл статистики
        </th>
        <th >
        	Описание
        </th>
        <th>
        	Точек входа
        </th>
        <th>
        	Доходность
        </th>
        <th>
        	Тест на реальном счете
        </th>
    </tr>
    
    <tr  class="sub_title"><td colspan="6"> Бесплатно</td></tr>
    <tr>
    	<td>
        	<a class="download"></a>
        </td>
        <td>
        	<a class="stat"></a>
        </td>
        <td>
        	GPUSD
        </td>
        <td class="num_z">217</td>
        <td class="num_z">$15 992,90</td>
        <td>
        	<img src="content/img/ico/tick.png">
        </td>
    <tr>
    <tr class="sub_title"><td colspan="6"> Приобретаемые настройки</td></tr>
    <tr>
    	<td>
        	
        </td>
        <td>
        	<a class="stat"></a>
        </td>
        <td>
        	EURUSD - EURJPY
        </td>
        <td class="num_z">135</td>
        <td class="num_z">$11 380,50</td>
        <td>
        	<img src="content/img/ico/tick.png">
        </td>
    <tr>
    <tr>
    	<td>
        	<a class="download"></a>
        </td>
        <td>
        	<a class="stat"></a>
        </td>
        <td>
        	GBPCHF - USDCHF
        </td>
        <td class="num_z">204</td>
        <td class="num_z">$16 585,20</td>
        <td>
        	<img src="content/img/ico/tick.png">
        </td>
    <tr>
</table>-->
</div>

<div  class="block_info_personal s_box_shadow agress">
<h3>Индикация</h3>

<table  class="block_view_v"  >
	<tr>
    	<td>
        	<div id="fant" class="fant"></div>
        </td>
        <td>
            <div class="set set1">Показывает предыдущее состояние депозита после обнуления сделок. Под обнулением понимается закрытие всех позиций и удаление отложенных ордеров</div>
            <div class="set set2">Средства при котором происходит обнуление</div>
            <div class="set set3">Текущий торгуемый лот. Робот увеличивает по мере нарастания депозита</div>
            <div class="set set4">Сделок в рынке</div>
            <div class="set set5">Балакнс, показывает зафиксировнные сделки без учета открытых</div>
            <div class="set set6">Средства, показывает реальное состояние депозита на данный момент (если зафиксировать все сделки) </div>
        </td>
    </tr>
</table>

</div>
	<div class="price"> Стоимость работа Global Fant <h3>По запросу<!--<span class="price_rub"> &#8399;</span>--></h3> </div> 
	<a id="buy_gray" href="#dialog1" name="modal" place="Global Fant" link="http://g-bridge.ru<? echo $_SERVER['REQUEST_URI'];?>" class="buttom">Запрос</a>
	

	
	
    
    </section>
