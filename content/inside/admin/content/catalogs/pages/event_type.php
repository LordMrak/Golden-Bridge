﻿<?

$query='
		SELECT 
  `id`,
  `name`
FROM 
  `event_type`;
		';

	
	$rezult=$db_gb->select($query);
	
	$rows_total=$db_gb->queryInfo['num_rows'];

?>


<!doctype html>
<html><head>
<meta charset="utf-8">
<title>GB::Справочники::Типы полей событий</title>
<script>

$(document).ready(function() {   
	
	$('a[name=modal2]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/event_type/add.php');
			make_mask();
			 
	});
	
	$('a[name=modal]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/event_type/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	$('.button_remove').on('click',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/event_type/edit_end.php',{
					'id':$(this).attr('id'),
					'type_oper':"3"
				});
		
		});
		
	$('#srch').on('keyup',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/event_type/search.php',{
					'obj':$(this).val()
				});
		
		});
	
});
</script>
<link rel="stylesheet" href="content/catalogs/pages/pages.css"> <!-- CSS reset -->
</head>

<body>
<div class="history"><a href="index.php" >Главная</a> :: <a href="index.php?link=catalogs">Справочники</a> :: <a >Типы событий клиента</a></div>

<a id="0" name="modal2" class="button"> Добавить тип событий </a>

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
</div>

</body>
</html>
