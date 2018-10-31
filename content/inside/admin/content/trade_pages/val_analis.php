<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Анализ валют по счетам</title>
<link rel="stylesheet" href="content/main/account_collection/css.css"> <!-- CSS reset -->
</head>

<body>

<?
    $num_schet = get_var_get('num_schet');
	if(!$num_schet) $num_schet = 0;
	
	$select_o = get_var_get('select_o');
	if(!$select_o) $select_o = "-";
	
	
	$select_bro_text = "";
	$select_num_sch_text = "";
	
	if($select_o!="-")
		$select_bro_text = " and `trade_operations_live`.`broker` = '".$select_o."'";
		
	if($num_schet!=0)
		$select_num_sch_text = " and `trade_operations_live`.`num_schet` = ".$num_schet;
		
 $query='
		SELECT 
		  `broker`,
		  `num_schet`,
		  `schet_bro_info`.`ACCOUNT_NAME`,
		  sum(`volum`) as `volum`,
		  `symbol`,
		  `schet_bro_info`.`currency`,
		  sum(`comission`)+
		  sum(`swap`) +
		  sum(`profit`) as `profit`
		FROM 
		  `trade_operations_live`
		LEFT JOIN `schet_bro_info` on (`schet_bro_info`.`number` = `trade_operations_live`.`num_schet`)
		'.$select_bro_text .'
		'.$select_num_sch_text.'
		group by
		`num_schet`,`symbol` ;';
	$rezult      = $db_gb->select($query);
	$rows_total  = $db_gb->queryInfo['num_rows'];
	
	
	//Возмем отдельно все валюты учавствующие в торговле
	
	$query="SELECT 
			  `symbol`
			FROM 
			  `trade_operations_live`
			group by 
			`trade_operations_live`.`symbol`
			  ;";
	$rezult_val      = $db_gb->select($query);
	$rows_total_val  = $db_gb->queryInfo['num_rows'];
	
			$query="SELECT 
		  `id`,
		  `number`,
		  `date`,
		  `server`,
		  `currency`,
		  `real`,
		  `ACCOUNT_NAME`,
		  `ACCOUNT_COMPANY`,
		  `margin_call`,
		  `stop_out`,
		  `ACCOUNT_LEVERAGE`,
		  `ACCOUNT_LIMIT_ORDERS`,
		  `ACCOUNT_BALANCE`,
		  `ACCOUNT_CREDIT`
		FROM 
		  `schet_bro_info`;";
	$rezult_schet      = $db_gb->select($query);
	$rows_total_schet  = $db_gb->queryInfo['num_rows'];
	
	$query="SELECT 
		  `broker`
		FROM 
		  `trade_operations_live`
		group by 
		  `broker`
			  ;";
	$rezult_Bro      = $db_gb->select($query);
	
	$rows_total_Bro  = $db_gb->queryInfo['num_rows'];
	
	foreach($rezult_schet as $rezult_schet)
	{
		int $temp = 0;
		$Mass_Info[]['broker'] = $rezult_schet['ACCOUNT_COMPANY'];
		temp = count($Mass_Info)-1;
		
		$Mass_Info[$temp]['number'] = $rezult_schet['number'];
		$Mass_Info[$temp]['fio']    = $rezult_schet['ACCOUNT_NAME'];
		$Mass_Info[$temp]['number'] = $rezult_schet['number'];
	}
	
?>
<h2>Таблица торговых результатов по валютам</h2>
<div class="timer_refresh">Последнее обновление: <span><? echo date("Y-m-d H:i:s"); ?></span></div>
<form name="filtr" target="_self" class="filtr" method="get">
	<div class="filtr_row">
    	<input name="num_schet" value="<? echo $num_schet;?>"> <span class="title_filtr">Номер счета</span>
    </div>
    <div class="filtr_row">
    <select name="select_o">
    	<option  <? if($select_o=="-") echo "selected";?> value="-"><? echo "Все";?></option>
    	<? foreach($rezult_Bro as $rezult_Bro) {?>
        	<option <? if($select_o==$rezult_Bro['broker']) echo "selected";?> value="<? echo $rezult_Bro['broker'];?>"><? echo $rezult_Bro['broker'];?></option>
        <? };?>
    </select>
    </div>
    <div class="filtr_row"><button type="submit" >Фильтр</button></div>
</form>

<table class = "table_2" >

<tr>
	<th></th>
	<th>Брокер</th>
    <th>Номер счета</th>
    <th>ФИО</th>
    
    <? foreach($rezult_val as $value){?><th><? echo $value['symbol']; ?></th><? };?>
</tr>
<?
if($rows_total_schet>0)
{
	foreach($rezult_schet as $rezult_schet)
	{
	?>
	<tr>
		<td><? echo $rezult_schet['broker']; ?></td>
		<td><? echo $rezult_schet['num_schet']; ?></td>
		<td><? echo $rezult_schet['ACCOUNT_NAME']; ?></td>
		<td class="main_i <? if($result_trade>0)echo "profit"; else echo "lost";?>"><? echo money_format_1($rezult['profit'])." ".$rezult['currency'];?></td>
                <td><?
				 echo $rezult['volum'];
		?></td>
        
		<td ><? echo money_format_1($rezult['balance_begin'])." ".$rezult['currency']; ?></td>
		<td class="main_i"><? echo money_format_1($rezult['balance_now'])." ".$rezult['currency']; ?></td>
		<td class="main_i"><? echo money_format_1($rezult['ACCOUNT_EQUITY'])." ".$rezult['currency']; ?></td>
		<td><? echo money_format_1($rezult['ACCOUNT_MARGIN']); ?></td>
		<td><? echo money_format_1($rezult['ACCOUNT_MARGIN_FREE']); ?></td>
		<td><? echo $rezult['ACCOUNT_MARGIN_LEVEL']; ?></td>
		
	</tr>
	<? }
  }
	?>
</table>

</body>
</html>
