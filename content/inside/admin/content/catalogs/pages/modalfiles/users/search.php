
<script>

</script>
<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");
	
	
	$obj=get_var_post('obj');
	
	

	
	if($obj!="")
{
	
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
        WHERE
          users.login REGEXP ? or
          users.F REGEXP ? or
          users.I REGEXP ? or
          users.O REGEXP ? or
          users.email REGEXP ?
		GROUP BY
		  users.id;';

	$rezult=$db_gb->select($query,$obj,$obj,$obj,$obj,$obj);
	
}
else
{
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
		  users.id;';

	$rezult=$db_gb->select($query);
	
	}

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