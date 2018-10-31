<?

session_start();

include("../../../connection/con_base.php");
include("../../../templates/check_all_income.php");

$link=get_var_get('link');
include("../../../templates/authorization.php");

if(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=='ok' && $_SESSION['MM_UserGroup']<=1 )
{
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
    
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <script src="modal.js"></script>
    
    
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="modal.css">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->

	<link rel="stylesheet" href="content/admin.css"> <!-- CSS reset -->
</head>
<body>
	<header>
		<a id="cd-logo" href="#0"><img src="img/cd-logo.svg" alt="Homepage"></a>
		<nav id="cd-top-nav">
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="#0">Логин</a></li>
			</ul>
		</nav>
		<a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Меню</span><span class="cd-menu-icon"></span></a>
	</header>
	<main class="cd-main-content">

		<!-- put your content here -->
		<?
        	include('content/locations.php');
		?>
	</main> <!-- cd-main-content -->

	<nav id="cd-lateral-nav">
		<ul class="cd-navigation">
			<li class="item-has-children">
				<a href="#0">Главная</a>
				<ul class="sub-menu">
					<li><a href="#0">Общая информация</a></li>
					<li><a href="#0">Касса</a></li>
					<li><a href="#0">Сотрудники</a></li>
                    <li><a href="#0">Зарплата</a></li>
                    <li><a href="<? echo "index.php?link=catalogs"; ?>">Справочники</a></li>
				</ul>
			</li> <!-- item-has-children -->

			<li class="item-has-children">
				<a href="#0">Торговля</a>
				<ul class="sub-menu">
					<li><a href="#0">Загрузка данных</a></li>
					<li><a href="#0">Торговая статистика</a></li>
					<li><a href="#0">Реестр разработок</a></li>
					<li><a href="#0">Прибыль по клиентам</a></li>
					<li><a href="#0">Прибыль компании</a></li>
				</ul>
			</li> <!-- item-has-children -->

			<li class="item-has-children">
				<a href="#0">Stockists</a>
				<ul class="sub-menu">
					<li><a href="#0">London</a></li>
					<li><a href="#0">New York</a></li>
					<li><a href="#0">Milan</a></li>
					<li><a href="#0">Paris</a></li>
				</ul>
			</li> <!-- item-has-children -->
		</ul> <!-- cd-navigation -->

		<ul class="cd-navigation cd-single-item-wrapper">
			<li><a href="#0">Редактор Сайта</a></li>
			<li><a href="#0">Рассылка</a></li>
			<li><a href="#0">Касса</a></li>
			<li><a href="#0">Выплаты партнерам</a></li>
			<li><a href="#0">Наша прибыль</a></li>
		</ul> <!-- cd-single-item-wrapper -->

		<ul class="cd-navigation cd-single-item-wrapper">
			<li><a class="current" href="#index.php?link=download_data">Загрузка Данных</a></li>
			<li><a href="#0">FAQ</a></li>
			<li><a href="#0">Terms &amp; Conditions</a></li>
			<li><a href="#0">Careers</a></li>
			<li><a href="#0">Students</a></li>
		</ul> <!-- cd-single-item-wrapper -->

		<div class="cd-navigation socials">
			<a class="cd-twitter cd-img-replace" href="#0">Twitter</a>
			<a class="cd-github cd-img-replace" href="#0">Git Hub</a>
			<a class="cd-facebook cd-img-replace" href="#0">Facebook</a>
			<a class="cd-google cd-img-replace" href="#0">Google Plus</a>
		</div> <!-- socials -->
	</nav>
	



<div id="boxes" class="modal">
	</div>
    <div id="mask"></div>
</body>
</html>
<? };?>