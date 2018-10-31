
<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");
	
	$type_oper=get_var_post('type_oper');
	
if($type_oper == 3)//Удаление 
{
	$id_partner=get_var_post('id');
		$query='
			DELETE FROM 
			  `partners` 
			WHERE 
			  `id` = ?
			; ';
		$rezult=$db_gb->delete($query,$id_partner);
		
		$query='
			DELETE FROM 
			  `users_partner` 
			WHERE 
			  `users_partner`.`id_partner` = ?
			;';
		$rezult=$db_gb->delete($query,$id_partner);
	}

if(isset($rezult) && $rezult)
	{?>
	<script>
    window.location = "<? echo "http://".$_SERVER['SERVER_NAME']."/content/inside/admin/index.php?link=cat_partners";  ?>";
    </script>	
		<? };?>
		
