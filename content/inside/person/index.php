<?

session_start();
include("../../../connection/con_base.php");
include("../../../templates/check_all_income.php");

$link=get_var_get('link');
include("../../../templates/authorization.php");

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Управленческая зона :: Оперативная информация</title>

        <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    <nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
  <header class="avatar">
		<img src="../../img/team/anton.jpg" />
    <h2>John D.</h2>
  </header>
	<ul>
    <li tabindex="0" class="icon-dashboard"><span>Главная</span></li>
    	<ul class="">
           	<li class="icon-item"><span>Общая информация</span></li>
            <li class="icon-item"><span>Касса</span></li>
            <li class="icon-item"><span>Сотрудники</span></li>
            <li class="icon-item"><span>Зарплата</span></li>
        </ul>
    <li tabindex="0" class="icon-customers"><span>Customers</span></li>
    <ul class="">
           	<li class="icon-item"><span>Общая информация</span></li>
            <li class="icon-item"><span>Касса</span></li>
            <li class="icon-item"><span>Сотрудники</span></li>
            <li class="icon-item"><span>Зарплата</span></li>
        </ul>
    <li tabindex="0" class="icon-users"><span>Users</span></li>
    <ul class="">
           	<li class="icon-item"><span>Общая информация</span></li>
            <li class="icon-item"><span>Касса</span></li>
            <li class="icon-item"><span>Сотрудники</span></li>
            <li class="icon-item"><span>Зарплата</span></li>
        </ul>
    <li tabindex="0" class="icon-settings"><span>Settings</span></li>
  </ul>
</nav>

<main>
  <div class="helper">
    RESIZE THE WINDOW
		<span>Breakpoints on 900px and 400px</span>
  </div>
</main>
    
        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
