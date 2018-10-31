<?
session_start();

include("../../../../../../../../connection/con_base.php");



$query='
		SELECT 
  `id`,
  `name`
FROM 
  `partners_type`;
		';
	$rezult=$db_gb->select($query);
	
	
$query='
		SELECT 
  `id`,
  `F`,
  `I`
FROM 
  `users`;
		';
	$rezult2=$db_gb->select($query);	
	
$query='
		SELECT 
  `id`,
  `name`
FROM 
  `partners`
where 
  `work` = "y"  and
  `Id_type_partner` = 1
  ;';
	$rezult1=$db_gb->select($query);


?>
<script>
		
		obj = 1;
		
		$('.window .close').click(function (e) {
			$('#mask, .window').hide();
   		 }); 
		 
		 
		 
		 $('#ok').click(function(){
			
			$("#amam").submit();
		});
		 
		 
</script>

<form id="amam" action="http://<? echo $_SERVER['SERVER_NAME'];?>/content/inside/admin/index.php?link=cat_partners" method="post">
<div id="dialog1" class="window"  >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input name="name" id="name" type="text" value="" /></td>
                        <td class="td_title">Фамилия и Имя<sup>*</sup></td>
                        <td>
                        	<select name="type_part">
                        	<? foreach($rezult as $rezult){ ?>
                        	<option value="<? echo $rezult['id']; ?>"><? echo $rezult['name']; ?></option>
                            <? } ?>
                        </select>
                        </td>
                        <td class="td_title">Тип Партнерства<sup>*</sup></td>
                        
                    </tr>
                    <tr>
                    	
                        <td>
                        	<select name="agent">
                        	<? foreach($rezult1 as $rezult1){ ?>
                        	<option value="<? echo $rezult1['id']; ?>"><? echo $rezult1['name']; ?></option>
                            <? } ?>
                        </select>
                        </td>
                        <td  class="td_title">Привлекший агент</td>
                        <td>
                        	<input id="proc_d" name="proc_d" type="checkbox" checked style="width:15px;" />
                        </td>
                         <td class="td_title" >Динам. проц.</td>
                    </tr>
                    <tr>
                    	
                        <td>
                        	<select name="user">
                        	<? foreach($rezult2 as $rezult2){ ?>
                        	<option value="<? echo $rezult2['id']; ?>"><? echo $rezult2['F']." ".$rezult2['I']; ?></option>
                            <? } ?>
                        </select>
                        </td>
                        <td  class="td_title">Пользователь</td>
                        <td><input id="work" name="work" type="checkbox" checked style="width:15px;" /></td>
                        <td  class="td_title">Работаем?</td>
                    </tr>
                    <tr>
                   		<td><input id="proc" name="proc"  /></td>
                        <td  class="td_title">Процент</td>
					    <td colspan="2"><textarea id="prim" name="prim"></textarea> </td>
                        <td  colspan="2" class="td_title">Комментарии</td>
                    </tr>
                </table>
                
                <div id="all_add">
                	
                </div>
                
                
                <input id="type_oper" name="type_oper" type="hidden" value="1"  /> 
		  		<input id="elements" name="elements" type="hidden" value="0"  /> 
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
         
  	  </div>
      </form>