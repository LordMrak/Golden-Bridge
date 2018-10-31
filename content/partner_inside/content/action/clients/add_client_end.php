<?
	
	
		$F    =get_var_post('F');
		$I    =get_var_post('I');
		$O    =get_var_post('O');
		$sex  =get_var_post('sex');
		$work =get_var_post('work');
		$prim =get_var_post('prim');
		$date =get_var_post('date'); 
		
		$tel =get_var_post('tel'); 
		$email =get_var_post('email'); 
		$city =get_var_post('city'); 
		
		if($work = "on") $work = 'y'; else $work = 'n'; 
		
		$object = new Check_dif_reg();
		$object->check_names($F,'Фамилия клиента',3);
		$object->check_names($I,'Имя клиента',3);
		$object->check_names($O,'Отчество клиента',0);
		$object->check_names($prim,'Примечание',0);
		$object->check_date($date);
		
		$elements=get_var_post('elements');
		for($i=1;$i<=$elements;$i++)
		{
			$mass[$i][0] = get_var_post('val'.$i); 
			$mass[$i][1] = get_var_post('type'.$i); 
			$object->check_names($mass[$i][0],'Значение:'.$mass[$i][0],0);
			}
		
		$error_b = false;
		foreach($object->error as $key=>$value_)
			{
				if($value_[1]==0){
					
					$texterror.=$value_[0]."<br />"; 
					
					$error_b=true;//Если есть хоть 1 ошибка - маркеру присваивается значение false и данные формы не будут обработаны.
					}
			}
		if(!$error_b)
		{
		$query = "INSERT INTO 
		  `clients`
		(
		  `F`,
		  `I`,
		  `O`,
		  `sex`,
		  `date`,
		  `comment`,
		  `work`,
		  `date`,
		  `id_partner`,
		  `tel`,
		  `email`,
		  `city`
		) 
		VALUE (
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?
		);";
		$rezult=$db_gb->insert($query,$F,$I,$O,$sex,date("Y-m-d h:m:s"),$prim,$work,$date,$partner_info['id_part'],$tel,$email,$city);
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
	else
	{?>
		<div style="margin:10px 10px 10px 25px; color:hsla(358,38%,59%,0.88); border:1px solid hsla(216,30%,34%,1.00); display:inline-block; padding:25px;">
        	<div style="color:hsla(54,55%,44%,1.00);" class="gold">Допущены ошибки при добавлении нового клиента:</div>
            <? echo $texterror; ?>
        </div>
        <script>
			
		</script>
		<? } ?>
	
	