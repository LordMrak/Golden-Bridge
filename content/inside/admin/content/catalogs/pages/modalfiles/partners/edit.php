<?
session_start();

include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");

$id=get_var_post('id');


$query="SELECT 
		  partners.id,
		  partners.id_rang,
		  partners.name,
		  partners.Id_type_partner,
		  partners.id_partner,
		  partners.dinamic,
		  partners.proc,
		  partners.work,
		  partners.`comment`,
		  users_partner.id_user
		FROM
		  partners
		  INNER JOIN users_partner ON (partners.id = users_partner.id_partner)
		where
			partners.`id` = ?  
  ;";
$income_data=$db_gb->selectRow($query, $id);


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
                    	<td><input name="name" id="name" type="text" value="<? echo $income_data['name']; ?>" /></td>
                        <td class="td_title">Фамилия и Имя<sup>*</sup></td>
                        <td>
                        	<select name="type_part">
                        	<? foreach($rezult as $rezult){ ?>
                        	<option value="<? echo $rezult['id']; ?>" <? if( $income_data['Id_type_partner'] == $rezult['id']) echo "selected"; ?>><? echo $rezult['name']; ?></option>
                            <? } ?>
                        </select>
                        </td>
                        <td class="td_title">Тип Партнерства<sup>*</sup></td>
                        
                    </tr>
                    <tr>
                    	
                        <td>
                        	<select name="agent">
                        	<? foreach($rezult1 as $rezult1){ ?>
                        	<option value="<? echo $rezult1['id']; ?>" <? if( $income_data['id_partner'] == $rezult1['id']) echo "selected"; ?>><? echo $rezult1['name']; ?></option>
                            <? } ?>
                        </select>
                        </td>
                        <td  class="td_title">Привлекший агент</td>
                        <td>
                        	<input id="proc_d" name="proc_d" type="checkbox" <? if( $income_data['dinamic'] == 1) echo "checked"; ?> style="width:15px;" />
                        </td>
                         <td class="td_title" >Динам. проц.</td>
                    </tr>
                    <tr>
                    	
                        <td>
                        	<select name="user">
                        	<? foreach($rezult2 as $rezult2){ ?>
                        	<option value="<? echo $rezult2['id']; ?>" <? if( $income_data['id_user'] == $rezult2['id']) echo "selected"; ?>  ><? echo $rezult2['F']." ".$rezult2['I']; ?></option>
                            <? } ?>
                        </select>
                        </td>
                        <td  class="td_title">Пользователь</td>
                        <td><input id="work" name="work" type="checkbox" <? if( $income_data['work'] == 'y') echo "checked"; ?>  style="width:15px;" /></td>
                        <td  class="td_title">Работаем?</td>
                    </tr>
                    <tr>
                   		<td><input id="proc" name="proc"  /></td>
                        <td  class="td_title">Процент</td>
					    <td colspan="2"><textarea id="prim" name="prim"><? echo $income_data['comment']; ?></textarea> </td>
                        <td  colspan="2" class="td_title">Комментарии</td>
                    </tr>
                </table>
                
                
                <input id="id_partner" name="id_partner" type="hidden" value="<? echo $id;  ?>"  /> 
                <input id="type_oper" name="type_oper" type="hidden" value="2"  /> 
		  		<input id="elements" name="elements" type="hidden" value="0"  /> 
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>
      </form>