
<script>
		$('.window .close').click(function (e) {
			$('#mask, .window').hide();
   		 }); 
		 
		 
		 $('#ok').click(function(){
			
			$('#table_execut').load('content/catalogs/pages/modalfiles/partner_fild/edit_end.php',{
				'name':$('#name').val(),
				'type_oper':$('#type_oper').val()
				});
		});
		 
		 
</script>
<div id="dialog1" class="window"  >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input id="name" type="text" value="" /></td>
                        <td class="td_title">Название<sup>*</sup></td>
                        
                    </tr>
                </table>
                <input id="type_oper" type="hidden" value="1"  /> 
		  
		 </div>
         <div class="d-login"><input  id="ok" class="close" type="button" value="ok"  /></div>
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>