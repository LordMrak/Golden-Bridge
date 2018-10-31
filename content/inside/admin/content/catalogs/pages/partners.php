﻿<?


include("modalfiles/partners/end_add.php");


$per_page = 10;
$cur_page = 0;

    $cur_page = get_var_post('page');
	if(!$cur_page) $cur_page = 0;

$start = ($cur_page - 1) * $per_page;


$query='
		SELECT 
		  partners.id,
		  partners.name,
		  partners_type.name as `type_part`,
		  partners1.name as `him_part`,
		  partners.dinamic,
		  partners.work,
		  partners.comment,
		  partners_pay_system.name_partner,
		  partners_pay_system.proc,
		  partners_pay_system.link_pic_man,
		  partners_pay_system.link_pic_woman,
		  users.sex
		FROM
		  partners_type
		  INNER JOIN partners ON (partners_type.id = partners.Id_type_partner)
		  INNER JOIN partners partners1 ON (partners.id_partner = partners1.id)
          INNER JOIN partners_pay_system ON (partners.id_rang = partners_pay_system.id)
          INNER JOIN users_partner ON (partners.id = users_partner.id_partner)
		    INNER JOIN users ON (users_partner.id_user = users.id)
			  
		group by
          `id`
        ORDER BY
		  `id` DESC
		LIMIT ?,?
		';
	$rezult      = $db_gb->select($query,$cur_page,$per_page);

	$rows_total  = $db_gb->queryInfo['num_rows'];
	$num_pages = ceil($rows_total / $per_page);
	$page = 0;
?>  


<!doctype html>
<html><head>
<meta charset="utf-8">
<title>GB::Справочники::Партнеры</title>
<script>

$(document).ready(function() {   
	
	
	$('.button_remove').on('click',function(){
		
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/partners/edit_end.php',{
					'id':$(this).attr('id'),
					'type_oper':"3"
				});
				

		});
	
	$('a[name=modal2]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/partners/add.php');
			make_mask();
			 
	});
	
	$('a[name=modal]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/partners/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	$('tr[class=tr_click]').on('click',function(e){

			$('#boxes').load('content/catalogs/pages/modalfiles/partners/edit.php',
				{
					'id':$(this).attr('id')
				});
			make_mask();
			 
	});
	
	
	
		
	$('#srch').on('keyup',function(){
		
		$('#table_execut').load('content/catalogs/pages/modalfiles/partners/search.php',{
					'obj':$(this).val()
				});
		
		});
	
	
	//Добавляем еще клиентов с шагом
	
	$('a[name=more_]').on('click',function(){
		
				
			if($(this).attr('id')!=-1)
			{
				$("#happy").load('content/catalogs/pages/modalfiles/partners/more_partners.php',{
					'page_now':$(this).attr('id'),
					'step':"<? echo $per_page;?>"
					
				});
			};
		});
	
	
});
</script>
<link rel="stylesheet" href="content/catalogs/pages/pages.css"> <!-- CSS reset -->
</head>

<body>
<div class="history"><a href="index.php" >Главная</a> :: <a href="index.php?link=catalogs">Справочники</a> :: <a >Партнеры</a></div>

<a id="0" name="modal2" class="button"> Добавить партнера </a>

<div class="serch">
    <div>Поиск</div>
    <input id="srch">
</div>

<div id="table_execut">
<table id="table_1_" class="table_1">
<tr>
	<th>
    	id
    </th>
    <th>
    	ФИО
    </th>
    <th>
    	Тип партнера
    </th>
    
    <th>
    	Кто привлек
    </th>
    <th>
    	Ранг
    </th>
    <th>
    	
    </th>
    <th>
    	Изменение проц
    </th>
    <th>
    	Процент
    </th>
    <th>
    	Работаем
    </th>
    <th>
    	Комментарий
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
    	<? echo $rezult['name'];?>
    </td>
    <td>
    	<? echo $rezult['type_part'];?>
    </td>
    <td>
    	<? echo $rezult['him_part'];?>
    </td>
    <td>
    	<? echo $rezult['name_partner'];?>
    </td>
    <td>
    	<? if($rezult['sex']=="m") echo '<img src="../img/ico/'.$rezult["link_pic_man"].'" width="32px">'; else echo '<img src="../img/ico/'.$rezult["link_pic_man"].'" width="32px">';?>
    </td>
    <td>
    	<? if( $rezult['dinamic'] == '1') echo '<img src="../img/tick.png" width="16px">'; else echo '<img src="../img/no.png" width="16px">'; ?>
    </td>
    <td>
    	<? echo $rezult['proc'];?>
    </td>
    <td>
    	<? if( $rezult['work'] == 'y') echo '<img src="../img/tick.png" width="16px">'; else echo '<img src="../img/no.png" width="16px">'; ?>
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



<!--<div>



</div>-->

</div>
<a id="<? echo $per_page;?>" name="more_" class="button"> еще клиенты </a><div id="happy"></div>
</body>
</html>
