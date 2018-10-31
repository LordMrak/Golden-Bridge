<script type="text/javascript" src="content/products/robots/mrgray.js"></script>

<?

$login_name = "galeant@yandex.ru";
$login_pw   = "3251873";



$query = "
		SELECT 
		  myfxbook.name,
		  myfxbook.num_acc,
		  schet_bro.id_management
		FROM
		  myfxbook
		  INNER JOIN schet_bro ON (myfxbook.id_schet_bro = schet_bro.id)
		WHERE
		  myfxbook.`show` = 'y' and
		  schet_bro.id_management = 1";
$myfxbook_acc = $db_gb->select($query);




$login_string = "$login_name&password=$login_pw";


$url = "http://www.myfxbook.com/api/login.xml?email=$login_string";
 
$login = file_get_contents($url);
$xml_sess = simplexml_load_string($login);
$sess = $xml_sess->session;

$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1520911&start=2000-01-01&end=".date('Y-m-d');
$data = file_get_contents($url);
$xml_data = simplexml_load_string($data);



$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1529476&start=2000-01-01&end=".date('Y-m-d');
$data = file_get_contents($url);
$xml_data_2 = simplexml_load_string($data);


$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1564268&start=2000-01-01&end=".date('Y-m-d');
$data = file_get_contents($url);
$xml_data_3 = simplexml_load_string($data);


$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1578197&start=2000-01-01&end=".date('Y-m-d');
$data = file_get_contents($url);
$xml_data_4 = simplexml_load_string($data);


$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1564270&start=2000-01-01&end=".date('Y-m-d');
$data = file_get_contents($url);
$xml_data_5 = simplexml_load_string($data);

$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=1578165&start=2000-01-01&end=".date('Y-m-d');
$data = file_get_contents($url);
$xml_data_6 = simplexml_load_string($data);
?><head>
<title>Golden Bridge :: Продукты :: Mr. Gray</title>
</head>

<div class="history"><a href="index.php?link=abw" >Golden Bridge</a> :: <a href="index.php?link=products">Продукты</a> :: <a href="index.php?link=products&page=robots">Роботы</a> :: <a href="index.php?link=products&page=mrgray">Mr. Gray</a></div>

<section class="container">
			<h1><span class="title"> Mr. Gray </span> </h1>
			<h2>Как трейдер, только лучше.</h2>

            
 </section>
<section class="container_pro container_pers">  
    
    <div class=" block_info_personal  s_box_shadow stabl">
         <div class="borderpicter pic_robot"><img class="radius" src="content/img/robots/mrgray.jpg" width="250px"> </div>
         <h3>Описание</h3>
<p>В основе советника заложена прямая корреляционная зависимость торговых инструментов. Робот следит за текущим расхождением между двумя инструментами (например EURUSD и GBPUSD) за определенное количество свечей на заданном таймфрейме, при достижении расхождения между ними определенного количества пунктов советник открывает позицию на продажу (SELL) на инструменте, который находится в зоне перекупленности и позицию покупки (BUY) на инструменте, который находится в зоне перепроданности, объёмами пропорциональными друг другу относительно стоимости пункта и волатильности на обоих инструментах. Закрытие открытых позиций происходит одновременно при достижении ими планируемой прибыли в валюте счета. В случае, когда открытые позиции показывают определенный минус, происходит открытие дополнительных сделок в том же направлении и таким же объёмом, что и предыдущие, для того чтобы во время ближайшей коррекции цены зафиксировать ожидаемую прибыль раньше. </p>

<p>АТС так же может следить за позициями, открытыми трейдером вручную. Советник сделает указанное количество доливок через указанное расстояние, и сам закроет прибыль. Для трейдера, который привык торговать только вручную, советник может быть использован как индикатор. В выводе информации указывается: расхождение на 3х таймфреймах на обоих наложениях, коэффициент отношений волатильности на торгуемых инструментах, линейный коэффициент корреляции с М15 по H4 и их среднее значение, и рекомендованный лот. </p>
<p>Данный советник является мультивалютным, что лишает возможности протестировать его на стандартном тестере стратегий. Разработчики данной АТС собрали статистику за последние 2,5 года, с помощью дополнительной модификации данного робота, и на её основании подобрали настройки для каждой возможной пары торгуемых инструментов. При сборе статистики учитывались: расхождения на таймфреймах М15, М30, Н1, коэффициент линейной корреляции на таймфреймах М15, М30, Н1, Н4, их среднее значение и коэффициент хода одного инструмента относительно другого. В подборе настроек принимались во внимание максимумы необходимых значений. Благодаря сбору детальной статистики данный советник можно использовать и на инструментах с отрицательной корреляцией, что показывает результаты, не уступающие инструментам с прямой корреляцией. По полученным данным определяются пары инструментов, которые могут дополнять друг друга, т.е. торговаться на одном счете хеджируя друг друга.</p>
<h3>Счета в управлении</h3>
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
    
    <? 
	
	//print_r($myfxbook_acc);
	foreach( $myfxbook_acc as $myfxbook_acc )
		{
			$id = $myfxbook_acc['num_acc'];
			$url="http://www.myfxbook.com/api/get-data-daily.xml?session=$sess&id=$id&start=2000-01-01&end=".date('Y-m-d');
			$data = file_get_contents($url);
			$xml_data = simplexml_load_string($data);
			//echo $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"))."<br>";
			
			//echo date('Y').'-'.(date('m')-1)."-".date('d')."<br>";
	 ?>
    <tr>
    	<td><?  echo "KOKOKO"; ?></td>	
    	<td class="td_center"><a href="#" target="_blank">Mr. Gray</a></td>
        <td>
        	20 000$
        </td>
        <td >
        	<?
			if($xml_data_6->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        
        	<span class="<? echo $class;?>"><? echo $xml_data_6->value;?>%</span>
        </td>
        <td>
        <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1578165" target="_blank"><img  style="width:350px;" border="0" src="http://widgets.myfxbook.com/widgets/1578165/large.jpg"/></a>
        </td>
    </tr>
    
    <? } ?>

    
    
    
    
    <tr>
    
    	<td >
        	<!--<a href="https://www.instaforex.com/ru/?x=JUAV" target="_blank"><img src="content/brokers/insta.png"></a>-->
        </td>	
    	<td class="td_center"><a href="#" target="_blank">Mr. Gray</a></td>
        <td>
        	5 000$
        </td>
        <td >
        	<?
			if($xml_data_2->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        
        	<span class="<? echo $class;?>"><? echo $xml_data_2->value;?>%</span>
        </td>
        <td><!--<a class="top_bottn" href="https://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1529476"  target="_blank"><img src="content/brokers/myfxbook.jpg" ></a>-->
        <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1529476" target="_blank"><img style="width:350px;"  border="0" src="http://widgets.myfxbook.com/widgets/1529476/large.jpg"/></a>
        </td>
    </tr>
    
    
    <tr>
    
    	<td >
        	<!--<a href="https://www.instaforex.com/ru/?x=JUAV" target="_blank"><img src="content/brokers/insta.png"></a>-->
        </td>	
    	<td class="td_center"><a  href="#" target="_blank">Mr. Gray</a></td>
        <td>
        	6 500$
        </td>
        <td >
        	<?
			if($xml_data_4->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        
        	<span class="<? echo $class;?>"><? echo $xml_data_4->value;?>%</span>
        </td>
        <td><!--<a class="top_bottn" href="https://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1529476"  target="_blank"><img src="content/brokers/myfxbook.jpg" ></a>-->
        <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1578197" target="_blank"><img  style="width:350px;"  border="0" src="http://widgets.myfxbook.com/widgets/1578197/large.jpg"/></a>
        </td>
    </tr>
    
    
    
    <tr>
    
    	<td >
        	<!--<a href="https://www.instaforex.com/ru/?x=JUAV" target="_blank"><img src="content/brokers/insta.png"></a>-->
        </td>	
    	<td class="td_center"><a  href="#" target="_blank">Mr. Gray</a></td>
        <td>
        	2 600$
        </td>
        <td >
        	<?
			if($xml_data_3->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        
        	<span class="<? echo $class;?>"><? echo $xml_data_3->value;?>%</span>
        </td>
        <td><!--<a class="top_bottn" href="https://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1529476"  target="_blank"><img src="content/brokers/myfxbook.jpg" ></a>-->
        <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1564268" target="_blank"><img  style="width:350px;"  border="0" src="http://widgets.myfxbook.com/widgets/1564268/large.jpg"/></a>
        </td>
    </tr>
    
    
    
    
    <tr>
    
    	<td >
        	<!--<a href="http://www.forex4you.org/?affid=d2776ae" target="_blank"><img src="content/brokers/forex4you.png"></a></a>-->
        </td>	
    	<td class="td_center"><a href="#" target="_blank">Mr. Gray</a></td>
        <td>
        	700$
        </td>
        <td class="td_center">
        <?
			if($xml_data_5->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        
        	<span class="<? echo $class;?>"><? echo $xml_data_5->value;?>%</span>
        </td>
        <td>
        <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1578175" target="_blank"><img  style="width:350px;" border="0" src="http://widgets.myfxbook.com/widgets/1578175/large.jpg"/></a>
        <!--<a  class="top_bottn" href="https://www.myfxbook.com/members/Lord_Zeus/golden-bridge-mr-gray-real/1520911"  target="_blank"><img src="content/brokers/myfxbook.jpg" ></a>--> </td>
    </tr>
    
    
    <tr>
    
    	<td >
        	<!--<a href="http://www.forex4you.org/?affid=d2776ae" target="_blank"><img src="content/brokers/forex4you.png"></a>-->
        </td>	
    	<td class="td_center"><a href="#" target="_blank">Mr. Gray</a></td>
        <td>
        	150$
        </td>
        <td class="td_center">
        <?
			if($xml_data->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        
        	<span class="<? echo $class;?>"><? echo $xml_data->value;?>%</span>
        </td>
        <td><a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge-mr-gray-150/1520911" target="_blank"><img style="width:350px;"   border="0" src="http://widgets.myfxbook.com/widgets/1520911/large.jpg"/></a>
        
        <!--<a  class="top_bottn" href="https://www.myfxbook.com/members/Lord_Zeus/golden-bridge-mr-gray-real/1520911"  target="_blank"><img src="content/brokers/myfxbook.jpg" ></a>--> </td>
    </tr>
</table>

<h3>Настрайка</h3>
<table class="table_product" cellpadding="10px">
	<tr>
    	<th rowspan="2">
        	Файл настройки
        </th>
        <th rowspan="2">
        	Файл статистики
        </th>
        <th rowspan="2">
        	Описание
        </th>
        <th>
        	Точек входа
        </th>
        <th>
        	Доходность
        </th>
        <th rowspan="2">
        	Тест на реальном счете
        </th>
    </tr>
    <tr>
        <th colspan="2">
        	2,5 года с 1000$
        </th>
    </tr>
    <tr  class="sub_title"><td colspan="6"> Бесплатно</td></tr>
    <tr>
    	<td>
        	<a href="content/products/sets/mrgray/Mr.Gray EURUSD-GBPUSD.set" download class="download"></a>
        </td>
        <td>
        	<a href="content/products/statments/mrgray/EURUSDGBPUSD.xlsx" download  class="stat"></a>
        </td>
        <td>
        	EURUSD - GBPUSD
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
        	<a class="download"></a>
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
</table>
</div>

<div  class="block_info_personal stabl s_box_shadow">
<h3>Индикация</h3>

<table  class="block_view_v"  >
	<tr>
    	<td>
        	<div id="mrgray" class="mrgray"></div>
        </td>
        <td>
            <div class="set set1">Блок контроля открытия позиций и закрытия прибыли</div>
            <div class="set set2">Сколкьо пунктов нужно для новых сделок</div>
            <div class="set set3">Расчет линейного коэфициента корреляции. (M5 | M15 | M30 | H1 | H4 | Middle)</div>
            <div class="set set4">Последнее время которое видел советник</div>
            <div class="set set5">Расчетные лота для торгуемых инструментов</div>
            <div class="set set6">Текущее количество циклов у советника</div>
            <div class="set set7">Текущий результат по ветке ордеров</div>
            <div class="set set8">Максимальная прибыль которую показавали сделки </div>
            <div class="set set9">Цель, по которой закроются позиции</div>
            <div class="set set10">Максимальная просадка по сделкам</div>
            <div class="set set11">Убыток для новых сделок</div>
            <div class="set set12">Сколько было усреднений</div>
            <div class="set set13">Максимальное расхождение в пунктах по данным парам</div>
            <div class="set set14">Расхождение по которому ищется точка входа в рынок</div>
            <div class="set set15">Коэффициент валотильности инструментов. Показывает на сколько один инструмент быстрее другого</div>
            <div class="set set16">Расхождение на 3 разных таймфреймах. Основа: текущая валюта.</div>
            <div class="set set17">Расхождение на 3 разных таймфреймах. Основа: обратная валюта.</div>
            <div class="set set18">Расхождение при котором АТС закроет сделки независимо от исходной цели, но только прибыль</div>
            <div class="set set19">При каких значениях просадки будут открываться дополнительные сделки</div>
        	<div class="set set20">Перечень открытых сделок</div></td>
    </tr>
</table>

</div>
	<div class="price"> Цена до конца Июня 2016 <h3>500 000р.</h3> </div> 
	<a id="buy_gray" href="#dialog1" name="modal" place="Mr.Gray" link="http://g-bridge.ru<? echo $_SERVER['REQUEST_URI'];?>" class="buttom">купить</a>
	

    </section>
