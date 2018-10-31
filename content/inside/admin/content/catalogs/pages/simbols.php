<?

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
	
	$rows_total=$db_gb->queryInfo['num_rows'];

?>


<!doctype html>
<html><head>
<meta charset="utf-8">
<title>GB::Справочники::Символы</title>
<script>

$(document).ready(function() {   
	
	$('a[name=modal2]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/simbols/add.php');
			make_mask();
			 
	});
	
	$('a[name=modal]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/simbols/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	$('.button_remove').on('click',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/simbols/edit_end.php',{
					'id':$(this).attr('id'),
					'type_oper':"3"
				});
		
		});
	
});
</script>
<link rel="stylesheet" href="content/catalogs/pages/pages.css"> <!-- CSS reset -->
</head>

<body>
<div class="history"><a href="index.php" >Главная</a> :: <a href="index.php?link=catalogs">Справочники</a> :: <a >Брокеры</a></div>

<a id="0" name="modal2" class="button"> Добавить компанию </a>

<div id="table_execut">
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
    	<a id="<? echo $rezult['id'];?>" class="button_remove" href="#" >  </a>
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
