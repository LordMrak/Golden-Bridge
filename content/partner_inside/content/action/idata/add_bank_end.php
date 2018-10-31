<?

	$fio=get_var_post('fio');
	$card_num=get_var_post('card_num');
	$name_bank=get_var_post('name_bank');
	$pc=get_var_post('pc');
	$kc=get_var_post('kc');
	$bik=get_var_post('bik');
	$inn=get_var_post('inn');
	$kpp=get_var_post('kpp');
	$work=get_var_post('work');
	
	if($work = "on") $work = 'y'; else $work = 'n'; 
	
	$object = new Check_dif_reg();
	$object->check_names($fio,'ФИО держателя счета',3);
	$object->check_numbers($card_num,'номер карты',16);
	$object->check_names($name_bank,'название банка',3);
	
	$object->check_numbers($pc,'расчетный счет',20);
	$object->check_names($kc,'кор. счет',0);
	$object->check_numbers($bik,'БИК Банка',0);
	$object->check_numbers($inn,'ИНН Банка',0);
	$object->check_numbers($kpp,'КПП Банка',0);
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
		  `partner_bank`
		(
		  `id_partner`,
		  `fio`,
		  `card_number`,
		  `name_bank`,
		  `pc`,
		  `kc`,
		  `bik`,
		  `inn_bank`,
		  `kpp`,
		  `work`
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
		  ?
		);";
		
		$rezult=$db_gb->insert($query,$partner_info['id_part'],$fio,$card_num,$name_bank,$pc,$kc,$bik,$inn,$kpp,$work);
		?>
		<script>

			window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  ?>";
			</script>
		<?
	}
	else
	{?>
		<div style="margin:10px 10px 10px 25px; color:hsla(358,38%,59%,0.88); border:1px solid hsla(216,30%,34%,1.00); display:inline-block; padding:25px;">
        	<div style="color:hsla(54,55%,44%,1.00);" class="gold">Допущены ошибки при заполнении реквизитов банка:</div>
            <? echo $texterror; ?>
        </div>
        <script>
			
		</script>
		<? }
	
?>
