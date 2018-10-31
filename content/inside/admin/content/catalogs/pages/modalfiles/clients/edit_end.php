
<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");
	
	$type_oper=get_var_post('type_oper');
	
if($type_oper == 3)//Удаление 
{
	$id_client=get_var_post('id');
		$query='
			DELETE FROM 
			  `clients` 
			WHERE 
			  `id` = ?
			; ';
		$rezult=$db_gb->delete($query,$id_client);
		
		$query='
			DELETE FROM 
			  `client_filds` 
			WHERE 
			  `client_filds`.`id_client` = ?
			;';
		$rezult=$db_gb->delete($query,$id_client);
	}

if(isset($rezult) && $rezult)
	{?>
	<script>
    window.location = "<? echo "http://".$_SERVER['SERVER_NAME']."/content/inside/admin/index.php?link=cat_client";  ?>";
    </script>	
		<? };?>
		
