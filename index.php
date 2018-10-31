<?
session_start();
include("connection/con_base.php");
include("templates/check_all_income.php");

//date_default_timezone_set('Europe/Moscow');

$link=get_var_get('link');
include("templates/authorization.php");

/*if (!isset($_COOKIE['GB_RU_visit_day'])) 
{

	if (isset($_COOKIE['GB_RU_visit'])) $cnt=$_COOKIE['GB_RU_visit']+1;
	else $cnt=0;
	
	setcookie("GB_RU_visit_day",$cnt);
	setcookie("GB_RU_visit",$cnt,0x7FFFFFFF);
};*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='yandex-verification' content='631c80e0fef4fbd1' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,700,800&subset=latin,cyrillic,vietnamese' rel='stylesheet' type='text/css'>


<link rel="stylesheet" type="text/css" href="content/modal2.css">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="topmenu/css/style.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/hot-sneaks/jquery-ui.css" />

<!--<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">-->

</head>

<body>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript" src="topmenu/jquery.easing.1.3.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script src="datepicker.js"></script>
        
        
        <script src="templates/js/modal.js"></script>
        <script src="js/zepto/zepto.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/flux.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
		$(document).ready(function(){
            
				/**
				* for each menu element, on mouseenter, 
				* we enlarge the image, and show both sdt_active span and 
				* sdt_wrap span. If the element has a sub menu (sdt_box),
				* then we slide it - if the element is the last one in the menu
				* we slide it to the left, otherwise to the right
				*/
                $('#sdt_menu > li').bind('mouseenter',function(){
					
					
					var $elem = $(this);
					$elem.find('img')
						 .stop(true)
						 .animate({
							'width':'170px',
							'height':'170px',
							'left':'0px',
							'top':'0px'
						 },400,'easeOutBack')
						 .andSelf()
						 .find('.sdt_wrap')
					     .stop(true)
						 .animate({'top':'200px'},500,'easeOutBack')
						 .andSelf()
						 .find('.sdt_active')
					     .stop(true)
						 .animate({'height':'200px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '170px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-170px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
					//alert("dsds");
				}).bind('mouseleave',function(){
					var $elem = $(this);
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length)
						$sub_menu.hide().css('left','0px');
					
					$elem.find('.sdt_active')
						 .stop(true)
						 .animate({'height':'0px'},300)
						 .andSelf().find('img')
						 .stop(true)
						 .animate({
							'width':'0px',
							'height':'0px',
							'left':'85px'},400)
						 .andSelf()
						 .find('.sdt_wrap')
						 .stop(true)
						 .animate({'top':'25px'},500);
				});
				$('#outside').css("minHeight",screen.height+"px");
				
            });
			
			
        </script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter42808824 = new Ya.Metrika({
                    id:42808824,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/42808824" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-10195969-9', 'auto');
  ga('send', 'pageview');

</script>

<!--<div style="position:absolute; width:100%; height:100%; z-index:99;"></div>-->
<div id="outside" class="outside">
<div class="top_menu_class">
    <div>
    <ul id="sdt_menu" class="sdt_menu">
                    <li>
                        <a href="index.php?link=abw">
                            <img src="topmenu/images/ab_company2.jpg" alt=""/>
                            <span class="sdt_active"></span>
                            <span class="sdt_wrap">
                                <span class="sdt_link">Компания</span>
                                <span class="sdt_descr">История и миссия</span>
                            </span>
                        </a>
                        <div class="sdt_box">
                                <a href="index.php?link=abw">О Компании</a>
                                <!--<a href="index.php?link=team">Наша команда</a>-->
                                <a href="?link=mission">Миссия и цели</a>
                                <!--<a href="?link=docs">Документы</a>-->
                                <!--<a href="?link=job">Вакансии</a>-->
                                <a href="?link=partner">Партнерам</a>
                        </div>
                    </li>
                    <li>
                        <a href="index.php?link=acc">
                            <img src="topmenu/images/chet.jpg" alt=""/>
                            <span class="sdt_active"></span>
                            <span class="sdt_wrap">
                                <span class="sdt_link">Счета</span>
                                <span class="sdt_descr">Мониторинги систем</span>
                            </span>
                        </a>
                        <div class="sdt_box">
                                <a href="index.php?link=acc#conservative_style">Консервативные </a>
                                <a href="index.php?link=acc#mixed_style">Смешанные  </a>
                                <a href="index.php?link=acc#agress_style">Агрессивные  </a>
                                <a href="index.php?link=acc#portfolio_1">Портфель 1 </a>
                                <a href="index.php?link=acc#portfolio_2">Портфель 2 </a>
                                <a href="index.php?link=acc#arhive">Архив</a>
                        </div>
                    </li>
                    <li>
                        <a href="index.php?link=products">
                            <img src="topmenu/images/usl2.jpg" alt=""/>
                            <span class="sdt_active"></span>
                            <span class="sdt_wrap">
                                <span class="sdt_link">Продукты</span>
                                <span class="sdt_descr">Что мы предлагаем?</span>
                            </span>
                        </a>
                        <div class="sdt_box">
                                <a href="index.php?link=products&page=robots">Роботы</a>
                                <a href="index.php?link=products&page=pamm_gb">ПАММ сервисы</a>
                                <a href="index.php?link=products&page=education">Семинары</a>
                                <a href="#">Консультирование</a>
                        </div>
                    </li>
                    <li>
                        <a href="index.php?link=broker">
                            <img src="topmenu/images/bro.jpg" alt=""/>
                            <span class="sdt_active"></span>
                            <span class="sdt_wrap">
                                <span class="sdt_link">Брокеры</span>
                                <span class="sdt_descr">Что мы о них знаем</span>
                            </span>
                        </a>
                        <div class="sdt_box">
                                <a href="#">В общем о брокерах</a>
                                <a href="#">Forex</a>
                                <a href="#">Российский рынок</a>
                                <a href="#">Международный рынок</a>
                                <a href="#">Криптовалюты</a>
                                <a href="#">Партнеры</a>
                        </div>
                    </li>
                    <li>
                        <a href="index.php?link=contacts">
                            <img src="topmenu/images/cont.jpg" alt=""/>
                            <span class="sdt_active"></span>
                            <span class="sdt_wrap">
                                <span class="sdt_link">Контакты</span>
                                <span class="sdt_descr">Связь с нами</span>
                            </span>
                        </a>
                    </li>
                    <li>
                    <?
						
                    	if(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=='ok')
						$string = "index.php?link=personal";
						else
						$string = "index.php?link=enter";
				
					if(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=="ok" && isset($_SESSION['MM_UserGroup']))
						{
						?>
						<a href=<? echo $string; ?>>
                            <img src="topmenu/images/in.png" alt=""/>
                            <span class="sdt_active"></span>
                            <span class="sdt_wrap">
                                <span class="sdt_link"><? echo $_SESSION['MM_Username']; ?></span>
                                <span class="sdt_descr">Для <? if ($_SESSION['MM_UserGroup']==9){ ?>партнеров<? }else{?>струдников<? }?></span>
                            </span>
                        </a>
                        <div class="sdt_box">
                        		<? if($_SESSION['MM_UserGroup']<=1) {?>
                                	
                                    <a href="content/inside/admin/index.php" target="blank">Сотреднику</a>
                                	<a href="index.php?link=personal">Партнеру</a>
                                <? }
								if($_SESSION['MM_UserGroup']==9){
									?>
                                    <a href="index.php?link=personal">Партнеру</a>
                                    <? }?>
                                <a href="?link=exit">Выход</a>
                        </div>
						<?
							}
					else
					{?>
                        <a href=<? echo $string; ?>>
                            <img src="topmenu/images/in.png" alt=""/>
                            <span class="sdt_active"></span>
                            <span class="sdt_wrap">
                                <span class="sdt_link">ВХОД</span>
                                <span class="sdt_descr">Для сотрудников</span>
                            </span>
                        </a>
                        <div class="sdt_box">
                                <a href="#">Руководство</a>
                                <a href="index.php?link=enter_partner">Партнер</a>
                        </div>
                        <?
						}
						
						?>
                        
                    </li>
                </ul>
      </div>
	<div class="text">
        <div><span>Golden</span> Bridge</div>
        <div class="expert">Expert and Consult Center</div>
        <div class="addres">+7 (812) 955 60 04</div>
        <!--<div class="addres">Санкт-Петербург, пл. Конституции 7, офис 446</div>-->
    </div>
</div>


    <div  class="content">
    <table style=" border-collapse:collapse; width:100%;">
		<tr>
        	<td></td>
            <td style="height:50px;"></td>
            <td></td>
        </tr>
        <tr>
        	<td></td>
            <td class="content_change" >
            
			<? 
                
                switch ($link)
                {
                    case 'abw':
                    include('content/abw_company.php');
                    break;
                    
					case 'risk':
					include('content/risk.php');
                    break;
					
                    case 'team': 
                    include('content/team.php');
                    break;
                    
                    case 'mission': 
                    include('content/mission.php');
                    break;
                    
                    case 'docs': 
                    include('content/docs.php');
                    break;
                    
                    case 'acc': 
                    include('content/acc.php');
                    break;
                    
                    case 'products': 
                    include('content/products/products.php');
                    break;
                    
					case 'job': 
                    include('content/vakans.php');
                    break;
					case 'partner': 
                    include('content/partners/partners.php');
                    break;
					case 'contacts': 
                    include('content/contact.php');
                    break;
					case 'broker': 
                    include('content/broker/broker.php');
                    break;
					
					
					case 'enter': 
					include('content/inside/login.php');
                    break;
					
                    case 'personal': 
						if(isset($_SESSION['MM_Auth']) && $_SESSION['MM_Auth']=='ok')
							include('content/partner_inside/personal.php');
						else
							include('content/inside/login.php');
                    break;
					
					case 'alex_info':
						include('content/partner_inside/alex_info.php');break;
                    
                    default:
                        include('content/main_page.php');
                    break;
                    }
                ?>
  		
 			</td>
            <td></td>
        </tr>

    </table>
    <footer>
    	<div><a href="?link=risk" target="" class="gold">УВЕДОМЛЕНИЕ О РИСКАХ</a> |</div>
		<p>Corporate Site &copy; Copyright 2011 Golden Bridge. All Rights Reserved.</p>
		<img src="content/img/ico/GB_mini.png" alt="HTML5" width="35px" />
	</footer>
     </div>
	<div style="width:1020px;"></div>
    
</div>

	<div id="boxes" class="modal" >
	</div>
    <div id="mask"></div>
    
    
</body>
</html>