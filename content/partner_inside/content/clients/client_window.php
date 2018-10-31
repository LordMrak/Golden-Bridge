<?
session_start();
include("../../../../connection/con_base.php");
include("../../../../templates/check_all_income.php");

$client=get_var_get('client');
$link=get_var_get('link');
include("../../../../templates/authorization.php");

	$query='
		SELECT 
		  clients.id,
		  clients.F,
		  clients.I,
		  clients.O,
		  clients.sex,
		  clients.`comment`,
		  clients.`date`,
		  clients.`date_berth`,
		  clients.work,
		  clients.`tel`,
		  clients.`email`,
		  clients.`city`,
		  SUM(client_inout.`in`) AS `in`,
		  SUM(client_inout.out) AS `out`,
		  count(events.id) AS `count`
		FROM
		  clients
		  LEFT JOIN events ON (clients.id = events.id_client)
		  LEFT JOIN client_inout ON (clients.id = client_inout.id_client)
		where
		  clients.id = ?
		;';
	$rezult      = $db_gb->selectRow($query,$client);
if(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=='ok' && $_SESSION['MM_UserGroup']<=9 )
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Клиент</title>
<link rel="stylesheet" type="text/css" href="client_window.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/hot-sneaks/jquery-ui.css" />


		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript" src="topmenu/jquery.easing.1.3.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script src="datepicker.js"></script>
        <script src="client_window.js"></script>
<style>

</style>

</head>
<body>
   
<!-- <frameset cols="150,*">
      <frame src="page/left.php" name="leftFrame" scrolling="no" noresize>
      <frame src="page/main.php" name="mainFrame">
    </frameset><noframes></noframes>-->

<div class="frameset">
	<div class="top_menu">
    	
        <div class="client_name"><? echo $rezult['F']." ".$rezult['I']." ".$rezult['O']; ?></div>
        <div class="client_info_block">
        	<div class="top_info">In <span class="gold"><? if(isset($rezult['in'])) echo $rezult['in']; else echo 0;?> $</span></div>
            <div class="top_info">Out <span class="green"><?  if(isset($rezult['out'])) echo $rezult['out']; else echo 0;?> $</span></div>
            <div class="top_info">Событий: <span class="gray"><?  echo $rezult['count'];?></span></div>
            <div class="top_info">Телефон:  <span class="text"><?  echo $rezult['tel'];?></span></div>
            <div class="top_info">Email:  <span class="text"><?  echo $rezult['email'];?></span></div>
        </div>
    </div>
    <div>
    

        <div class="left_frame">
        	<a  class="<? if(!isset($link)||(isset($link)&&$link=='main')){ ?>menu_element_act <? }else{?>menu_element<? }?> s_box_shadow">Главная</a>
            	<!--<ul>
                	<li>Общая Информация</li>
                    <li>Добавить информацию о клинете</li>
                    <li>Редактировать информацию о клинете</li>
                    <li>Ссылочная информация</li>
                </ul>-->
            <a class="<? if(isset($link)&&$link=='event'){ ?>menu_element_act <? }else{?>menu_element<? }?> s_box_shadow">События</a>
           		<!--<ul>
                	<li>Общая Информация</li>
                    <li>Добавить информацию о клинете</li>
                    <li>Редактировать информацию о клинете</li>
                    <li>Ссылочная информация</li>
                </ul>-->
            <a class="<? if(isset($link)&&$link=='schet'){ ?>menu_element_act <? }else{?>menu_element<? }?> s_box_shadow">Счета</a>
            <a class="<? if(isset($link)&&$link=='partner'){ ?>menu_element_act <? }else{?>menu_element<? }?> s_box_shadow">В партнеры</a>
        </div>
        <div class="main_frame">  <?
            
			 switch ($link)
                {
                    case 'main':
                    include('page/main.php');
                    break;
					
					case 'event':
                    include('page/abw_company.php');
                    break;
					
					case 'schet':
                    include('page/abw_company.php');
                    break;
					
					case 'partner':
                    include('page/abw_company.php');
                    break;
					
					default:
					include('page/main.php');
					break;
				}
			?></div>
    </div>
</div>

</body>
</html>
<? }?>