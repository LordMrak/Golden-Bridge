
<script>

$(document).ready(function() {   

	$('a[name=modal]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/edit_broc.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	$('a.button_remove').on('click',function(){
		
		$('#boxes').load('content/catalogs/pages/modalfiles/delete_broc.php',
				{
					'id':$(this).attr('id')
				});
		
		});
	
});
</script>
<?
include("../../../../../../../connection/con_base.php");
include("../../../../../../../templates/check_all_income.php");
	
	
	$type_oper=get_var_post('type_oper');
	
	
	$name=get_var_post('name');
	$telefon=get_var_post('telefon');
	$mindep=get_var_post('mindep');
	$site=get_var_post('site');
	$min_acc_pamm=get_var_post('min_acc_pamm');
	$email=get_var_post('email');
	$kr_pl=get_var_post('kr_pl');
	$prim=get_var_post('prim');
	
	if($type_oper==2)
{
	$id=get_var_post('id');
	
	$query='
		UPDATE 
  `brokers`  
SET 
  `name` = ?,
  `min_acc_trade` = ?,
  `min_acc_pamm` = ?,
  `kr_pl` = ?,
  `telefon` = ?,
  `site` = ?,
  `email` = ?,
  `prim` = ?
 
WHERE 
  `id` = ?
;';

	$rezult=$db_gb->update($query,$name,$mindep,$min_acc_pamm,$kr_pl,$telefon,$site,$email,$prim,$id);
}
elseif($type_oper == 1)//Добавление нового брокера
{
	$query='
		INSERT INTO 
  `brokers`
(
  `name`,
  `min_acc_trade`,
  `min_acc_pamm`,
  `kr_pl`,
  `telefon`,
  `site`,
  `email`,
  `prim`
) 
VALUE (
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?
);';

	$rezult=$db_gb->insert($query,$name,$mindep,$min_acc_pamm,$kr_pl,$telefon,$site,$email,$prim);
	
	}
elseif($type_oper == 3)//Удаление брокера
{
	$id=get_var_post('id');
	$query='
		DELETE FROM 
		  `brokers` 
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
		  `name`,
		  `min_acc_trade`,
		  `min_acc_pamm`,
		  `kr_pl`,
		  `telefon`,
		  `site`,
		  `email`,
		  `prim`
		FROM 
		  `brokers`;
		';

	
	$rezult=$db_gb->select($query);
			
		
		
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
    	Минимальный счет
    </th>
    <th>
    	Минимальный ПАММ
    </th>
    <th>
    	Мах. кредитное плече
    </th>
    <th>
    	Телефон
    </th>
    <th>
    	Сайт
    </th>
    <th>
    	Email
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
<tr>
	<td>
    	<? echo $rezult['id'];?>
    </td>
    <td>
    	<? echo $rezult['name'];?>
    </td>
    <td>
    	<? echo $rezult['min_acc_trade'];?>
    </td>
    <td>
    	<? echo $rezult['min_acc_pamm'];?>
    </td>
    <td>
    	<? echo $rezult['kr_pl'];?>
    </td>
    <td>
    	<? echo $rezult['telefon'];?>
    </td>
    <td>
    	<a href="<? echo $rezult['site'];?>" target="_blank"><? echo $rezult['site'];?></a>
    </td>
    <td>
    	<? echo $rezult['email'];?>
    </td>
    <td>
    	<? echo $rezult['prim'];?>
    </td>
    <td>
    	<a  id="<? echo $rezult['id'];?>" href="#dialog1" name="modal" class="button_edit"></a>
    </td>
    <td>
    	<a id="-1" name="modal" class="button_remove" href="#" >  </a>
    </td>
</tr>
<?	
	}
}
?>
</table>