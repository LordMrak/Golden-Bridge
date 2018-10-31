<?

	$qiwi  = get_var_post('qiwi');
	$limit = get_var_post('limit');
	
	$work = get_var_post('work');
	
	if($work = "on") $work = 'y'; else $work = 'n'; 
	
	$object = new Check_dif_reg();
	$object->check_tel($qiwi);
	$object->check_numbers($limit,"Лимит Кошелька",0);

	
	
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
				  `partner_qiwi`
				(
				  `id_partner`,
				  `number`,
				  `limit`,
				  `work`
				) 
				VALUE (
				 ?,
				 ?,
				 ?,
				 ?
				);";
		
		$rezult=$db_gb->insert($query,$partner_info['id_part'],$qiwi,$limit,$work);
		?>
		<script>

			window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
			</script>
		<?
	}
	else
	{?>
		<div style="margin:10px 10px 10px 25px; color:hsla(358,38%,59%,0.88); border:1px solid hsla(216,30%,34%,1.00); display:inline-block; padding:25px;">
        	<div style="color:hsla(54,55%,44%,1.00);" class="gold">Допущены ошибки при заполнении реквизитов QIWI:</div>
            <? echo $texterror; ?>
        </div>
        <script>
			
		</script>
		<? }
	
?>
