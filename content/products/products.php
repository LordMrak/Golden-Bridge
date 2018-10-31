<?

$page=get_var_get('page');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">



<link rel="stylesheet" href="content/css.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="content/products/css_product.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>

<body>	
<?
    	
	switch( $page)
	{
		case "robots": include("content/products/robots.php");
		break;
		case "mrgray": include("content/products/robots/mrgray.php");
		break;
		case "fant": include("content/products/robots/globalfant/globalfant.php");
		break;
		case "spider": include("content/products/robots/spiderman/spiderman.php");
		break;
		case "locost": include("content/products/robots/locost/locost.php");
		break;
		case "news": include("content/products/robots/newcapture/info.php");
		break;
		case "sets": include("content/products/robots/sets/info.php");
		break;
		
		case "invest": include("content/products/invest.php");
		break;
		case "pamm_gb": include("content/products/invest/pamm_GB/pamm_gb.php");
		break;
		
		case "education": include("content/products/education.php");
		break;
		case "ed_base": include("content/products/education/base/osnova.php");
		break;
		case "ed_mql4": include("content/products/education/mql4/mql.php");
		break;
		case "education": include("content/products/education.php");
		break;
		case "ed_cme": include("content/products/education/cme/cme.php");
		break;
		
		default: include("content/products/main.php");
		break;
		}
	?>




</body>
</html>