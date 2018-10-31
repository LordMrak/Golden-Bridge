<?

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


<!doctype html>
<html><head>
<meta charset="utf-8">
<title>GB::Справочники::Пользователи</title>
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
					'type_oper':'3'
				});
		});
		
	$('#srch').on('keyup',function(){
		$('#table_execut').load('content/catalogs/pages/modalfiles/users/search.php',{
					'obj':$(this).val()
				});
		});
	
});
</script>
<link rel="stylesheet" href="content/catalogs/pages/pages.css"> <!-- CSS reset -->
</head>

<body>
<div class="history"><a href="index.php" >Главная</a> :: <a href="index.php?link=catalogs">Справочники</a> :: <a >Пользователи</a></div>

<a id="0" name="modal2" class="button"> Добавить пользователя </a>

<div class="serch">
    <div>Поиск</div>
    <input id="srch">
</div>

<div id="table_execut">
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
    	<a id="<? echo $rezult['id'];?>" class="button_remove" href="#"> </a>
    </td>
</tr>
<?	
	}
}
?>
</table>
</div>

</body>
</html>
