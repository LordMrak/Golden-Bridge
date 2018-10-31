<?
$type_oper=get_var_post('type_oper');
if(isset($type_oper) && $type_oper!="" && $type_oper!=NULL)
{

	if($type_oper == 1)
	{
		$name=get_var_post('name');
		
		
		
		$type_part=get_var_post('type_part');
		$agent=get_var_post('agent');
		$proc_d=get_var_post('proc_d');
		if($proc_d = "on") $proc_d = '1'; else $proc_d = '0'; 
		$user=get_var_post('user');
		$proc=get_var_post('proc');
		$prim=get_var_post('prim'); 
		$work=get_var_post('work'); 
		if($work = "on") $work = 'y'; else $work = 'n'; 
		
		$proc=get_var_post('proc');

		
		$query = 'INSERT INTO 
					  `partners`
					(
					  `name`,
					  `Id_type_partner`,
					  `id_partner`,
					  `dinamic`,
					  `proc`,
					  `work`,
					  `comment`
					) 
					VALUE (
					  ?,
					  ?,
					  ?,
					  ?,
					  ?,
					  ?,
					  ?
					);';
			$rezult=$db_gb->insert($query,$name,$type_part,$agent,$proc_d,$proc,$work,$prim);
			$id_part=$db_gb->queryInfo['insert_id'];
			
			
			$query = "INSERT INTO 
						  `users_partner`
						(
						  `id_user`,
						  `id_partner`
						) 
						VALUE (
						  ?,
						  ?
						);";
			$db_gb->insert($query,$user,$id_part);
			
			?>
			<script>
			window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
			</script>
			
			<?
		
	}
	elseif($type_oper == 2)
	{
		$id_partner=get_var_post('id_partner');
		$name=get_var_post('name');
		$type_part=get_var_post('type_part');
		$agent=get_var_post('agent');
		$proc_d=get_var_post('proc_d');
		if($proc_d = "on") $proc_d = '1'; else $proc_d = '0'; 
		$user=get_var_post('user');
		$proc=get_var_post('proc');
		$prim=get_var_post('prim'); 
		$work=get_var_post('work'); 
		if($work = "on") $work = 'y'; else $work = 'n'; 
		
		$proc=get_var_post('proc');
		 

		
		
		$query = "UPDATE 
				  `partners`  
				SET 
				  `name` = ?,
				  `Id_type_partner` = ?,
				  `id_partner` = ?,
				  `dinamic` = ?,
				  `proc` = ?,
				  `work` = ?,
				  `comment` = ?
				WHERE 
				  `id` = ?
				;";
		$rezult=$db_gb->update($query,$name,$type_part,$agent,$proc_d,$proc,$work,$prim,$id_partner);
		
		$query = "SELECT 
				  `id`,
				  `id_user`,
				  `id_partner`
				FROM 
				  `users_partner`
				where
					`id_partner` = ?
				;";
		$check=$db_gb->selectRow($query,$id_partner);
		$cont=$db_gb->queryInfo['insert_id'];
		
		if($cont==0)
		{
			$query = "INSERT INTO 
						  `users_partner`
						(
						  `id_user`,
						  `id_partner`
						) 
						VALUE (
						  ?,
						  ?
						);";
			$db_gb->insert($query,$user,$id_part);
		}else
		{
			$query = "UPDATE 
					  `users_partner`  
					SET 
					  `id_user`    = ?
					WHERE 
					  `id_partner` = ?
					;";
			$db_gb->update($query,$user,$id_part);
			}
		
			?>
			<script>
				window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
			</script>
			
			<?
		
		}
		
};

?>