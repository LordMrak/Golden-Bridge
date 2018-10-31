<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");

$page_now=get_var_post('page_now');
$step=get_var_post('step');

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
		LIMIT ?,?
		';
	$rezult      = $db_gb->select($query,$page_now,$step);

	$rows_total  = $db_gb->queryInfo['num_rows'];



?>
<script>
$('a[name=modal]').on('click',function(e){

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
$('a[name=more_client]').attr('id',<? echo $page_now+$step; ?>);
</script>
<table class="table_1">
<? 
if($rezult)
{
	foreach($rezult as $rezult)
	{
?>

<script>

		$(".table_1").closest('tr').after('<tr>
		<td><? echo $rezult['id'];?></td>
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
			<? if( $rezult['sex'] == 'm') echo '<img src="../img/ico/user_man.png" width="28px">'; else  echo '<img src="../img/ico/user_woman.png" width="28px">'; ?>
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
			<a  id="<? echo $rezult['id'];?>" href = "#dialog1" name="modal" class="button_edit"></a>
		</td>
		<td>
			<a id="<? echo $rezult['id'];?>" class = "button_remove" href="#" >  </a>
		</td>
		</tr>');

		});

</script>


<tr>
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
    	<? if( $rezult['sex'] == 'm') echo '<img src="../img/ico/user_man.png" width="28px">'; else  echo '<img src="../img/ico/user_woman.png" width="28px">'; ?>
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
    	<a  id="<? echo $rezult['id'];?>" href = "#dialog1" name="modal" class="button_edit"></a>
    </td>
    <td>
    	<a id="<? echo $rezult['id'];?>" class = "button_remove" href="#" >  </a>
    </td>
</tr>
<?	
	}
}
?>
</table>
