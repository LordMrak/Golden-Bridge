<?
session_start();

include("../../../../../../../../connection/con_base.php");



$query='
		SELECT 
  `id`,
  `name`
FROM 
  `client_type_filds`;
		';
	$rezult1=$db_gb->select($query);
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
		 
		 $('#ok').click(function(){
			//alert("<? echo $_SERVER['SERVER_NAME'];?>/content/inside/admin/index.php?link=cat_client");
			$("#amam").submit();
			
		});
		 
		 
</script>

<form id="amam" action="http://<? echo $_SERVER['SERVER_NAME'];?>/content/inside/admin/index.php?link=cat_client" method="post">
<div id="dialog1" class="window"  >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input name="F" id="F" type="text" value="" /></td>
                        <td class="td_title">Фамилия<sup>*</sup></td>
                        <td><input  name="I" id="I" type="text" value="" /> </td>
                        <td class="td_title">Имя<sup>*</sup></td>
                        
                    </tr>
                    
                    
                    <tr>
                    	
                        <td><input id="O" name="O" type="text" value="" /></td>
                        <td  class="td_title">Отчество</td>
                        <td>
                        	<select id="sex"  name="sex" >
                            	<option value="m">Муж</option>
                                <option value="w">Жен</option>
                            </select>
                        </td>
                         <td class="td_title" >Пол</td>
                    </tr>
                    <tr>
                    	<td><input id="work" name="work" type="checkbox" checked style="width:15px;" /></td>
                        <td  class="td_title">Работаем</td>
                        
                        <td><textarea id="prim" name="prim"></textarea> </td>
                        <td  class="td_title">Примечание</td>
                    </tr>

                </table>
                
                <div id="all_add">
                	
                </div>
                
                
                <input id="type_oper" name="type_oper" type="hidden" value="1"  /> 
		  		<input id="elements" name="elements" type="hidden" value="0"  /> 
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
         <div class="d-login"><input id="add_fild_butt" type="button" value="Новое Поле"  /></div>
  	  </div>
      </form>