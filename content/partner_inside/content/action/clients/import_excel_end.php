<?

	$whereweare = "content/partner_inside/content/action/files/";
	$file_name = $_FILES["file"]["name"];
	if(move_uploaded_file($_FILES["file"]["tmp_name"], $whereweare.$file_name))
	{
		
	
	
		
	require_once('templates/PHPExcel.php');
	// Подключаем класс для чтения данных в формате excel
	require_once('templates/PHPExcel/IOFactory.php');
	
	// Открываем файл
	$xls = PHPExcel_IOFactory::load($whereweare.$file_name);
	// Устанавливаем индекс активного листа
	$xls->setActiveSheetIndex(0);
	// Получаем активный лист
	$sheet = $xls->getActiveSheet();









	// Получили строки и обойдем их в цикле
	$rowIterator = $sheet->getRowIterator();
	$head = true;
	$sting_client = "";
	$row_in=0;
	$row_out=0;
	for ($i = 1; $i <= $sheet->getHighestRow(); $i++) 
	{  
		if(!$head)
		{
			// Получили ячейки текущей строки и обойдем их в цикле
			$nColumn = PHPExcel_Cell::columnIndexFromString(
			$sheet->getHighestColumn());
			
			
			$b_error = false;
			$F    ="";
			$I    ="";
			$O    ="";
			$sex  ="";
			$work ="";
			$prim ="";
			$date ="";
			
			
			$object = new Check_dif_reg();
			for ($j = 0; $j < $nColumn; $j++) {
				$value = $sheet->getCellByColumnAndRow($j, $i)->getValue();
				
				switch($j){// Проверка на хакеров всяких
					case "0":  $object->check_names($value,'1',0);  $F = $value;       break;
					case "1":  $object->check_names($value,'2',3);  $I = $value;       break;
					case "2":  $object->check_names($value,'3',0);  $O = $value;       break;
					case "3":  $object->check_date($value);         $date = $value;    break;
					case "4":  $object->check_names($value,'5',0);  $sex = $value;     break;
					case "5":  $object->check_names($value,'6',0);  $work = $value;    break;
					case "6":  $object->check_names($value,'7',0);  $comment = $value; break;
					case "7":  $object->check_names($value,'8',0);  $tel = $value;     break;
					case "8":  $object->check_names($value,'9',0);  $email = $value;   break;
					case "9":  $object->check_names($value,'10',0);  $city = $value;   break;
					}
					
			}
			
			$error_b = false;
			foreach($object->error as $key=>$value_)
			{
				if($value_[1]==0){
					
					$texterror.=$value_[0]."<br/>"; 
					
					$error_b=true;//Если есть хоть 1 ошибка - маркеру присваивается значение false и данные формы не будут обработаны.
					}
			}
			if(!$error_b)
				$sting_client.= "(".$partner_info['id_part'].",'".$F."','".$I."','".$O."','".$sex."','".date('Y-m-d')."','".$date."','".$comment."','".$work."','".$tel."','".$email."','".$city."'),";
			else
				$row_out++;
			
		}else $head = false;
		
		$row_in=$i;
	}
	$sting_client = substr($sting_client, 0, -1);

	$query = "INSERT INTO 
		  `clients`
		(
		  `id_partner`,
		  `F`,
		  `I`,
		  `O`,
		  `sex`,
		  `date`,
		  `date_berth`,
		  `comment`,
		  `work`,
		  `tel`,
		  `email`,
		  `city`
		) 
		VALUES 
	".$sting_client.";";
	$rezult=$db_gb->insert($query);

	?>
		<script>

			window.location = "<? echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&row_in=$row_in&row_out=$row_out";  ?>";
			</script>
		<?
	
	
	}else {?>
		<div style="margin:10px 10px 10px 25px; color:hsla(358,38%,59%,0.88); border:1px solid hsla(216,30%,34%,1.00); display:inline-block; padding:25px;">
        	<div style="color:hsla(54,55%,44%,1.00);" class="gold">Что то не так с загружаемым файлом!:</div>
            <? echo $texterror; ?>
        </div>
        <script>
			
		</script>
		<? } ?>