<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Golden Bridge :: Авторизация</title>
<link rel="stylesheet" type="text/css" href="content/inside/css.css">
</head>
<?
//
if(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=='ok' && $_SESSION['MM_UserGroup']<=1 )
{
?>
		<script>
        	window.open("content/inside/admin/index.php");
        </script>
<?
}else
if(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=='ok' && $_SESSION['MM_UserGroup']==9)
{?>
	<script>
    	window.location = "<? echo "http://".$_SERVER['SERVER_NAME'];?>?link=personal";
	</script>
	<? } ?>
<body>
<section class="container_text">
<h3 style="font-size:18px; text-align:center;">Кабинет сотрудника</h3>
<div class="login_css">
    <form name="login_form" method="post" >
    	<h3>ЛОГИН</h3>
        <div><input name="login_nd"  ></div>
        <h3>пароль</h3>
        <div><input name="pass_nd" type="password" ></div>
        <input name="action" id="action" type="hidden" value="form_log"  />
        <input name="login" class="button" type="submit" value="вход">
    </form>
</div>
</section>

</body>
</html>