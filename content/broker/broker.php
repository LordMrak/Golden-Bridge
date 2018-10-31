<?

$page=get_var_get('page');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Golden Bridge :: Брокеры</title>


<link rel="stylesheet" href="content/css.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="content/broker/css_broker.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>

<body>	
<?
    	
	switch( $page)
	{
		case "robots": include("content/products/robots.php");
		break;
		
		
		default: include("content/broker/main.php");
		break;
		}
	?>




</body>
</html>