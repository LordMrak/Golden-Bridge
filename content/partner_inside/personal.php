<?
$query = "
SELECT 
  users_partner.id_user,
  partners.name,
  partners.id as `id_part`,
  partners.id_partner,
  partners.dinamic,
  partners.proc,
  partners.work,
  partners.`comment`
FROM
  partners
  INNER JOIN users_partner ON (partners.id = users_partner.id_partner)
WHERE
  	users_partner.id_user = ?;
";
$partner_info=$db_gb->selectRow($query,$_SESSION['MM_Id']);

$type_oper=get_var_post('type_oper');

$page = get_var_get('page');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Golden Bridge :: Кабинет партнера</title>
<link rel="stylesheet" href="content/css.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="content/partner_inside/personal.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="content/partner_inside/content/modal/modal.css" type="text/css" media="screen" title="no title" charset="utf-8">
<script type="text/javascript" src="content/partner_inside/personal.js"></script>
<script type="text/javascript" src="content/partner_inside/content/modal/modal.js"></script>
</head>

<body>
<section class="container p_title">
			<h1><span class="title">Добро пожаловать в Личный Кабинет, <? echo $_SESSION['MM_FIO']; ?>.</span> </h1>
			<h2>Управляй своим временем и будешь управлять своей жизнью</h2>
            
 </section>

<section class="container_text" style="border:3px; width:auto; padding:25px;"> 


        
<table class="table_partner">
<tr>
	<td style="vertical-align:top; width:200px;">
    	<div class="stat">
            <a href="index.php?link=personal&page=idata" class="parter_botton s_box_shadow">
                Мои данные
            </a>
            <a href="index.php?link=personal&page=clients" class="parter_botton s_box_shadow">
                Мои клиенты
            </a>
            <a  href="index.php?link=personal&page=inet" class="parter_botton s_box_shadow">
                Моя сеть
            </a>
            <a  href="index.php?link=personal&page=imoney" class="parter_botton s_box_shadow">
                Мои Доходы
            </a>
            <a  href="index.php?link=personal&page=imassage" class="parter_botton s_box_shadow">
                Мои сообщения
            </a>
        </div>
    </td>
    	<td>
        <? ?>
            <section id="idata" >
        		<? 
					switch($page)
					{
						case 'idata':   include('content/partner_inside/content/idata.php'); break;
						case 'clients': include('content/partner_inside/content/clients.php');  break;
						case 'inet':    include('content/partner_inside/content/inet.php');  break;
						case 'imoney':  include('content/partner_inside/content/imoney.php');  break;
						case 'imassage':include('content/partner_inside/content/imassage.php');  break;
						
						default:   include('content/partner_inside/content/idata.php');  break;
						}

				 ?>
  		  	</section>
        </td>
    </tr>
</table>  

</section>
</body>
</html>