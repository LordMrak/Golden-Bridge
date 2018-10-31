<?
session_start();
include("../../../../../../../templates/check_all_income.php");
include("../../../../../../../connection/con_base.php");

$id=get_var_post('id');

$query='
		SELECT 
		  `id`,
		  `name`,
		  `min_acc_trade`,
		  `min_acc_pamm`,
		  `kr_pl`,
		  `telefon`,
		  `site`,
		  `email`,
		  `prim`
		FROM 
		  `brokers`
		where
			`id` = ?  
		  
		  ;
		';
	$rezult=$db_gb->selectRow($query,$id);

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
				'id':$('#id_row').val(),
				'type_oper':$('#type_oper').val(),
				'prim':$('#prim').val()
				});
				
		});
		 
		 
</script>

<div id="dialog1" class="window"  >
          <div class="d-header">
            	<div class="head">Редактор информации</div>
		

          <table class="table_modal">
                	<tr>
                    	<td><input id="name" type="text" value="<? if(isset($rezult)) echo $rezult['name']; ?>" /></td>
                        <td >Название</td>
                        
                        <td><input id="telefon" type="text" value="<? if(isset($rezult)) echo $rezult['telefon']; ?>" /></td>
                        <td >Телефон</td>
                    </tr>
                    <tr>
                    	<td><input id="mindep" type="text" value="<? if(isset($rezult)) echo $rezult['min_acc_trade']; ?>" /> </td>
                        <td>Минимальный депозит</td>
                        
                        <td><input id="site" type="site" value="<? if(isset($rezult)) echo $rezult['site']; ?>" /></td>
                        <td >Сайт</td>
                    </tr>
                    <tr>
                    	<td><input id="min_acc_pamm" type="text" value="<? if(isset($rezult)) echo $rezult['min_acc_pamm']; ?>" /></td>
                        <td >Депозит для ПАММ</td>
                        
                        <td><input id="email" type="email" value="<? if(isset($rezult)) echo $rezult['email']; ?>" /></td>
                        <td >Email</td>
                    </tr>
                    <tr>
                    	<td><input id="kr_pl" type="text" value="<? if(isset($rezult)) echo $rezult['kr_pl']; ?>" /> </td>
                        <td >Кр. Плечо</td>
                    	<td>
                       		<textarea id="prim"  ><? if(isset($rezult)) echo $rezult['prim']; ?></textarea>
                        </td>
                        <td>Примечание</td>
                    </tr>
                </table>
                <input id="id_row" type="hidden" value="<? echo $id; ?>"  /> 
                <input id="type_oper" type="hidden" value="2"  /> 
		  <div class="d-login"><input  id="ok" class="close" type="button" value="ok"  /></div>
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
		 </div>
  	  </div>