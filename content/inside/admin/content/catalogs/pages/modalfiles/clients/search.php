
<script>

</script>
<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");
	
$per_page = 10;
$cur_page = 0;	
	$obj=get_var_post('obj');
	
	

	
	if($obj!="")
{
	
	$query='
		SELECT 
		  clients.id,
		  clients.F,
		  clients.I,
		  clients.O,
		  clients.sex,
		  clients.`comment`,
		  clients.`date`,
		  clients.work,
		  SUM(client_inout.`in`) AS `in`,
		  SUM(client_inout.out) AS `out`,
		  count(events.id) AS `count`
		FROM
		  clients
		  LEFT JOIN events ON (clients.id = events.id_client)
		  LEFT JOIN client_inout ON (clients.id = client_inout.id_client)
        WHERE
          clients.F REGEXP ? or
          clients.I REGEXP ? or
          clients.O REGEXP ?
		group by
          clients.id
        ORDER BY
		  `id` DESC
		LIMIT 0,50
		';
	$rezult=$db_gb->select($query,$obj,$obj,$obj);
	
}
else
{
	$query='
		SELECT 
		  clients.id,
		  clients.F,
		  clients.I,
		  clients.O,
		  clients.sex,
		  clients.`comment`,
		  clients.`date`,
		  clients.work,
		  SUM(client_inout.`in`) AS `in`,
		  SUM(client_inout.out) AS `out`,
		  count(events.id) AS `count`
		FROM
		  clients
		  LEFT JOIN events ON (clients.id = events.id_client)
		  LEFT JOIN client_inout ON (clients.id = client_inout.id_client)

		group by
          clients.id
        ORDER BY
		  `id` DESC
		LIMIT ?,?;';

	$rezult      = $db_gb->select($query,$cur_page,$per_page);

	$rows_total  = $db_gb->queryInfo['num_rows'];
	
	}

?>
<script>

$(document).ready(function() {   
		$('a[name=more_client]').attr('id','10');
	$('a[name=modal2]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/clients/add.php');
			make_mask();
			 
	});
	
	$('a[name=modal]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/clients/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	$('tr[class=tr_click]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/clients/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	
	$('.button_remove').on('click',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/clients/edit_end.php',{
					'id':$(this).attr('id'),
					'type_oper':"3"
				});
		});
		
	$('#srch').on('keyup',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/clients/search.php',{
					'obj':$(this).val()
				});
		
		});
	
	
	//Добавляем еще клиентов с шагом
	
	$('a[name=more_client]').on('click',function(){
		
				
			if($(this).attr('id')!=-1)
			{
				$("#happy").load('content/catalogs/pages/modalfiles/clients/more_clients.php',{
					'page_now':$(this).attr('id'),
					'step':"<? echo $per_page;?>"
					
				});
			};
		});
	
	
});
</script>

<table id="table_1_" class="table_1">
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
    	Отчество
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
    <th  width="300px">
    	Примечание
    </th>

    <th>
    </th>
    <th>
    	
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
    	<? echo $rezult['O'];?>
    </td>
    <td>
    	<? if( $rezult['sex'] == 'm') echo '<img src="../img/ico/user_man.png" width="28px">'; else echo '<img src="../img/ico/user_woman.png" width="28px">'; ?>
    </td>
    <td>
    	<? echo $rezult['date'];?>
    </td>
    <td>
    	<? echo $rezult['work'];?>
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
    	<? echo $rezult['comment'];?>
    </td>
    
    <td>
    	<a  id="<? echo $rezult['id'];?>" href="#dialog1" name="modal" class="button_edit"></a>
    </td>
    <td>
    	<a id="<? echo $rezult['id'];?>" class="button_remove" href="#" >  </a>
    </td>
</tr>
<?	
	}
}
?>
</table>