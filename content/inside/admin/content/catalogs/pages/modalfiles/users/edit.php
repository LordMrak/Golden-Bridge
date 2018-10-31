<?
session_start();
include("../../../../../../../../templates/check_all_income.php");
include("../../../../../../../../connection/con_base.php");

$id=get_var_post('id');

$query='
		SELECT 
		  users.id,
		  users.login,
		  users.F,
		  users.I,
		  users.O,
		  users.sex,
		  users.`date`,
		  users.email,
		  users.work,
		  users.prim,
		  users.access 
		FROM
		  users
		where
			users.id = ?
		';
	$rezult=$db_gb->selectRow($query,$id);


$query='
		SELECT 
  `id`,
  `code`,
  `name`
FROM 
  `acceess`;
		';
	$rezult1=$db_gb->select($query);


?>
<script>
		$('.window .close').click(function (e) {
			$('#mask, .window').hide();
   		 }); 
		 
		 
		 $('#ok').click(function(){
			
			
			$('#table_execut').load('content/catalogs/pages/modalfiles/users/edit_end.php',{
				'login':$('#login').val(),
				'F':$('#F').val(),
				'pass':$('#pass').val(),
				'I':$('#I').val(),
				'O':$('#O').val(),
				'sex':$("#sex").val(),
				'access':$('#access').val(),
				'email':$('#email').val(),
				'prim':$("#prim").val(),
				'work':$("#work").prop("checked"),
				'type_oper':$('#type_oper').val(),
				'id':'<? echo $id; ?>'
				});
				
		});
		 
		 
</script>

<div id="dialog1" class="window"  >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input id="login" type="text" value="<? echo $rezult['login']; ?>" /></td>
                        <td class="td_title">Логин<sup>*</sup></td>
                        <td><input  id="pass" type="password" value="" /> </td>
                        <td class="td_title">Пароль<sup>*</sup></td>
                        
                    </tr>
                    <tr>
                    	
                        <td><input id="F" type="text" value="<? echo $rezult['F']; ?>" /></td>
                        <td  class="td_title">Фамилия</td>
                        <td><input id="I" type="site" value="<? echo $rezult['I']; ?>" /></td>
                        <td class="td_title" >Имя<sup>*</sup></td>
                    </tr>
                    <tr>
                    	<td><input id="O" type="text" value="<? echo $rezult['O']; ?>" /></td>
                        <td class="td_title" >Отчетсво</td>
                        
                        <td>
                        	<select id="sex"  >
                            	<option <? if(isset($rezult1['sex'])&&$rezult1['sex'] == 'm')echo "selected"; ?> value="m">Муж</option>
                                <option <? if(isset($rezult1['sex'])&&$rezult1['sex'] == 'w')echo "selected"; ?> value="w">Жен</option>
                            </select>
                        </td>
                        <td class="td_title" >Пол</td>
                    </tr>
                    <tr>
                    	<td> 
                        	<select id="access" >
                            <?
                            	foreach($rezult1 as $rezult1)
								{
								?>
                            		<option value="<? echo $rezult1['code'];?>" <? if($rezult1['code'] == $rezult['access'])echo "selected"; ?>><? echo $rezult1['name'];?></option>
                                <? }?>
                            </select>
                        </td>
                        <td class="td_title" >Доступ</td>
                    	<td>
                       		<input id="email" type="email" value="<? echo $rezult['email'];?>" />
                        </td>
                        <td class="td_title">Email</td>
                    </tr>
                    <tr>
                    	<td colspan="3"><textarea id="prim"  ><? echo $rezult['prim'];?></textarea> </td>
                        <td  class="td_title">Примечание</td>
                    	
                    </tr>
                    
                    <tr>
                    	<td> </td>
                        <td  class="td_title"></td>
                    	<td>
                       		<input id="work" type="checkbox" <? if($rezult['work'] == 'y') echo "checked"; ?> />
                        </td>
                        <td class="td_title">Работает</td>
                    </tr>
                    
                    
                </table>
                <input id="type_oper" type="hidden" value="2"  /> 
		  
		 </div>
         <div class="d-login"><input  id="ok" class="close" type="button" value="ok"  /></div>
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>