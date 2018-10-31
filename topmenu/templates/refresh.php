<?

// проверка на обновления
function check_ref_GET($unique_get_post)
{
	$big_error=false;
	if(isset($unique_get_post)) 
	$_SESSION['tmpUnique'] = $unique_get_post;
	else 
	unset($_SESSION['tmpUnique']);
	
	
	$_SESSION['unique'] = date("YmdHis");
	if(isset($_SESSION['sent']) && isset($_SESSION['tmpUnique']) && $_SESSION['sent'] >= $_SESSION['tmpUnique']) {
		//echo "<b style=\"font-size: 30px;\">Refreshed Page</b><br>";
		 $ref_error=1; $big_error=true;
	}
	else {
		if(isset($_SESSION['tmpUnique'])) 
		{
			$_SESSION['sent'] = $_SESSION['tmpUnique'];
			//echo "<b style=\"font-size: 30px;\">Inserted into DB</b><br>";
			$ref_error=0;
			$big_error=false;
		}
		
		
	}
	//echo '<br /> $_SESSION["sent"]'.$_SESSION['sent'].'??'.'$_SESSION["tmpUnique"]'.$_SESSION['tmpUnique'];
	unset($_SESSION['tmpUnique']);
	$unique = $_SESSION['unique'];
	
	$mass['big_error']=$big_error;$mass['unique']=$unique;
	return($mass);
}
// проверка на обновления

?>