<?
session_start();

?>
<script>

		$('.window2 .close').click(function (e) {
			$('#mask, .window2').hide();
   		 }); 
		 
		 
		 $('#ok').click(function(){
			
			$("#amam").submit();
			
		});
		 
</script>

<form id="amam" action="http://<? echo $_SERVER['SERVER_NAME'];?>/index.php?link=personal&page=clients" enctype='multipart/form-data' method="post">
<div id="dialog2" class="window2"  >
          <div class="d-header">
            	<div class="head">Редактор информации</div>

          <table class="table_modal">
                	<tr>
                    	<td><input name="file" id="file" type="file" /></td>
                        <td class="td_title">Файл excel с клиентами<sup>*</sup></td>
                    </tr>
                    <tr>
                        <td><a href="content/partner_inside/content/action/files/temp.xlsx" >скачать файл</a></td>
                        <td class="td_title">Скачать файл с примером<sup>*</sup></td>
                        
                    </tr>
                    
                </table>
                
                
                
                
                <input id="type_oper" name="type_oper" type="hidden" value="import_excel"  /> 
		  		
		 </div>
         <div class="d-login"><input  id="ok"  type="button" value="ok"  /></div>
         <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
  	  </div>
      </form>