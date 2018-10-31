<?
session_start();

include("../../../../../connection/con_base.php");



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

<form id="amam" action="http://<? echo $_SERVER['SERVER_NAME'];?>/index.php?link=personal&page=idata" method="post">
<div id="dialog2" class="window2" style="display:block;" >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input name="fio" id="fio" chek="name" type="text" value="" /></td>
                        <td class="td_title">ФИО<sup>*</sup></td>
                        <td><input  name="card_num" id="card_num" chek="number" type="text" value="" /> </td>
                        <td class="td_title">Номер карты<sup>*</sup></td>
                    </tr>
                    <tr>
                        <td><input id="name_bank" name="name_bank" chek="name" type="text" value="" /></td>
                        <td  class="td_title">Название банка<sup>*</sup></td>
                        <td>
                        	<input id="pc" name="pc" chek="number" type="text" value="" />
                        </td>
                         <td class="td_title" >Расчетный счет<sup>*</sup></td>
                    </tr>
                    <tr>
                    	<td><input id="kc" name="kc" chek="name" type="text" value="" /></td>
                        <td  class="td_title">Кор. счет</td>
                        
                        <td><input id="bik" name="bik" chek="number" type="text" value="" /> </td>
                        <td  class="td_title">БИК</td>
                    </tr>
					<tr>
                    	<td><input id="inn" name="inn" chek="number" type="text" value="" /></td>
                        <td  class="td_title">ИНН </td>
                        
                        <td><input id="kpp" name="kpp" chek="number" type="text" value="" /> </td>
                        <td  class="td_title">КПП</td>
                    </tr>
                    <tr>
                    	<td><input id="work" name="work" type="checkbox" checked width="5px" value="" /></td>
                        <td  class="td_title">Рабочий </td>
                        
                        <td></td>
                        <td  class="td_title"></td>
                    </tr>
                </table>
                
                <div id="check_info">
                	
                </div>
                <input id="type_oper" name="type_oper" type="hidden" value="add_bank"  /> 
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>
      </form>