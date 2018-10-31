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
        <th width="100px">
        	Капитал 30 дней назад
        </th>
		<th width="100px">
        	Лотов за 30 дней
        </th>
        <th width="100px">
        	Доходность За последние 30 дней
        </th>
        <th width="100px">
        	Доходность За все время
        </th>
        <th>
        	Мониторинг
        </th>
    </tr>
    
    <? 
	
	//print_r($myfxbook_acc);
	$date_begin =  date('Y').'-'.(date('m')-1)."-".date('d')."<br>";
	/*foreach( $myfxbook_acc as $myfxbook_acc )
		{
			$id = $myfxbook_acc['num_acc'];
			$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=$id&start=$date_begin&end=".date('Y-m-d');
			$data = file_get_contents($url);
			$xml_data = simplexml_load_string($data);
			print_r($xml_data);
			
			$url="http://www.myfxbook.com/api/get-data-daily.xml?session=$sess&id=$id&start=$date_begin&end=".date('Y-m-d');
			$data = file_get_contents($url);
			$xml_data2 = simplexml_load_string($data);
			
			$url="http://www.myfxbook.com/api/get-gain.xml?session=$sess&id=$id&start=2010-01-01&end=".date('Y-m-d');
			$data = file_get_contents($url);
			$xml_data3 = simplexml_load_string($data);
	 ?>
    <tr>
    	<td></td>	
    	<td class="td_center"><a href="#" target="_blank">Mr. Gray</a></td>
        <td>
        	<span class="gold"><?  echo money_format_2($xml_data2->dataDaily->data->balance); ?>$</span>
        </td>
		<td>
        	<?  echo $xml_data2->dataDaily->data->lots; ?>
        </td>
        <td >
        	<?
			if($xml_data->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        	<span class="<? echo $class;?>">
			<? echo $xml_data->value;?>%</span><br>
			<? //echo money_format_2(($xml_data->value*100/$xml_data2->dataDaily->data->balance)); ?>
            <? echo money_format_1(( double ) ($xml_data->value*$xml_data2->dataDaily->data->balance/100)); ?>$
            
        </td>
        
        <td >
        	<?
			if($xml_data3->value>0)
        		$class = "profit";
			else
				$class = "lost";
		?>
        	<span class="<? echo $class;?>"><? echo $xml_data3->value;?>%</span>
        </td>
        <td>
        <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1578165" target="_blank"><img  style="width:350px;" border="0" src="http://widgets.myfxbook.com/widgets/<? echo $myfxbook_acc['num_acc']; ?>/large.jpg"/></a>
        </td>
    </tr>
    
    <? }*/ ?>

    
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
<?

$query = "
		SELECT 
		  `id`,
		  `name`,
		  `sale`,
		  `price`,
		  `prim`,
		  `referral`,
		  `id_type`
		FROM 
		  `products`
		WHERE
		  id = 1 ";
$sale_info = $db_gb->selectRow($query);

?>
</div>
	<div class="price"> Стоимость робота Mr. Gray <h3>По запросу<!--<? echo money_format_2($sale_info['price']); ?> р.--></h3> </div> 
	<a id="buy_gray" href="#dialog1" name="modal" place="Mr.Gray" link="http://g-bridge.ru<? echo $_SERVER['REQUEST_URI'];?>" class="buttom">Запрос</a>
	

    </section>
