<script>
$(document).ready(function(){
     
  setTimeout(function() {window.location.reload();}, (60000*5));
});


</script>
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
  `schet_bro_info`.`id`,
		  `schet_bro_live`.`ACCOUNT_COMPANY`,
		  `schet_bro_live`.`number`,
		  Sum(`trade_operations_live`.`comission`) as `comission`,
		  Sum(`trade_operations_live`.`swap`) as `swap`,
		  Sum(`trade_operations_live`.`profit`) as `profit`,
		  `schet_bro_info`.`ACCOUNT_BALANCE` as `balance_begin`,
		  `schet_bro_info`.`currency`,
		  `schet_bro_live`.`ACCOUNT_BALANCE` as `balance_now`,
		  `schet_bro_live`.`ACCOUNT_EQUITY`,
		  `schet_bro_live`.`ACCOUNT_MARGIN`,
		  `schet_bro_live`.`ACCOUNT_MARGIN_FREE`,
		  `schet_bro_live`.`ACCOUNT_MARGIN_LEVEL`,
		  `schet_bro_info`.`ACCOUNT_NAME`
FROM 
  `schet_bro_info`
  LEFT JOIN `trade_operations_live` on (`schet_bro_info`.`number` = `trade_operations_live`.`num_schet`)
  LEFT JOIN `schet_bro_live` on (`schet_bro_info`.`number` = `schet_bro_live`.`number`)
  where 
		`schet_bro_info`.`number` <> 0  and
		`schet_bro_info`.`work` = 1
		'.$select_bro_text .'
		'.$select_num_sch_text.'
		  group by
		  `schet_bro_info`.`number` ;';
	$rezult      = $db_gb->select($query);

	$rows_total  = $db_gb->queryInfo['num_rows'];
	
	$query="SELECT 
		  `broker`
		FROM 
		  `trade_operations_live`
		group by 
		  `broker`
			  ;";
	$rezult_Bro      = $db_gb->select($query);
	
	$rows_total_Bro  = $db_gb->queryInfo['num_rows'];
	
?>
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
    <!--<th>Комиссия</th>
    <th>Своп</th>
    <th>Профит</th>-->
    <th>ФИО</th>
    <th>Просадка</th>
    <th>Торговля</th>
    <th>Баланс начальный</th>
    <th>Баланс сейчас</th>
    <th>Средства</th>
    <th>Маржа</th>
    <th>Своб. маржа</th>
    <th>Уровень</th>

</tr>
<?

if($rows_total>0)
{
	foreach($rezult as $key => $rezult)
	{
	?>
	<tr>
		<td><? echo $rezult['id']; ?></td>
		<td><? echo $rezult['ACCOUNT_COMPANY']; ?></td>
		<td><? echo $rezult['number']; ?></td>
		<!--<td><? echo money_format_1($rezult['comission'])." ".$rezult['currency']; ?></td>
		<td><? echo money_format_1($rezult['swap'])." ".$rezult['currency']; ?></td>
		<td><? echo money_format_1($rezult['profit'])." ".$rezult['currency']; ?></td>-->
        <td><? echo $rezult['ACCOUNT_NAME']; ?></td>
        <td><? 
				$result_trade = $rezult['ACCOUNT_COMPANY']+$rezult['swap']+$rezult['profit']; 
				if($rezult['balance_now']!=NULL)
				{
					$temp = $result_trade*100/$rezult['balance_now'];
					echo money_format_1($temp)."%";
				};
		?></td>
		<td class="main_i <? if($result_trade>0)echo "profit"; else echo "lost";?>"><? echo money_format_1($result_trade)." ".$rezult['currency'];?></td>
        
        
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