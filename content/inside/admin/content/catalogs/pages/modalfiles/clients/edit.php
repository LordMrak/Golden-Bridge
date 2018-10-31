<?
session_start();

include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");

$id=get_var_post('id');


$query="SELECT 
  `id`,
  `F`,
  `I`,
  `O`,
  `sex`,
  `date`,
  `comment`,
  `work`
FROM 
  `clients`
where
	`id` = ?  
  ;";
$rezult=$db_gb->selectRow($query, $id);


$query='
		SELECT 
  `id`,
  `name`
FROM 
  `client_type_filds`;
		';
	$rezult1=$db_gb->select($query);
	
	
$query="SELECT 
  client_filds.id_client,
  client_filds.id_fild,
  client_filds.id,
  client_filds.value,
  client_type_filds.name
FROM
  client_filds
  INNER JOIN client_type_filds ON (client_filds.id_fild = client_type_filds.id)
where
	`id_client` = ?  
  ;";
$rezult2 = $db_gb->select($query, $id);
?>
<script>
		
		obj = 1;
		
		$('.window .close').click(function (e) {
			$('#mask, .window').hide();
   		 }); 
		 
		 $('#add_fild_butt').click(function(){
			 str2 = '<input id="val'+obj+'" type="text" />';
			
			 	$( "#all_add" ).append( '<div > <input name="val'+obj+'" type="text" /> <select name="type'+obj+'" > <? foreach($rezult1 as $rezult1){?><option value="<? echo $rezult1['id'];?>" ><? echo $rezult1['name'];?></option><? }?> </select> </div>' );
			
			$('#elements').val(obj);
			
			obj++;	
			
			 });
		 $('.button_remove').click(function(){
			 	$('#all_add').load('content/catalogs/pages/modalfiles/clients/delete_fild.php',{
					'id':$(this).attr('id'),
					'id_client':"<? echo $id;?>"
				});
			 });
		 $('#ok').click(function(){
			
			$("#amam").submit();
			
		});
		 
		 
</script>

<form id="amam" action="http://<? echo $_SERVER['SERVER_NAME'];?>/content/inside/admin/index.php?link=cat_client" method="post">
<div id="dialog1" class="window"  >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input name="F" id="F" type="text" value="<? echo $rezult['F'];?>" /></td>
                        <td class="td_title">Фамилия<sup>*</sup></td>
                        <td><input  name="I" id="I" type="text" value="<? echo $rezult['I'];?>" /> </td>
                        <td class="td_title">Имя<sup>*</sup></td>
                        
                    </tr>
                    <tr>
                        <td><input id="O" name="O" type="text" value="<? echo $rezult['O'];?>" /></td>
                        <td  class="td_title">Отчество</td>
                        <td>
                        	<select id="sex"  name="sex" >
                            	<option value="m" <? if( $rezult['sex']=='m') echo 'selected'; ?>>Муж</option>
                                <option value="w" <? if( $rezult['sex']=='w') echo 'selected'; ?>>Жен</option>
                            </select>
                        </td>
                         <td class="td_title" >Пол</td>
                    </tr>
                    <tr>
                    	<td><input id="work" name="work" type="checkbox" <? if( $rezult['work']=='y'){?>checked<? }?> style="width:15px;" /></td>
                        <td  class="td_title">Работаем</td>
                        
                        <td><textarea id="prim" name="prim"><? echo $rezult['comment']; ?></textarea> </td>
                        <td  class="td_title">Примечание</td>
                    </tr>

                </table>
                
                <div id="all_add">
                	<? foreach($rezult2 as $rezult2) {
						if($rezult2['id_fild']==1)
							$rez = format_phone($rezult2['value']);
						else
							$rez = $rezult2['value'];
						?>
                    	<div><span><? echo $rez." : ";?></span><? echo $rezult2['name'];  ?> <a id="<? echo $rezult2['id'];?>" class="button_remove" href="#" >  </a></div>
                    <? }?>
                    
                </div>
                
                <input id="id_client" name="id_client" type="hidden" value="<? echo $id;  ?>"  /> 
                <input id="type_oper" name="type_oper" type="hidden" value="2"  /> 
		  		<input id="elements" name="elements" type="hidden" value="0"  /> 
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
         <div class="d-login"><input id="add_fild_butt" type="button" value="Новое Поле"  /></div>
  	  </div>
      </form>