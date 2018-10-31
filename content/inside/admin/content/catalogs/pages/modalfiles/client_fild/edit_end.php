
<script>

$(document).ready(function() {   
	$('div#boxes').empty();
	$('a[name=modal2]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/client_fild/add.php');
			make_mask();
			 
	});
	
	$('a[name=modal]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/client_fild/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	$('.button_remove').on('click',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/client_fild/edit_end.php',{
					'id':$(this).attr('id'),
					'type_oper':"3"
				});
		
		});
		
	$('#srch').on('keyup',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/client_fild/search.php',{
					'obj':$(this).val()
				});
		
		});
	
});
</script>
<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");
	
	// Получение кода операции
	$type_oper=get_var_post('type_oper');
	// Получение кода операции
	$name=get_var_post('name');

	
if($type_oper==2)
{
	$id=get_var_post('id');
	
	 $query='
		UPDATE 
  `client_type_filds`  
SET 
  `name` = ?
 
WHERE 
  `id` = ?
;
		;';

	$rezult=$db_gb->update($query,$name,$id);
}
elseif($type_oper == 1)//Добавление нового пользователя
{
	if($name != "" )//Если внесены минимум данных
	{
	
			
		$query = 'INSERT INTO 
		  `client_type_filds`
		(
		  `name`
		) 
		VALUE (
		 
		  ?
		);';
		$rezult=$db_gb->insert($query,$name);
				
	}//Если внесены минимум данных
}
elseif($type_oper == 3)//Удаление брокера
{
	$id=get_var_post('id');
	$query='
		DELETE FROM 
		  `client_type_filds` 
		WHERE 
		  `id` = ?
		; ';
	$rezult=$db_gb->delete($query,$id);
	}

if(isset($name))
	{?>
	<script>
    $('.window .close').click(function (e) {
			$('#mask, .window').hide();
   		 }); 
    </script>	
		<? };
		
$query='
		SELECT 
  `id`,
  `name`
FROM 
  `client_type_filds`;
		';

	
	$rezult=$db_gb->select($query);
	
	$rows_total=$db_gb->queryInfo['num_rows'];
		
		
?>


<table class="table_1">
<tr>
	<th>
    	id
    </th>
    <th>
    	Название
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
<tr>
	<td>
    	<? echo $rezult['id'];?>
    </td>
    <td>
    	<? echo $rezult['name'];?>
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