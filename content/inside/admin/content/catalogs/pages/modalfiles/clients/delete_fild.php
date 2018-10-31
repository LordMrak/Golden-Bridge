<?
session_start();

include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");

$id=get_var_post('id');
$id_client=get_var_post('id_client');


$query="DELETE FROM `client_filds`
where
	`id` = ?  
  ;";
$rezult = $db_gb->delete($query, $id);

$query="SELECT 
  client_filds.id_client,
  client_filds.id,
  client_filds.value,
  client_type_filds.name
FROM
  client_filds
  INNER JOIN client_type_filds ON (client_filds.id_fild = client_type_filds.id)
where
	`id_client` = ?  
  ;";
$rezult2 = $db_gb->select($query, $id_client);
?>
<script>
$('.button_remove').click(function(){
			 	$('#all_add').load('content/catalogs/pages/modalfiles/clients/delete_fild.php',{
					'id':$(this).attr('id'),
					'id_client':"<? echo $id;?>"
				});
			 });
</script>

<? foreach($rezult2 as $rezult2) {?>
            <div><span><? echo $rezult2['value']." : ";?></span><? echo $rezult2['name'];  ?> <a id="<? echo $rezult2['id'];?>" class="button_remove" href="#" >  </a></div>
                    <? }?>