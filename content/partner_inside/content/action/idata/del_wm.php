<?
session_start();
include("../../../../../connection/con_base.php");
include("../../../../../templates/check_all_income.php");

$id=get_var_post('id');
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
					  <table class="table_modal" style="margin:250px auto;">
                	<tr>
                    	<td>
                    Вы действительно хотите удалить запись? Вы крепко подумали?
                    </td></tr></table>
                <div id="check_info">
                	
                </div>
                <input id="id"  name="id" type="hidden" value="<? echo $id; ?>"  /> 
                <input id="type_oper" name="type_oper" type="hidden" value="del_wm"  /> 
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>
      </form>