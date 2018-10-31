<?
$type_oper=get_var_post('type_oper');
if(isset($type_oper) && $type_oper!="" && $type_oper!=NULL)
{

	if($type_oper == 1)
	{
		$F=get_var_post('F');
		$I=get_var_post('I');
		$O=get_var_post('O');
		$sex=get_var_post('sex');
		$work=get_var_post('work');
		$prim=get_var_post('prim'); 
		if($work = "on") $work = 'y'; else $work = 'n'; 
		
		$elements=get_var_post('elements');
		 
		for($i=1;$i<=$elements;$i++)
		{
			$mass[$i][0] = get_var_post('val'.$i); 
			$mass[$i][1] = get_var_post('type'.$i); 
			
			}
			
		
		
		
		$query = "INSERT INTO 
		  `clients`
		(
		  `F`,
		  `I`,
		  `O`,
		  `sex`,
		  `date`,
		  `comment`,
		  `work`
		) 
		VALUE (
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?
		);";
		$rezult=$db_gb->insert($query,$F,$I,$O,$sex,date("Y-m-d h:m:s"),$prim,$work);
		$id_client=$db_gb->queryInfo['insert_id'];
		
			if($elements>0)
			{
				foreach($mass as $mass)
				{
					$str.="(".$id_client.",".$mass[1].",'".$mass[0]."'),";
					}
				$str = substr($str, 0, -1);
				
				$query = "INSERT INTO 
				  `client_filds`
				(
				  `id_client`,
				  `id_fild`,
				  `value`
				) 
				VALUES
				
				".$str."
				;";
				$rezult=$db_gb->insert($query);
			}
			?>
			<script>
			window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
			</script>
			
			<?
		
	}
	elseif($type_oper == 2)
	{
		$id_client=get_var_post('id_client');
		$F=get_var_post('F');
		$I=get_var_post('I');
		$O=get_var_post('O');
		$sex=get_var_post('sex');
		$work=get_var_post('work');
		$prim=get_var_post('prim'); 
		if($work = "on") $work = 'y'; else $work = 'n'; 
		
		$elements=get_var_post('elements');
		 
		for($i=1;$i<=$elements;$i++)
		{
			$mass[$i][0] = get_var_post('val'.$i); 
			$mass[$i][1] = get_var_post('type'.$i); 
			
			}
		
		
		$query = "UPDATE 
				  `clients`  
				SET 
				  `F` = ?,
				  `I` = ?,
				  `O` = ?,
				  `sex` = ?,
				  `comment` = ?,
				  `work` = ?
				WHERE 
				  `id` = ?
				;";
		$rezult=$db_gb->update($query,$F,$I,$O,$sex,$prim,$work,$id_client);
		
			if($elements>0)
			{
				foreach($mass as $mass)
				{
					$str.="(".$id_client.",".$mass[1].",'".$mass[0]."'),";
					}
				$str = substr($str, 0, -1);
				
				$query = "INSERT INTO 
				  `client_filds`
				(
				  `id_client`,
				  `id_fild`,
				  `value`
				) 
				VALUES
				
				".$str."
				;";
				$rezult=$db_gb->insert($query);
			}
			?>
			<script>
				window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
			</script>
			
			<?
		
		}
		elseif($type_oper == 3)
	{
		include("../../../../../../../../connection/con_base.php");
		include("../../../../../../../../templates/check_all_income.php");
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
		?>
			<script>
				window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
			</script>
			
			<?
	}
};

?>