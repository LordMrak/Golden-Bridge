<?

$query='SELECT 
  `id`,
  `name_partner`,
  `proc`,
  `1_line`,
  `2_line`,
  `3_line`,
  `4_line`,
  `start_in`,
  `stop_in`,
  `link_pic_man`,
  `link_pic_woman`
FROM 
  `partners_pay_system`;';

	
	$rezult=$db_gb->select($query);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Golden Bridge :: Партнерам</title>
<link rel="stylesheet" href="content/css.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="content/partners/partners.css" type="text/css" media="screen" title="no title" charset="utf-8">
<script type="text/javascript" src="content/partners/partners.js"></script>
</head>

<body>
<section class="container">
			<h1><span class="title">Партнерская программа</span> </h1>
			<h2>Делай меньше, зарабатывай больше</h2>
            
 </section>

<section class="container_text" style="border:3px; width:auto; padding:25px;"> 


        
<table class="table_partner">
<tr>
	<td style="vertical-align:top; width:200px;">
    	<div class="stat">
            <a href="#partner" class="parter_botton s_box_shadow">
                партнер
            </a>
            
            <a  href="#net" class="parter_botton s_box_shadow">
                Партнерская сеть
            </a>
            
            <a href="#trad" class="parter_botton s_box_shadow">
                Трейдер
            </a>
            
            <a href="#rest" class="parter_botton s_box_shadow">
                Прочее
            </a>

        </div>
    </td>
    	<td>
            <section id="partner">
        		
                <div class="text_block"><span class="gold">Партнер по программе вознаграждения получает % от дохода компании:</span><br>
сформированного привлеченными им инвестициями. Ниже приведена таблица выплачиваемых вознаграждений:</div>
                <table class="inside_table">
                	<tr>
                    	<th></th>
                    	<th>Статус</th>
                        <th>Вознаграждение</th>
                        <th>Сумма привлечений</th>
                    </tr>
                    <tr>
                    	<td width="10%"><div class="borderpicter"><img width="64px" class="radius" src="content/img/ico/user_man.png"> </div></td>
                    	<td>НОВИЧЕК</td>
                        <td>20%</td>
                        <td>0 - $4 999</td>
                    </tr>
                    <tr>
                    	<td><div class="borderpicter"><img  width="64px" class="radius" src="content/img/ico/user_pro_man.png"> </div></td>
                    	<td>ОПЫТНЫЙ</td>
                        <td>25%</td>
                        <td>$5 000 - $19 999</td>
                    </tr>
                    <tr>
                    	<td><div class="borderpicter"><img  width="64px" class="radius" src="content/img/ico/proger.png"> </div></td>
                    	<td>МАСТЕР</td>
                        <td>30%</td>
                        <td>$20 000 - $49 999</td>
                    </tr>
                    <tr>
                    	<td><div class="borderpicter"><img  width="64px" class="radius" src="content/img/ico/user_vip_man.png"> </div></td>
                    	<td>VIP</td>
                        <td>35%</td>
                        <td>$50 000</td>
                    </tr>
                </table>
                <div class="text_block">Пример:<br> Доход компании с партнера статуса <span class="gold">ОПЫТНЫЙ</span> составил 1 500 $ (100%)
вознаграждение партнера статуса<span class="gold"> ОПЫТНЫЙ </span>составит $375 (25%)</div>
  		  	</section>
            
            
           	<section id="net" style="display:none;">
        		
                <div class="text_block">
                    <span class="gold">Партнер строит свою ПАРТНЕРСКУЮ СЕТЬ:</span><br>
                    Партнер привлек к работе нового партнера:
                    привлекший партнер (любого статуса) получает 10 % от доходов компании с привлеченного им партнера 1й линии (любого статуса), 7% от 2й линии если он статуса "Опытный", 5% от 3й линии если он статуса "Мастер" и 3% от 4й линии если он статуса "VIP".
                </div>
                <div>
                
                <table class="inside_table">
                	<tr>
                    	<th>Статус</th>
                        <th>1я линия</th>
                        <th>2я линия</th>
                        <th>3я линия</th>
                        <th>4я линия</th>
                    </tr>
                    <? foreach($rezult as $rezult){?>
                	<tr>
                    	<td><? echo $rezult['name_partner']; ?></td>
                        <td><? echo $rezult['1_line']; ?>%</td>
                        <td><? echo $rezult['2_line']; ?>%</td>
                        <td><? echo $rezult['3_line']; ?>%</td>
                        <td><? echo $rezult['4_line']; ?>%</td>
                    </tr>
                    <? } ?>
                </table>
                
                </div>
                <div class="diagram"><img src="content/img/net_partners_new.png"></div>
                
                
                <div class="text_block">Пример:<br> Инвестиции в компанию с привлеченных инвесторов составил:<br>
                $10 000 <br>
				$2000 + $20 000 + $40 000<br>
				$19 000 + $1500<br>
				$200 000 + $500<br>
                $500 <br>
				Сам партнер получает только с 1й и 2й линии: <span class="gold">$150 + $15 + $75 + $300 + $100 + $3 = $643.</span>  <br>
               	Он недополучил из-за статуса: $754<br>
				Наже приведена доходность VIP партнера который привлек 100k$: <span class="gold">$2600 + $15 + $75 + $300 + $100 + $3 +  $754 = $3 847.</span> 
               
				</div>
                <div class="diagram"><img src="content/img/net_partners_new_deep.png"></div>
  		  	</section>
            
            
            <section id="trad" style="display:none;">
        		
                <div class="text_block"><span class="gold">Трейдер получает вознаграждение за совершение торговых операций:</span><br>
 Процент зависит от прибыли на счете. Ниже приведена таблица выплачиваемых вознаграждений:</div>
                <table class="inside_table">
                	<tr>
                    	<th></th>
                    	<th>Уровень</th>
                        <th>Вознагрождение</th>
                        <th>Общая сумма прибыли на счете</th>
                    </tr>
                    <tr>
                    	<td width="10%"><div class="borderpicter"><img width="64px" class="radius" src="content/img/ico/trader_.png"> </div></td>
                    	<td>1</td>
                        <td>33%</td>
                        <td>0 - $4 999</td>
                    </tr>
                    <tr>
                    	<td><div class="borderpicter"><img  width="64px" class="radius" src="content/img/ico/analit.png"> </div></td>
                    	<td>2</td>
                        <td>38%</td>
                        <td>$5 000 - $19 999</td>
                    </tr>
                    <tr>
                    	<td><div class="borderpicter"><img  width="64px" class="radius" src="content/img/ico/man_1.png"> </div></td>
                    	<td>3</td>
                        <td>44%</td>
                        <td>$20 000 - $49 999</td>
                    </tr>
                    <tr>
                    	<td><div class="borderpicter"><img  width="64px" class="radius" src="content/img/ico/man_2.png"> </div></td>
                    	<td>4</td>
                        <td>50%</td>
                        <td>> $50 000</td>
                    </tr>
                </table>
                <div class="text_block">Пример:<br>  
                Доход компании с трейдера 2-го уровня составил<span class="gold"> 5 000 $ (100%)</span>
				вознаграждение трейдера 2-го уровня составит <span class="gold">1 900 $ (38%)</span></div>
  		  	</section>
            
            
            <section id="rest" style="display:none;">
        		
                <div class="text_block blok_self"><span class="gold">Разработчик создает прибильного советника, и хочет получить дополнительный бонус за его продажу:</span><br>
 Разработчик систем может заключить с компанией договор, по которому компания будет выплачивать 30% от его продажи.</div>
           		
                <div class="text_block blok_self"><span class="gold"> Если Вы опытный лектор и обладаете интересными знаниями, то Вы можете заключить договор с компанией:</span><br>
 Компания выплачивает до 40% от продаж семинара лектору.
                </div>
                
                <div class="text_block blok_self"><span class="gold"> Начисления вознаграждений:</span><br>
 					<p>Начисление вознаграждения происходит с 1-го по последнее число отчетного месяца.
                    Выплата вознаграждения происходит с 5-го по последнее число месяца, следующего за
                    отчетным.</p>
                    <p>* - если в течение отчетного месяца была инвестиция, которая повлияла на
                    увеличение статуса партнера, то вознаграждение за весь отчетный месяц считается по
                    достигнутому статусу. В спорных ситуациях решающее слово остаётся за компанией.</p>
                </div>
  		  	</section>
            
            <!--<section><h3>Связь</h3> 
                Для связи по поводу трудоустройства обращаться по телефону:
                <div style="margin:10px 0px 0px 15px;"><div class="rang_peron">Помощник дректора</div> Алина +7 (911) 970 72 66</div>
            </section>-->
            
            
            
            
            
        </td>
    </tr>
</table>  



</section>


    

</body>
</html>