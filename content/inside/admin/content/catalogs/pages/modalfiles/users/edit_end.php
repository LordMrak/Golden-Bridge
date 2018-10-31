
<script>

$(document).ready(function() {   

	$('a[name=modal2]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/users/add.php');
			make_mask();
			 
	});
	
	$('a[name=modal]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/users/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
	});
	
	$('.button_remove').on('click',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/users/edit_end.php',{
					'id':$(this).attr('id'),
					'type_oper':"3"
				});
		
		});
		
	$('#srch').on('keyup',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/users/search.php',{
					'obj':$(this).val()
				});
		});
	
});
</script>
<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");
	
	
	$type_oper=get_var_post('type_oper');
	

	$login=get_var_post('login');
	$pass=get_var_post('pass');
	$F=get_var_post('F');
	$I=get_var_post('I');
	$O=get_var_post('O');
	$sex=get_var_post('sex');
	$access=get_var_post('access');
	$email=get_var_post('email');
	$prim=get_var_post('prim'); 
	$client_add=get_var_post('client_add'); 
	$work=get_var_post('work');

	if($work=='true')$work='y'; else $work='n';
	
	if($type_oper==2)
{
	$id=get_var_post('id');
	
	if($pass != "")$pass_text = "`password` = '".md5($pass)."',"; else $pass_text = "";
	
	
	$query='
		UPDATE 
 	 `users`  
		SET 
		  `login` = ?,
		  '.$pass_text.'
		  `F` = ?,
		  `I` = ?,
		  `O` = ?,
		  `sex` = ?,
		  `access` = ?,
		  `email` = ?,
		  `work` = ?,
		  `prim` = ?
		WHERE 
		  `id` = ?
		;';

	$rezult=$db_gb->update($query,$login,$F,$I,$O,$sex,$access,$email,$work,$prim,$id);
}
elseif($type_oper == 1)//Добавление нового пользователя
{

if($I != "" && $login != "" && $pass != "" )//Если внесены минимум данных
{
	
	if($client_add == 'true')	
	{	
	
		$query = 'INSERT INTO 
					  `clients`
					(
					  `F`,
					  `I`,
					  `O`,
					  `sex`,
					  `date`,
					  `comment`
					) 
					VALUE (
					  ?,
					  ?,
					  ?,
					  ?,
					  ?,
					  ?
					);';
			$rezult=$db_gb->insert($query,$F,$I,$O,$sex,date("Y-m-d h:m:s"),$prim);
			$id_client=$db_gb->queryInfo['insert_id'];
		}else
		$id_client = 0;
		
		
	$query='
	INSERT INTO 
	  `users`
	(
	
	  `login`,
	  `password`,
	  `F`,
	  `I`,
	  `O`,
	  `sex`,
	  `access`,
	  `date`,
	  `email`,
	  `id_client`,
	  `work`,
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
	  ?,
	  ?,
	  ?,
	  ?,
	  ?
	);';
	
		$rezult=$db_gb->insert($query,$login,md5($pass),$F,$I,$O,$sex,$access,date("Y-m-d h:m:s"),$email,$id_client,$work,$prim);
}//Если внесены минимум данных
}
elseif($type_oper == 3)//Удаление брокера
{
	$id=get_var_post('id');
	$query='
		DELETE FROM 
		  `users` 
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
		  users.id,
		  users.login,
		  users.F,
		  users.I,
		  users.O,
		  users.sex,
		  users.`date`,
		  users.id_client,
		  users.email,
		  users.work,
		  users.prim,
		  count(users_partner.id_partner) AS partners,
		  acceess.name as `accname`
		FROM
		  users
		  left JOIN users_partner ON (users_partner.id_user = users.id)
		  LEFT OUTER JOIN acceess ON (users.access = acceess.code)
		GROUP BY
		  users.id;
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
    	Логин
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
    	Доступ
    </th>
    <th>
    	Дата рег.
    </th>
    <th>
    	email
    </th>
    </th>
    <th>
    	# Клиента
    </th>
    <th>
    	Партнерство
    </th>
    <th>
    	Работаем
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
    	<? echo $rezult['login'];?>
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
    	<? echo $rezult['accname'];?>
    </td>
    <td>
    	<? echo $rezult['date'];?>
    </td>
    <td>
    	<? echo $rezult['email'];?>
    </td>
    <td>
    	<? echo $rezult['id_client'];?>
    </td>
    <td>
    	<? echo $rezult['partners'];?>
    </td>
    <td>
    	<? echo $rezult['work'];?>
    </td>
    <td>
    	<? echo $rezult['prim'];?>
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