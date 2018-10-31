<?
session_start();
include("../../../../../../../../templates/check_all_income.php");
include("../../../../../../../../connection/con_base.php");

$id=get_var_post('id');

 $query='
		SELECT 
		  name
		FROM
		  client_type_filds
		where
			id = ?
		';
	$rezult=$db_gb->selectRow($query,$id);




?>
<script>
		$('.window .close').click(function (e) {
			$('#mask, .window').hide();
   		 }); 
		 
		 
		 $('#ok').click(function(){
			
			
			$('#table_execut').load('content/catalogs/pages/modalfiles/client_fild/edit_end.php',{
				'name':$('#name').val(),
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
                    	<td><input id="name" type="text" value="<? echo $rezult['name']; ?>" /></td>
                        <td class="td_title">Название<sup>*</sup></td>
                        
                    </tr>
                    
                    
                </table>
                <input id="type_oper" type="hidden" value="2"  /> 
		  
		 </div>
         <div class="d-login"><input  id="ok" class="close" type="button" value="ok"  /></div>
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>