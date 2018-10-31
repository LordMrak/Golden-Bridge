<?
session_start();


?>
<script>
		$('.window .close').click(function (e) {
			$('#mask, .window').hide();
   		 }); 
		 
		 
		 $('#ok').click(function(){
			
			$('#table_execut').load('content/catalogs/pages/modalfiles/edit_broc_end.php',{
				'name':$('#name').val(),
				'telefon':$('#telefon').val(),
				'mindep':$('#mindep').val(),
				'site':$('#site').val(),
				'min_acc_pamm':$('#min_acc_pamm').val(),
				'email':$("#email").val(),
				'kr_pl':$('#kr_pl').val(),
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
                        <td >Название</td>
                        
                        <td><input id="telefon" type="text" value="" /></td>
                        <td >Телефон</td>
                    </tr>
                    <tr>
                    	<td><input id="mindep" type="text" value="" /> </td>
                        <td>Минимальный депозит</td>
                        
                        <td><input id="site" type="site" value="" /></td>
                        <td >Сайт</td>
                    </tr>
                    <tr>
                    	<td><input id="min_acc_pamm" type="text" value="" /></td>
                        <td >Депозит для ПАММ</td>
                        
                        <td><input id="email" type="email" value="" /></td>
                        <td >Email</td>
                    </tr>
                    <tr>
                    	<td><input id="kr_pl" type="text" value="" /> </td>
                        <td >Кр. Плечо</td>
                    	<td>
                       
                        </td>
                        <td></td>
                    </tr>
                </table>
                <input id="type_oper" type="hidden" value="1"  /> 
		  <div class="d-login"><input  id="ok" class="close" type="button" value="ok"  /></div>
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
		 </div>
  	  </div>