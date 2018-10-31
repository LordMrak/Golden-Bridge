<?php
$log_nd=get_var_post('login_nd');

$pass_nd=get_var_post('pass_nd');

if(isset($_POST['action'])&& $_POST['action']!='')
{
	$_SESSION['action']=$_POST['action'];
	}else unset($_SESSION['action']);
if(isset($_SESSION['action']) && 'form_log'==$_SESSION['action'] && !isset($_SESSION['MM_Auth']))
	{
		
	$pass_nd=htmlspecialchars(md5($pass_nd));
	
	$query='SELECT 
		  `id`,
		  `login`,
		  `password`,
		  `F`,
		  `I`,
		  `O`,
		  `sex`,
		  `access`,
		  `date`,
		  `email`
		FROM 
		  `users`
		where
		`login`="'.$log_nd.'" and `password`="'.$pass_nd.'"   
	  ;';

	
	$res_f_raz=$db_gb->selectRow($query);
	
	$findUser=$db_gb->queryInfo['num_rows'];
	

	if($res_f_raz['id'])
	{
		$_SESSION['MM_Id'] = $res_f_raz['id'];
		$_SESSION['MM_Username'] = $log_nd;
		$_SESSION['MM_Pass'] = $pass_nd;
		$_SESSION['MM_FIO'] = $res_f_raz['I']." ".$res_f_raz['O'];
		$_SESSION['MM_UserGroup'] = $res_f_raz['access'];
		$_SESSION['MM_Auth']='ok';
		
		
		header('Location:index.php?link=enter');
		
	}
		else
		{
			header('Location:index.php?link=enter');
			$_SESSION['MM_Auth']='no'; 
		}	
}
elseif(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=='ok')
{
	$log_nd=htmlspecialchars($_SESSION['MM_Username']);
	$pass_nd=htmlspecialchars($_SESSION['MM_Pass']);
	$query='SELECT 
		  `id`,
		  `login`,
		  `password`,
		  `F`,
		  `I`,
		  `O`,
		  `sex`,
		  `access`,
		  `date`,
		  `email`
		FROM 
		  `users`
		where
		`login`="'.$log_nd.'" and `password`="'.$pass_nd.'"   
	  ;';
$res_f_raz=$db_gb->selectRow($query);
$findUser=$db_gb->queryInfo['num_rows'];
//print_r($_SESSION);
if($res_f_raz['id'])
{
	
	$_SESSION['MM_Id'] = $res_f_raz['id'];
	$_SESSION['MM_Username'] = $log_nd;
	$_SESSION['MM_Pass'] = $pass_nd;
	$_SESSION['MM_UserGroup'] = $res_f_raz['access'];
	$_SESSION['MM_Auth']='ok';
	if(isset($link) && $link=='exit'){session_destroy();$_SESSION['MM_Auth']='no';}
	
}else {

$_SESSION['MM_Auth']='no'; session_destroy();header('Location:index.php?link=enter');
}

}else{
	unset( $_SESSION['MM_Auth']); }
?>