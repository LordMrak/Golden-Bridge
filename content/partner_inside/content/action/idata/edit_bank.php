<?
session_start();
include("../../../../../connection/con_base.php");
include("../../../../../templates/check_all_income.php");

$id=get_var_post('id');

$query = "SELECT 
		  `id`,
		  `id_partner`,
		  `fio`,
		  `card_number`,
		  `name_bank`,
		  `pc`,
		  `kc`,
		  `bik`,
		  `inn_bank`,
		  `kpp`,
		  `work`
		FROM 
	  `partner_bank` where `id` = ?;";
	  $banks = $db_gb->selectRow($query,$id);

$query='
		SELECT 
  `id`,
  `name`
FROM 
  `client_type_filds`;
		';
	$rezult1=$db_gb->select($query);
	
$query="SELECT 
  `id`,
  `name`,
  `Id_type_partner`,
  `id_partner`,
  `dinamic`,
  `proc`,
  `work`,
  `comment`
FROM 
  `partners`;";	
	$rezult2=$db_gb->select($query);

?>
<script>
		
		$('input').focusout(function(e) {
            //alert($(this).attr('chek'));
			$('#check_info').load('content/partner_inside/content/action/check_info.php',
			{
				'obj':$(this).attr('chek'),
				'val':$(this).val()
				});
        });
		
		obj = 1;
		$('.window2 .close').click(function (e) {
			
			$('#mask, .window2').stop().fadeTo(0);
			$('#mask, .window2').css("display","none");
			$("div#boxes").empty();
   		 }); 
		 
		 
		 $('#ok').click(function(){
			
			$("#amam").submit();
			$("div#boxes").empty();
		});
		 
		 
</script>

<form id="amam" action="http://<? echo $_SERVER['SERVER_NAME'];?>/index.php?link=personal#idata" method="post">
<div id="dialog2" class="window2" style="display:block;" >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input name="fio" id="fio" chek="name" type="text" value="<? echo $banks['fio'];?>" /></td>
                        <td class="td_title">ФИО<sup>*</sup></td>
                        <td><input  name="card_num" id="card_num" chek="number" type="text" value="<? echo $banks['card_number'];?>" /> </td>
                        <td class="td_title">Номер карты<sup>*</sup></td>
                    </tr>
                    <tr>
                        <td><input id="name_bank" name="name_bank" chek="name" type="text" value="<? echo $banks['name_bank'];?>" /></td>
                        <td  class="td_title">Название банка<sup>*</sup></td>
                        <td>
                        	<input id="pc" name="pc" chek="number" type="text" value="<? echo $banks['pc'];?>" />
                        </td>
                         <td class="td_title" >Расчетный счет<sup>*</sup></td>
                    </tr>
                    <tr>
                    	<td><input id="kc" name="kc" chek="number" type="text" value="<? echo $banks['kc'];?>" /></td>
                        <td  class="td_title">Кор. счет</td>
                        
                        <td><input id="bik" name="bik" chek="number" type="text" value="<? echo $banks['bik'];?>" /> </td>
                        <td  class="td_title">БИК</td>
                    </tr>
					<tr>
                    	<td><input id="inn" name="inn" chek="number" type="text" value="<? echo $banks['inn_bank'];?>" /></td>
                        <td  class="td_title">ИНН </td>
                        
                        <td><input id="kpp" name="kpp" chek="number" type="text" value="<? echo $banks['kpp'];?>" /> </td>
                        <td  class="td_title">КПП</td>
                    </tr>
                    <tr>
                    	<td><input id="work" name="work" type="checkbox" <? if($banks['work']=='y'){?> checked <? }?>width="5px"  /></td>
                        <td  class="td_title">Рабочий </td>
                        
                        <td></td>
                        <td  class="td_title"></td>
                    </tr>
                </table>
                
                <div id="check_info">
                	
                </div>
                <input id="id"  name="id" type="hidden" value="<? echo $id; ?>"  /> 
                <input id="type_oper" name="type_oper" type="hidden" value="edit_bank"  /> 
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>
      </form>