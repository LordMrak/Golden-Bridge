<?
if(isset($type_oper)){
	switch ($type_oper){	
		case "add_client":include('content/partner_inside/content/action/clients/add_client_end.php'); break;
		case "import_excel":include('content/partner_inside/content/action/clients/import_excel_end.php'); break;
		case "del_client":include('content/partner_inside/content/action/clients/del_clients_end.php'); break;
		
	}
}
 
	$row_in = get_var_get('row_in');
	$row_out = get_var_get('row_out');
$per_page = 5;
$cur_page = 0;

    $cur_page = get_var_get('cur_page');
	if(!$cur_page) $cur_page = 0;

$start = $cur_page * $per_page;


//Получаем поисковые запросы

$date_b = get_var_get('date_b');
if(!isset($date_b)) $date_b = date("Y")."-01-01";

$date_e = get_var_get('date_e');
if(!isset($date_e)) 
{
		
	$date = new DateTime(date("Y-m-d"));
	$date->modify('+1 day');
	$date_e = $date->format('Y-m-d');
}
//Поиск
$search = get_var_get('search');
if( isset($search) && $search!='Введите запрос') 
{
$search_text = "and (clients.O REGEXP '".$search."' or
		   clients.F REGEXP '".$search."' or
           clients.I REGEXP '".$search."'  or
		   clients.tel REGEXP '".$search."'  or
		   clients.email REGEXP '".$search."'  or
		   clients.city REGEXP '".$search."' 
		   )
		   ";
}else
{
	$search_text = "";
	}
if(!isset($search))$search='Введите запрос';

//Реальные счета
$schet_open = get_var_get('schet_open');
if($schet_open=='on')
$schet_open_text =  'clients.id in (select `schet_bro`.`id_client` from `schet_bro` where `schet_bro`.`real`=1) and';
else $schet_open_text = '';

//Работаем?
$check = get_var_get('check');
$workis = get_var_get('workis');
if($workis=='on')
	$workis_text = 'y'; else $workis_text = 'n'; 
if($workis!='on' && (!isset($check)||$check=="")) $workis_text = 'y';
//if($date_b=="" || $date_b==NULL) $workis_text = 'y';

//Есть события в будущем
$event_future = get_var_get('event_future');
if($event_future=='on')
$event_future_text =  'clients.id in (select `events`.`id_client` from `events` where `events`.`date`>"'.date('Y-m-d 00:00:00').'") and';
else $event_future_text = '';


 $query='
		SELECT 
		  clients.id,
		  clients.F,
		  clients.I,
		  clients.O,
		  clients.sex,
		  clients.`comment`,
		  clients.`date`,
		  clients.`date_berth`,
		  clients.work,
		  clients.`tel`,
		  clients.`email`,
		  clients.`city`,
		  SUM(client_inout.`in`) AS `in`,
		  SUM(client_inout.out) AS `out`,
		  count(events.id) AS `count`
		FROM
		  clients
		  LEFT JOIN events ON (clients.id = events.id_client)
		  LEFT JOIN client_inout ON (clients.id = client_inout.id_client)
		where
		 '.$schet_open_text.'
		 '.$event_future_text.'
		  clients.id_partner = ? and
		  clients.work = "'.$workis_text.'" and
		  clients.`date` >= ? and
		  clients.`date` <= ?
		  '.$search_text .'
		group by
          clients.id
        ORDER BY
		  `id` DESC
		LIMIT ?,?
		'; 
	$rezult      = $db_gb->select($query,$partner_info['id_part'],$date_b,$date_e,$start,$per_page);
	
	
	
	$querty = 'SELECT 
		  count(*) as `count`
		FROM
		  clients
		  LEFT JOIN events ON (clients.id = events.id_client)
		  LEFT JOIN client_inout ON (clients.id = client_inout.id_client)
		where
		 '.$schet_open_text.'
		 '.$event_future_text.'
		  clients.id_partner = ? and
		  clients.work = "'.$workis_text.'" and
		  clients.`date` >= ? and
		  clients.`date` <= ?
		  '.$search_text .'
		;';
	$rows_total = $db_gb->selectRow($querty,$partner_info['id_part'],$date_b,$date_e);
	
	$num_pages = ceil($rows_total['count'] / $per_page);
?>



<script src="content/partner_inside/content/clients.js"></script>
<? if(isset($row_in)&&isset($row_in)){?>
<div style="margin:10px 10px 10px 25px; color:hsla(358,38%,59%,0.88); border:1px solid hsla(216,30%,34%,1.00); display:inline-block; padding:25px;">
        	<div style="color:hsla(54,55%,44%,1.00);" class="gold">Следующие данные об импорте клиентов:</div>
            <? echo "Добавлено ".$row_in." клиентов!<br>"; ?>
            <? echo "Не удалось добавить ".$row_out." клиентов!<br>"; ?>
        </div>
<? }?>        
        
<form id="idata_client_form" action="http://<? echo $_SERVER['SERVER_NAME'];?>/index.php?link=personal&page=clients" method="get ">
<div class="consol_div" style="display:inline-block;">
	<!--<a id="0" name="modal2" class="button parter_botton s_box_shadow"> Добавить клиента </a>-->
    <input id="0" name="modal2" type="button" class="buttom add_client" value="Добавить клиента"> 
    <input id="<? echo $per_page;?>" name="more_client"  type="button" class="buttom" value="еще клиенты"> 
</div> 


<div class="consol_div" style="display:inline-block;">
	<div style="text-align:center;">Дата добавления</div>
	<div> 
    	<div class="input_div">с   <input id="date_b" name="date_b" class="datepicker parter_botton" value="<? echo $date_b;?>" ></div> 
        <div class="input_div">по  <input id="date_e" name="date_e"  class="datepicker parter_botton" value="<? echo $date_e;?>"></div> 
    </div>
</div> 


<div class="consol_div" style="display:inline-block;">
	<div style="text-align:center; width:200px;">Динамический поиск</div>
	<div class="input_div">Поиск   <input id="search" name="search" class="parter_botton" value="<? echo $search;	 ?>" onFocus="this.value='';" onBlur="if(this.value == '')this.value = 'Введите запрос';" ></div> 
</div> 

<div class="consol_div" style="display:inline-block;">
	<div class="input_div" style="text-align:right;">
        Открыт счет          <input style="vertical-align:middle;" id="schet" name="schet_open" class="parter_botton" type="checkbox"   <? if($schet_open=='on'){?> checked<? }?>   ><br>
        Работаем            <input style="vertical-align:middle;" id="schet" name="workis" class="parter_botton" type="checkbox"       <? if($workis_text=='y'){?> checked<? }?>  ><br>
		Событие в будущем   <input style="vertical-align:middle;" id="schet" name="event_future" class="parter_botton" type="checkbox" <? if($event_future=='on'){?> checked<? }?>   >
    </div> 
</div> 
<div  class="consol_div" style="display:inline-block;">
	<input id="import_excel" name="modal2" type="button" class="buttom" value="Загрузка Excel"> 
    <input id="0" name="submit" type="submit" class="buttom" value="Применить фильтры"> 

</div> 
<input name="link" type="hidden" value="personal">
<input name="page" type="hidden" value="clients">

<input name="check" type="hidden" value="0">
</form>
<table id="t_clients" class="table_partner inside_partner">
	<tr>
	<th>
    	id
    </th>
    <th>
    	Фамилия
    </th>
    <th>
    	Имя
    </th>

    <th>
    	Пол
    </th>

    <th>
    	Дата
    </th>
    <th>
    	Работаем
    </th>
    <th  >
    	кол. событий
    </th>
    <th  >
    	in
    </th>
    <th  >
    	out
    </th>
    <th  >
    	Телефон
    </th>
    <th  width="300px">
    	Примечание
    </th>

</tr>

<? 
if($rezult)
{
	foreach($rezult as $rezult)
	{
?>
<tr id="<? echo $rezult['id'];?>" class="tr_click">
	<td>
    	<? echo $rezult['id'];?>
    </td>
    <td>
    	<? echo $rezult['F'];?>
    </td>
    <td>
    	<? echo $rezult['I'];?>
    </td>

    <td>
    	<? if( $rezult['sex'] == 'm') echo '<img src="content/img/ico/user_man.png" width="28px">'; else echo '<img src="content/img/ico/user_woman.png" width="28px">'; ?>
    </td>
    <td>
    	<? echo $rezult['date'];?>
    </td>
    <td>
    	<? if($rezult['work']=='y'){?>
				<img src="content/img/ico/tick.png" width="16px">
			<? }else{?>
            	<img src="content/img/ico/delete.png" width="16px">
        <? }?>
    	
    </td>
    <td>
    	<? echo $rezult['count'];?>
    </td>
    
    <td>
    	<? echo $rezult['in'];?>
    </td>
    <td>
    	<? echo $rezult['out'];?>
    </td> 
    <td>
    	<? echo $rezult['tel'];?>
    </td>
    <td>
    	<? echo $rezult['comment'];?>
    </td>

</tr>
<?	
	}
}
?>
</table>
<div class="cli_list">
	<? 
		for( $i=1;$i<=$num_pages;$i++) 
		{?>
			<a class="<? if($i-1==$cur_page)echo "cli_list_act";?>" href="http://golden-bridge.ru/index.php?link=personal&page=clients&date_b=<? echo $date_b; ?>&date_e=<? echo $date_e; ?>&search=<? echo $search;?>&schet_open=<? echo $schet_open;?>&workis=<? echo $workis;?>&event_future=<? echo $event_future;?>&cur_page=<? echo $i-1;?>#t_clients"> <? echo $i;?> </a>
		<? }
		?>
</div>
<div id="happy"></div>