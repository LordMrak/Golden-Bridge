<?
	
	$id=get_var_post('id');
	
		$query = "delete from
		  `partner_webmoney`  
		WHERE 
		  `id` = ?
		;";
		
		$rezult=$db_gb->delete($query,$id);
		?>
		<script>

			window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
		</script>
	